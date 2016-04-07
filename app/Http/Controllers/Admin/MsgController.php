<?php

namespace Netcafe\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Netcafe\Http\Requests;
use Netcafe\Http\Controllers\Controller;

use Netcafe\Models\Message;
use Netcafe\Http\Requests\MessageCreateRequest;

class MsgController extends Controller
{
    protected $fields = [
                'msg_uid'           => '',
                'msg_content'       => '',
                'msg_ip'            => '',
                'msg_agreement'     => '',
                'cafe_service'      => '',
                'cafe_environment'  => '',
                'cafe_hygiene'      => '',
                'cafe_hardware'     => '',
                'cafe_price'        => '',
    ]; 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $msgs = Message::all();

        return view('admin.message.index')
                    ->withMsgs($msgs);
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
        $msg = Message::findOrFail($id);
        $msg->delete();

        return redirect('/admin/message')
            ->withSuccess("The '$msg->id' message has been deleted.");
    }
}
