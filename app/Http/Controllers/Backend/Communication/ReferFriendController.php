<?php

namespace App\Http\Controllers\Backend\Communication;

use App\Http\Controllers\Controller;
use App\Models\ReferFriend;
use App\Models\User;
use Illuminate\Http\Request;

class ReferFriendController extends Controller
{
    private function processReferFriends($refer_friends)
    {
        foreach($refer_friends as $refer_friend) {
            $refer_friend->action = '
            <a id="'.$refer_friend->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $user = User::find($refer_friend->user_id);
            $refer_friend->user = $user->first_name . ' ' . $user->last_name;
        }

        return $refer_friends;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $refer_friends = ReferFriend::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $refer_friends = $this->processReferFriends($refer_friends);

        return view('backend.communications.refer-friends.index', [
            'refer_friends' => $refer_friends,
            'items' => $items
        ]);
    }

    public function destroy(ReferFriend $refer_friend)
    {
        $refer_friend->status = '0';
        $refer_friend->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}