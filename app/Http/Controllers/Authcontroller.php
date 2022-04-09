<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Authcontroller extends Controller
{
    //show login page 
    public function index(){
        return view('auth.login');
    }

    //login validations and login attemps
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        if(\Auth::attempt($request->only('email','password'))){
            return redirect('home');
        }
        return redirect('login')->withError('Login Details Are Not Valid');
    }

    //show Register Page
    public function register_view(){
        return view('auth.register');
    }

    //Registration form validation, create new user and attempts
    public function register(Request $request){
        $request -> validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required | email',
            'contact_number' => 'required|max:10|min:10',
            'address' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'contact_number'=>$request->contact_number,
            'address'=>$request->address,
            'password'=> \Hash::make($request->password),
        ]);

        if(\Auth::attempt($request->only('email','password'))){
            return redirect('home');
        }

        return redirect('register')->withError('Error');

    }

    //if user is registered or logged in then show home/profile page
    public function home(){
        return view('home');
    }

    //logout from here 
    public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('/');
    }

}