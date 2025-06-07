<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function show(User $user)
    {
        return inertia('Chats/show', [
            'user' => $user,
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
