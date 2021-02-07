<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\message;

class messageController extends Controller
{
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
        $message = new message();
        $message->name=$request->input('name');
        $message->phone=$request->input('phone');
        if($request->input('email')){
            $message->email=$request->input('email');
        }else{
            $message->email=' لم يتم إرفاق بريد إلكتروني';
        }
        $message->message=$request->input('message');
        $message->read='no';
        $message->save();
        return redirect()->route('main.show')->with('message_success','رسالتك قد وصلتنا. سنحاول الرد بأسرع وقت');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $messages = message::all();
        return view('admin_get_message',['message'=>$messages]);
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
        $message = message::find($id);
        $message->delete();
        return redirect('/admin_get_message');
    }
}
