<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;

class ContactController extends Controller
{
    public function aboutus()
    {
        return view('info.about');
    }

    public function contacts()
    {
        return view('info.contacts');
    }

    public function thanks(Request $request)
    {

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contact = $request->contact;
        $contact->message = $request->message;
        $contact->subject = $request->subject;
        $contact->save();

        return view('info.thanks');
    }

    public function feedbacks()
    {
        if (!Auth::User() || Auth::User()->isAdmin == false) {            
            return \Redirect::route('about');
        }

        $contacts = Contact::orderBy("created_at", "desc")->paginate(5);

        $allContacts = Contact::all();
        foreach ($allContacts as $contact) {
            if ($contact->read == false) {
                $contact->read = true;
                $contact->save();
            }
        }
        return view('info.feedbacks')->with(compact('contacts'));
    }
}
