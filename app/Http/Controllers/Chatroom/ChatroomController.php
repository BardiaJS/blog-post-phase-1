<?php

namespace App\Http\Controllers\Chatroom;

use App\Models\User;
use App\Models\Chatroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Chatroom\CreateChatroomRequest;

class ChatroomController extends Controller
{
    public function create_private_chatroom( User $user){
        if(Auth::user()->chatrooms()->receiver_id != $user->id){
            $validated ['is_private'] = 1;
            $validated['receiver_id'] = $user->id;
            Chatroom::create($validated);

            return response()->json([
                'chatroom created successfully!'
            ]);
        }else{

            return redirect('/api/show-chat');
        }

    }

    public function create_public_chatroom(){
            $validated ['is_private'] = 1;
            Chatroom::create($validated);

            return response()->json([
                'chatroom created successfully!'
            ]);
    }
    
    public function add_member_to_pulbic_chatroom(Chatroom $chatroom){
        
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
