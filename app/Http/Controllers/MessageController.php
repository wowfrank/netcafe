<?php

namespace Netcafe\Http\Controllers;

use Illuminate\Http\Request;

use Netcafe\Http\Requests;
use Netcafe\Http\Controllers\Controller;

use Netcafe\Models\Message;
use Netcafe\Http\Requests\MessageCreateRequest;


class MessageController extends Controller
{
    protected $fields = [
    'msg_content' => ''];

    // this will list all messages we saved in our database
    public function listMessages() {
        
    	return view('message.list')
    				->withMessages(Message::orderBy('created_at', 'desc')->paginate(config('home.numOfMessages')))
                    ->withTitle(trans('messages.Messages'));
    }

    // this will store a single message to our database
    // @param $request
    public function storeMessage(MessageCreateRequest $request) {
    	if(!$request->ajax()) {
    		$message = Message::create($request->all());

            $message->cafe_service = (null !== $request->input('cafe_service')) ? true : false;
            $message->cafe_environment = (null !== $request->input('cafe_environment')) ? true : false;
            $message->cafe_price = (null !== $request->input('cafe_price')) ? true : false;
            $message->cafe_hygiene = (null !== $request->input('cafe_hygiene')) ? true : false;
            $message->cafe_hardware = (null !== $request->input('cafe_hardware')) ? true : false;

    		$message->msg_ip = $request->ip();
    		$message->save();

            return redirect()
                ->route('message.list')
                ->withSuccess(trans('messages.New Message Successfully Created.'));
    	}
    }
}
