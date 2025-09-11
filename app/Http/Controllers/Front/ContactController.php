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
        public function show(){
        $contacts = Contact::all();
        return view('dashboard.contacts.index',compact('contacts'));
    }
    public function destroy($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('dash.contact')
            ->with('success','تم حذف الرسالة بنجاح');

    }

}
