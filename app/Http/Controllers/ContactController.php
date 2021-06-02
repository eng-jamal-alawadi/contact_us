<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $contacts= Contact::where('user_id', Auth::user()->id)->get(); 

         return view('index',compact('contacts'));
    }

    public function contact(){
        return view('contact');
    }

    public function store(Request $request){

        $data = $request->validate([
            'firstName' => 'required|min:5|max:10' ,
            'lastName' => 'required' ,
            'email' => 'required'
        ]);


        $contact = new Contact;

        $contact->fName = $request->firstName;
        $contact->lName = $request->lastName;
        $contact->email = $request->email;
        $contact->user_id = Auth::user()->id;

        $contact->save();
        return redirect('/');

    }

    public function destroy($id){

        $contact = Contact::find($id);
        $contact->delete();
        return redirect()-> back();

    }

    public function edit($id){
       $contact =Contact::findOrFail($id);

       return view('edit',compact('contact'));
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
