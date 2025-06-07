<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function show(User $user)
    {
        $chats = Chat::where(function($q) use ($user){
            $q->where('sender_id', Auth::id())->where('receiver_id', $user->id);
        })
        ->orWhere(function($q) use ($user){
           $q->where('sender_id', $user->id)->where('receiver_id', Auth::id()); 
        })->orderBy('created_at')->get();

        return inertia('Chats/show', [
            'user' => $user,
            'chats' => $chats,
        ]);
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'message' => ['required'],
        ]);

        Auth::user()->chats()->create([
            'receiver_id' => $user->id,
            'message' => $request->message
        ]);

        return back();
    }
}
