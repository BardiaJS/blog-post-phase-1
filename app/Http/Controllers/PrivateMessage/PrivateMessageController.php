<?php

namespace App\Http\Controllers\PrivateMessage;

use App\Events\PrivateMessage\PrivateMessageDeleted;
use App\Events\PrivateMessage\PrivateMessageSent;
use App\Events\PrivateMessage\PrivateMessageUpdated;
use App\Http\Resources\PrivateMessage\PrivateMessageResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PrivateMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrivateMessage\CreatePrivateMessageRequest;
use App\Http\Requests\PrivateMessage\UpdatePrivateMessageRequest;

class PrivateMessageController extends Controller
{
    public function send_private_message(CreatePrivateMessageRequest $createPrivateMessageRequest , User $user){
        $validated = $createPrivateMessageRequest->validated();
        $validated['receiver_id'] = $user->id;
        $private_message = PrivateMessage::create($validated);
        broadcast(new PrivateMessageSent($private_message));
        return new PrivateMessageResource($private_message);
    }

    public function edit_private_message(UpdatePrivateMessageRequest $updatePrivateMessageRequest , PrivateMessage $privateMessage){
        $validated = $updatePrivateMessageRequest->validated();
        $privateMessage->update($validated);
        broadcast(new PrivateMessageUpdated($privateMessage));

        return new PrivateMessageResource($privateMessage);
    }

    public function delete_private_message(PrivateMessage $privateMessage){
        broadcast(new PrivateMessageDeleted($privateMessage));
        $privateMessage->delete();
    }
}
