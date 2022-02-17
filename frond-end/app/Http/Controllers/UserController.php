<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function profile($name){
        $user = User::where('name', '=', $name)->firstorfail();
        return view('users.profile', compact('user'));
    }

    public function edit($id){

        $user = User::findorfail($id);

        if($user->id != Auth::user()->id){
            abort(403);
        }

        return view('users.edit', compact('user'));


    }

    public function update($id, Request $request){

        $user = User::findorfail($id);

        if($user->id != Auth::user()->id){
            abort(403);
        }


        $validated = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|max:225',
            'bio' => 'required',
            'password' => 'required|min:8'
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->bio = $validated['bio'];
        if ($validated['password'] == '') {
          $user->password = Auth::user()->password;
        }else {
            $user->password = $validated['password']; 
        }
        
        $user->save();
        
        return redirect()->route('profile', $user->name);
    }

    public function admin($name){

        $users = User::all()->except(Auth::id()); 
        
        return view('users.panel', compact('users'));
    }


    public function about(){

        return view('about');
    }


}
