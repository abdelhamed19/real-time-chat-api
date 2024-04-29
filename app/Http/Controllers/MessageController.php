<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\SendingMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sentMessages()
    {
        $messages = Message::where("sender", Auth::id())->get();
        if($messages->isEmpty()){
            return response()->json(['status' => 'No messages']);
        }
        return response()->json($messages);
    }
    public function receivedMessages()
    {
        $messages = Message::where("receiver", Auth::id())->get();
        if($messages->isEmpty()){
            return response()->json(['status' => 'No messages']);
        }
        return response()->json($messages);
    }
    public function sendMessage(SendingMessageRequest $request)
    {
        $validated = $request->validated();
        $receiver = $request->receiver;
        $message = Message::create($validated);
        broadcast(new MessageSent($message, Auth::id(), $receiver))->toOthers();
        return ['status' => 'Message Sent!'];
    }
}
