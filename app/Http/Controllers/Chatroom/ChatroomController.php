<?php

namespace App\Http\Controllers\Chatroom;

use App\Models\User;
use App\Models\Chatroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Message\MessageController;
use App\Http\Requests\Message\CreateMessageRequest;
use App\Http\Requests\Chatroom\CreateChatroomRequest;

class ChatroomController extends Controller
{
    public function create_private_chatroom( User $user , CreateMessageRequest $createMessageRequest){
        if(Auth::user()->chatrooms()->messages()->receiver_id != $user->id){
            $validated ['is_private'] = 1;
            $chatroom = Chatroom::create($validated);
            $message_controller = App::make(MessageController::class);
            $message = $message_controller->create_message($user , $chatroom , $createMessageRequest);
            
            return response()->json([
                'chatroom created and message sent successfully!' ,
                'message' => $message
            ]);
        }else{
            $messages = Auth::user()->chatrooms()->messages()->MessageWithReceiverId($user->id)->get();
            
            return response()->json([
                'messages' => $messages
            ]);
        }
    }

    public function create_public_chatroom(){
            $validated ['is_private'] = 0;
            Chatroom::create($validated);

            return response()->json([
                'chatroom created successfully!'
            ]);
    }
    
    public function add_member_to_pulbic_chatroom(User $user , Chatroom $chatroom){
        if(! $chatroom->messages()->messageWithReceiverId($user->id)->get()){
            $user_id = $user->id;

        }
        
    }


    public function delete_chatroom(Chatroom $chatroom){
        if(!($chatroom->messages)){
            return redirect('/api');
        }else{
            $chatroom->delete();

            return response()->json([
                'chatroom deleted successfully!'
            ]);
        }
    }



}
