<?php

namespace App\Http\Controllers\Backend\Communication;

use App\Http\Controllers\Controller;
use App\Models\Connection;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    private function processConnections($connections)
    {
        foreach($connections as $connection) {
            $connection->action = '
            <a id="'.$connection->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';
        }

        return $connections;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $connections = Connection::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $connections = $this->processConnections($connections);

        return view('backend.communications.connections.index', [
            'connections' => $connections,
            'items' => $items
        ]);
    }

    public function destroy(Connection $connection)
    {
        $connection->status = '0';
        $connection->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}