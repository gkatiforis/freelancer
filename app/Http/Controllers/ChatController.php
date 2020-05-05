<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ChatMessages;
use App\Conversation;

use App\User;

use Input;


class ChatController extends Controller
{


    public  function getChat()
    {
        $user_id =  \Auth::user()->id;
        $conversations = Conversation::orWhere('user_one','=',$user_id)
            ->orWhere('user_two','=',$user_id)->get();


        $users = array();

        foreach ($conversations as $conv) {

            if($conv->user_one == $user_id)
                $user = User::find($conv->user_two);
            else
                $user = User::find($conv->user_one);

            array_push($users, $user);
        }




        return view('chat')
            ->with('conversations', $conversations)
            ->with('users', $users);
    }




    public  function getConversation()
    {
        if (\Request::ajax()) {

            $messages  = \DB::table('chat_messages')
                ->where('conversation_id','=',Input::get('conversation_id') )
                ->leftJoin('users', 'users.id', '=', 'sender_id')
                ->orderBy('chat_messages.created_at')
                ->get( );

            echo json_encode(array('messages'=> $messages));

        }
    }

    public  function createNewConversasion()
    {
        if(\Request::ajax()) {

            $conv = new Conversation( );

            $conv->user_one= Input::get('user-two');
            $conv->user_two= Input::get('user-one');
            $conv->save();

            $msg = new ChatMessages();

            $msg->conversation_id = $conv->id;
            $msg->sender_id = $conv->user_one;
            $msg->message = Input::get('message');
            $msg->read = false;
            $msg->save();

            echo json_encode(array('conversation'=> $conv));
        }


    }


    public function sendMessage()
    {
        if(\Request::ajax()) {
            $user_id = Input::get('user_id');
            $conv_id = Input::get('conv_id');
            $text = Input::get('text');

            $chatMessage = new ChatMessages();
            $chatMessage->sender_id = $user_id;
            $chatMessage->message = $text;
            $chatMessage->conversation_id  = $conv_id;
            $chatMessage->read = 0;
            $chatMessage->save();
            echo json_encode(array('chatMessage'=>$chatMessage));
        }
    }




    public function retrieveChatMessages()
    {
        $user_id = Input::get('user_id');
        $conv_id = Input::get('conv_id');

        $messages =  \DB::table('chat_messages')->where('sender_id', '=', $user_id)->where('read', '=', 0)->where('conversation_id', '=', $conv_id)
            //   ->leftJoin('users', 'users.id', '=', 'sender_id')
            ->orderBy('chat_messages.created_at')->get();

        foreach($messages as $message)
        {
            $msg = ChatMessages::find($message->id);
            $msg->read = 1;
            $msg->save();
            // return $message->message;
        }
        echo json_encode(array('messages'=>$messages));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
