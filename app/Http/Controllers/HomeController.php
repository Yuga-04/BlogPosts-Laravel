<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function contactForm(){
        return view('contact.form');
    }

    public function submitContactForm(Request $request){
       $validatied= $request->validate([
            'name'=>'required|max:15',
            'email'=>'required|email',
            'message'=>'required',
        ]);
            // $data=$request->all();
            return redirect()->route('contact.show')->with('status','Your message has been sent Successfully');
    }

    public function about(){
        return view('about.about');
    }
}
