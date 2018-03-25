<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    //
    public function submit(Request $request){
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required'
    		]);

    	//Message
    	$message = new Message;
    	$message->name = $request->input('name');
    	$message->email = $request->input('email');
    	$message->message = $request->input('message');
    	//Save Message
    	$message->save();

        //redirect to home page
    	return redirect('/')->with('success', 'Message Sent');
    }
    //get information from database
    public function getMessages(){
		$messages = Message::all();

		return view('massages')->with('messages', $messages);

	}
}
