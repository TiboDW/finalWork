<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
   public function contact()
   {
       return view('contact');
   }

   public function send(Request $request){
    $validated = $request->validate([
        'text' => 'required'
    ]);

    $contact= new Contact;
    $contact->text = $validated['text'];
    $contact->save();

    return redirect()->route('index');
   }
}
