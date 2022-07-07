<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class contactController extends Controller
{
    
    public function contact() {
        return view('frontend.contact');
    }
    
    public function contact_create(Request $request) {
        $contact = new Contact;
        $contact -> name = $request->name;
        $contact -> email = $request->email;
        $contact -> subject = $request->subject;
        $contact -> message = $request->message;
        $contact -> save();

        $message = 'Your response has been recorded. We will contact to you soon!';
        return redirect()->route('contact')->with( ['message' => $message] );
    }

    public function all_contacts() {
        $contacts = Contact::all();
        return view('backend.contacts.all_contacts', compact('contacts'));
    }

    public function view_contact() {
        $contact = Contact::get();
        return view('backend.contacts.view_contact', compact('contact'));
    }
}
