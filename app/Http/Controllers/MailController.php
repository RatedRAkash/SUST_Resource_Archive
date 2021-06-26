<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function sendEmail(){
        $details = [
            'title' => 'This is a test mail',
            'body' => 'This is a testing mail using gmail.'
        ];

        Mail::to("sust.techexpo@gmail.com")->send(new SendMail($details));
        return "Email Sent";

    }


}
