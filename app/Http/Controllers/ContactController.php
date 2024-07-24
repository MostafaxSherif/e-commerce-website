<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $textContents = ContactMessage::all();
        return view('contact', ['textContents' => $textContents]);
    }

    public function Dashindex()
    {
        $textContents = ContactMessage::all();
        return view('Dashboard.contact.Contact', ['textContents' => $textContents]);
    }

    // Add store method to handle form submission
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
        ]);
    
        $firstname = $validatedData['firstname'];
        $email = $validatedData['email'];
        $subject = $validatedData['subject'];
    
        ContactMessage::create([
            'firstname' => $firstname,
            'email' => $email,
            'subject' => $subject,
        ]);
        

        return redirect()->back();
    }
    public function destroy($id)
    {
        $contactMessage = ContactMessage::findOrFail($id);
        $contactMessage->delete();
    
        return redirect()->back();
    }
};
