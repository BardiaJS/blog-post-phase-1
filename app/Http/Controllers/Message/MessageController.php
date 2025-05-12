<?php

namespace App\Http\Controllers\Message;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Message\CreateMessageRequest;
use App\Models\Chatroom;
use App\Models\Message;
use App\Events\MessageSent;

class MessageController extends Controller
{
    //
    public function create_message(User $user , Chatroom $chatroom , CreateMessageRequest $createMessageRequest){
        $chatroom_id = $chatroom->id;
        $validated = $createMessageRequest->validated();
        $validated['chatroom_id'] = $chatroom_id;
        $validated['receiver_id'] = $user->id;
        $message = Message::create($validated);
        event(new MessageSent($message));
        return $message;
    }
}
