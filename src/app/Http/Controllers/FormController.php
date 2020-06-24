<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\Factory as View;

class FormController extends Controller
{

    public function ContactForm() {

        $validator = Validator::make(request()->all(), [
            'name' => '',
            'phone_number'=> 'required_without:email',
            'email'=> 'required_without:phone_number',
            'rodo'=> 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'values' => request()->post()
            ]);
        }

        $sender = GetConstField('email_1');
        $recipient = GetConstField('email_1');

        $subject = 'Wiadomosc ze strony ' . GetConstField('page_name');
        $message = 'Imie i nazwisko: '. request()->post('name') . "\r\n";
        $message .= 'Numer kontaktowy: '. request()->post('phone_number') . "\r\n\n";
        $message .= 'Adres email: '. request()->post('email') . "\r\n\nWiadomosc: \r\n\n";
        $message .= request()->post('message');
        $headers = 'From: ' . GetConstField('email_1') . "\r\n" .
            'Reply-To: ' . GetConstField('email_2') ?? '' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $headers = 'From:' . $sender;


        if (mail($recipient, $subject, $message, $headers))
        {
            return response()->json(['status' => 'ok', 'success'=>request()->post()]);
        }
        else
        {
            return response()->json(['status' => '500', 'success'=> 'Email nie został wysłany!']);
        }



    }
}
