<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    //
    public function mailContact(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|integer',
            'email' => 'required|email',
            'services' => 'required|string',
            'message' => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ]);
        }

        $to = Config::get('app.mail_to');
        $subject = 'Pesan Dari Customer Maggoplastgel';
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $services = $request->services;
        $message = $request->message;

        try {
            Mail::to($to)->send(new ContactMail($subject, $name, $phone, $email, $services, $message));

            return response()->json([
                'status' => true,
                'message' => 'Berhasil mengirim email.',
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'message' => 'Gagal mengirim email. '. $th->getMessage(),
            ]);
        }


    }
}
