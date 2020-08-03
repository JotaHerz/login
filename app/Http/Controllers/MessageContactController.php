<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

class MessageContactController extends Controller
{
     public function store(){

        $msg=request()->validate([
        'name'=>'required',
        'email'=>'required|email',
        'subject'=>'required',
        'content'=>'required|min:3',
        ]);

        Mail::to('Bio.jherz@gmail.com')->queue(new MessageReceived($msg));
        return back()->with('status', 'Tu mensaje fue enviado, pronto te responderemos');
     }
}
