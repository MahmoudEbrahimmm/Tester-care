<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('front.contact');
    }
    public function showContact(){
        $contacts = Contact::all();
        return view('dashboard.contact.index',compact('contacts'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>['required','string','max:255'],
            'email' => ['required', 'string', 'email'],
            'description'=>['required','string'],
        ]);
        Contact::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'description'=> $request->description,
        ]);
        return redirect()->route('home')->with('success','تم ارسال رسالتكم بنجاح');
    }
    public function delete($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
    }

}
