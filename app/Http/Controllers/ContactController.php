<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts= Contact::all();

         return view('contact-list',compact('contacts'));
    }

    public function contact(){
        return view('contact');
    }

    public function store(Request $request){
        $contact = new Contact;

        $contact->fName = $request->firstName;
        $contact->lName = $request->lastName;
        $contact->email = $request->email;

        $contact->save();
        return redirect()->back();

    }

    public function delete($id){

        $contact = Contact::find($id);
        $contact->delete();
        return redirect()-> back();

    }

    public function edit($id){
       $contact =Contact::findOrFail($id);
       return view('contact',compact('contact'));


    }


    public function update(Request $request , $id){
        $contact = new Contact;

        $contact->fName = $request->firstName;
        $contact->lName = $request->lastName;
        $contact->email = $request->email;
        $contact->save();
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('/');



    }






}
