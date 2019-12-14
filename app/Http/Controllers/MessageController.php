<?php

namespace App\Http\Controllers;

use App\Member;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::user()->id;
        $messages = Message::where('receiver_id', $id)->paginate(10);

        return view('member.inbox')->with('messages', $messages);
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
    public function store(Request $request, Member $member)
    {
        //
        $validation = [
            'message' => 'min:1'
        ];
        $this->validate($request, $validation);


        $message = Message::create([
            'message' => $request->message,
            'sender_id' => Auth::user()->id,
            'receiver_id' => $member->id
        ]);

        return redirect()->route('member', [$member])->with(['status' => 'Your message has been sent to '.$member->name]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $sender = $message->sender->name;
        Message::destroy($message->id);
        return view('member.inbox', [
            'notification' => 'Message from '.$sender.' has been deleted',
            'messages' => Message::where('receiver_id', Auth::user()->id)->paginate(10)
            ]);
    }
}
