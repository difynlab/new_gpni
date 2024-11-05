<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\ReferFriend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteFriend;

class ReferFriendController extends Controller
{
    public function index()
    {
        $student_id = Auth::id();
        $language = session('language', 'en');
        
        $translations = [
            'en' => [
                'title' => 'Refer a Friend',
                'email_label' => 'Email Address',
                'email_placeholder' => "Enter the email address of the friend you'd like to refer",
                'submit_button' => 'Send Invite',
                'view_history' => 'View History',
            ],
            'zh' => [
                'title' => '推荐朋友',
                'email_label' => '电子邮件地址',
                'email_placeholder' => '输入你想推荐朋友的电子邮件地址',
                'submit_button' => '发送邀请',
                'view_history' => '查看历史记录',
            ],
            'ja' => [
                'title' => '友達を紹介する',
                'email_label' => 'メールアドレス',
                'email_placeholder' => '紹介したい友達のメールアドレスを入力してください',
                'submit_button' => '招待を送る',
                'view_history' => '履歴を見る',
            ],
        ];
    
        $translatedText = $translations[$language] ?? $translations['en'];
    
        return view('frontend.student.refer-friend', [
            'translatedText' => $translatedText,
            'language' => $language
        ]);
    }

    public function showHistory()
    {
        $student_id = Auth::id();
        $invites = ReferFriend::where('user_id', $student_id)->get();

        return response()->json($invites);
    }

    public function sendInvite(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // Save referral in the database
        $referFriend = new ReferFriend();
        $referFriend->user_id = Auth::id();
        $referFriend->email = $request->input('email');
        $referFriend->status = '0'; // 0 for pending invite
        $referFriend->save();

        // Send email
        Mail::to($request->input('email'))->send(new InviteFriend(Auth::user()));

        return redirect()->back()->with('success', 'Invitation sent successfully!');
    }
}