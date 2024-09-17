<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class ChatController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $authUser = Auth::user();
    
        // Fetch the last 10 unique receivers with the latest chat for each
        $recentChats = DB::table('chats')
        ->select('users.id as user_id', 'users.name', 'users.role', 'chats.message', 'chats.timestamp')
        ->join('users', 'chats.receiver_id', '=', 'users.id') // Join with users table
        ->join(DB::raw('(SELECT receiver_id, MAX(timestamp) as latest_chat 
                         FROM chats 
                         WHERE sender_id = ' . $authUser->id . ' 
                         GROUP BY receiver_id) as latest_chats'), 
               'chats.receiver_id', '=', 'latest_chats.receiver_id')
        ->where('chats.timestamp', '=', DB::raw('latest_chats.latest_chat'))
        ->where('chats.sender_id', $authUser->id)
        ->distinct('chats.receiver_id') // Ensure distinct receiver IDs
        ->orderBy('latest_chats.latest_chat', 'desc') // Order by the latest chat's timestamp
        ->limit(10)
        ->get();
        // Get the selected user if any
        $selectedUser = null;
        $chats = [];
    
        if (session()->has('selected_user')) {
            $selectedUser = User::find(session('selected_user'));
            // dd($selectedUser);
            $chats = Chat::where(function($query) use ($selectedUser) {
                $query->where('sender_id', Auth::id())
                      ->where('receiver_id', $selectedUser->id);
            })->orWhere(function($query) use ($selectedUser) {
                $query->where('sender_id', $selectedUser->id)
                      ->where('receiver_id', Auth::id());
            })->get();
        }
        // dd($chats);
        return view('chat', [
            'recentChats' => $recentChats,
            'selectedUser' => $selectedUser,
            'chats' => $chats
        ]);
    }
    
    
    public function indexbox()
    {
        // Get the authenticated user
        $authUser = Auth::user();
    
        // Fetch the last 10 unique receivers with the latest chat for each
        $recentChats = DB::table('chats')
        ->select('users.id as user_id', 'users.name', 'users.role', 'chats.message', 'chats.timestamp')
        ->join('users', 'chats.sender_id', '=', 'users.id') // Join with users table to get sender details
        ->join(DB::raw('(SELECT receiver_id, sender_id, MAX(timestamp) as latest_chat 
                         FROM chats 
                         WHERE receiver_id = ' . $authUser->id . ' 
                         GROUP BY receiver_id, sender_id) as latest_chats'), 
               'chats.receiver_id', '=', 'latest_chats.receiver_id')
        ->where('chats.timestamp', '=', DB::raw('latest_chats.latest_chat'))
        ->where('chats.receiver_id', $authUser->id)
        ->orderBy('chats.timestamp', 'desc') // Order by the latest message timestamp
        ->limit(10)
        ->get();
        // Get the selected user if any
        $selectedUser = null;
        $chats = [];
    
        if (session()->has('selected_user')) {
            $selectedUser = User::find(session('selected_user'));
            // dd($selectedUser);
            $chats = Chat::where(function($query) use ($selectedUser) {
                $query->where('sender_id', Auth::id())
                      ->where('receiver_id', $selectedUser->id);
            })->orWhere(function($query) use ($selectedUser) {
                $query->where('sender_id', $selectedUser->id)
                      ->where('receiver_id', Auth::id());
            })->get();
        }
        // dd($chats);
        return view('chat', [
            'recentChats' => $recentChats,
            'selectedUser' => $selectedUser,
            'chats' => $chats
        ]);
    }
    
    public function selectUser(Request $request)
    {
        // dd($request->selected_user);
        // $request->validate([
        //     'selected_user' => 'required|exists:users,id',
        // ]);

        session(['selected_user' => $request->selected_user]);

        return redirect()->route('chat.index');
    }

    public function sendMessage(Request $request)
    {
        // dd($request->receiver_id);
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        Chat::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->route('chat.index');
    }
}
