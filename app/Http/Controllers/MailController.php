<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactUsMail;

class MailController extends Controller
{
    public function index(Request $request)
    {
        $mailData = [
            'title' => 'Mail from Ogani.com',
            'name' => $request->name,
            'mail' => $request->mail,
            'body' => $request->body,
        ];
         
        Mail::to('moviedownload814@gmail.com')->send(new ContactUsMail($mailData));
           
        return redirect()->route('contact.page')->with('message', 'Mail send successful!');
    }
}
