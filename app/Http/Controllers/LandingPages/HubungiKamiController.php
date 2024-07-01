<?php

namespace App\Http\Controllers\LandingPages;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\Satker;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


class HubungiKamiController extends Controller
{
    public function index()
    {
        $satkers = Satker::all();
        $jumlahAnggota = 0;
        $faqs = Faq::all();

        return view('landing-page.hubungi-kami', compact('satkers', 'jumlahAnggota', 'faqs'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        $data = $request->only('name', 'email', 'phone', 'message');

        Mail::to('bukitasam@gmail.com')->send(new ContactFormMail($data));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
