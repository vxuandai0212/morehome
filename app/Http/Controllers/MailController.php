<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Mail;
use App\Mail\UserSubcribed;

class MailController extends Controller
{
    public function guest_mail(Request $request)
    {
        $input = $request->mail;
        Mail::send('emails.users.feedback', ['name'=>$input["name"],'email'=>$input["email_address"], 'subject'=>$input["subject"], 'content'=>$input['mail_content']], function($message){
	        $message->to('vxuandai@gmail.com', 'Dai Vuong')->subject('Visitor Feedback!');
        });
        
        return response()->json("Mail sent!", 201);
    }

    public function subcribe(Request $request)
    {
        Mail::to($request->email)->send(new UserSubcribed());
        
        return response()->json("Thành công!", 201);
    }
}
