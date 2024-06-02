<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        Mail::to('pedroaeickhoff@gmail.com', 'Pedro')->send(new Contact([
            'fromName' => $request->input('nome'),
            'fromEmail' => $request->input('email'),
            'message' => $request->input('message'),
        ]));

        return response()->json(['message' => 'Email enviado com sucesso!'], 200);
    }
}
