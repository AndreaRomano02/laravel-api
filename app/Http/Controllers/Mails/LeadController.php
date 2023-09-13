<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request  $request)
    {
        $data = $request->all();
        Mail::to('test@boolean.com')->send(new NewContact($data['email'], $data['object'], $data['content']));
    }
}
