<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        Mail::raw($validated['message'], function ($msg) use ($validated) {
            $msg->to('admin@example.com')
                ->subject('Pesan dari ' . $validated['name'])
                ->replyTo($validated['email']);
        });

        return back()->with('success', 'Pesan berhasil dikirim.');
    }
}
