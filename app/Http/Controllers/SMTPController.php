<?php

namespace App\Http\Controllers;

use App\Models\SMTP;
use Illuminate\Http\Request;

class SMTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=SMTP::whereId(1)->first();
        return view('Backend.admin.Smtp.smtpIndex',compact('data'));
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
    public function store(Request $request,$id)
    {
        $data=SMTP::find($id);
        $data->mailer=$request->mailer;
        $data->host=$request->host;
        $data->port=$request->port;
        $data->username=$request->username;
        $data->password=$request->password;
        $data->encryption=$request->encryption;
        $data->sender=$request->sender;
        $data->sender_name  = $request->sender_name;
        $data->save();
        toastr()->success('Mail Update Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SMTP  $sMTP
     * @return \Illuminate\Http\Response
     */
    public function show(SMTP $sMTP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SMTP  $sMTP
     * @return \Illuminate\Http\Response
     */
    public function edit(SMTP $sMTP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SMTP  $sMTP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SMTP $sMTP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SMTP  $sMTP
     * @return \Illuminate\Http\Response
     */
    public function destroy(SMTP $sMTP)
    {
        //
    }
}
