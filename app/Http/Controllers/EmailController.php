<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendApprovalEmail(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'approvalLink' => 'required|url',
        ]);

        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $approvalLink = $validatedData['approvalLink'];

        try {
            Mail::send('emails.approval', [
                'name' => $name,
                'approvalLink' => $approvalLink,
            ], function ($message) use ($name, $email) {
                $message->to($email, $name)
                    ->subject('Permintaan Validasi Anggota');
            });

            return redirect()->back()->with('success', 'Email validasi berhasil dikirim.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }
}
