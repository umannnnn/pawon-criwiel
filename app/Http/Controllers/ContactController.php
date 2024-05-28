<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\Message;
use App\Jobs\ContactUsJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact', [
            'title' => 'Hubungi Kami'
        ]);
    }

    public function send()
    {
        $data = request()->validate([
            'name' => 'required',
            'phone' => 'required|min:10|max:13',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Message::create($data);
        Mail::to('jokitiktok001@gmail.com')->send(new ContactUs($data));

        // dd('Email sent');

        return redirect('/contact')->with('success', 'Terima kasih, pesan anda telah terkirim. Kami akan segera meresponnya.');
    }

    
}
