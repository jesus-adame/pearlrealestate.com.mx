<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'message' => 'nullable',
        ]);

        $adminEmail = 'admin@pearlrealestate.com.mx';
        $enterLine = '<br/>';

        $body = $request->name
            . $enterLine . $request->email
            . $enterLine . $request->phone_number
            . $enterLine . $enterLine . $request->message;

        $message = new ContactMessage($request->email, $adminEmail, $body);

        $mail = new ContactMail($message);

        Mail::to($message->to)->send($mail);

        return redirect()->route('contact.index')
            ->with("success", "El correo se envío correctamente, pronto obtendra respuesta de un asesor");
    }
}
