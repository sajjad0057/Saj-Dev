<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{



    public function Contact()
    {   

        $contacts = Contact::all();
        return view('pages.contact',compact('contacts'));

    }

    public function AllContact()
    {   

        $contacts = Contact::all();
        return view('admin.contact.contact',compact('contacts'));

    }

    public function StoreContact(Request $request)
    {   

        $validated = $request->validate([
            'contact_address' => 'required',
            'contact_email' => 'required',
            'contact_no' => 'required',
        ]);

        $contact = new Contact;
        $contact->location = $request->contact_address;
        $contact->email = $request->contact_email;
        $contact->contact_no = $request->contact_no;
        $contact->save();

        return Redirect()->route('all.contact')->with('success','Contact Info Inserted Successfully !');
    }

    public function EditContact($id)
    {   
        $contact = Contact::find($id);
        return view('admin.contact.edit',compact('contact'));
    }

    public function UpdateContact(Request $request,$id)
    {
        $validated = $request->validate([
            'contact_address' => 'required',
            'contact_email' => 'required',
            'contact_no' => 'required',
        ]);

        Contact::find($id)->update([
            'location'=>$request->contact_address,
            'email'=>$request->contact_email,
            'contact_no'=>$request->contact_no,
        ]);

        return Redirect()->route('all.contact')->with('success','Contact Info Updated Successfully !');
    }

    public function DeleteContact($id)
    {
        Contact::find($id)->delete();
        return Redirect()->route('all.contact')->with('success','Contact Info Deleted Successfully !');
    }

    public function ContactMessage()
    {
        # code...
    }



}



