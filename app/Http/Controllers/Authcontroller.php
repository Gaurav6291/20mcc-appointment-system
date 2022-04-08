<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Schedule;
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
            'name' => 'required',
            'email' => 'required | email',
            'contact_number' => 'required|digits:10',
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

    //show project types -- 1.) Residential, 2.) commercial, 3.) industrial 
    public function project_type(){
        return view('layouts.project_type');
    }

    //after selecting project type, redirect to its subtype -- 1.) waterproofing, 2.) constructional application
    //for remembering the previous options, i am storing the data in session
    public function third_screen(Request $request, $id){
        if($id == '1'){
            $project_type = "residential";
        }
        else if($id == '2'){
            $project_type = "commercial";
        }else if($id == '3'){
            $project_type = "industrial";
        }
        $session = $request->session()->put('project-type', $project_type);
        
        return view('layouts.third_screen', [
            'project_type'=> $project_type,
        ]);
    }

    //after selecting subtype, show its form to select further options.
    public function fourth_screen(Request $request, $id){
        
        if($id == '1'){
            $third_screen = "waterproofing";
            $session = $request->session()->put('third-screen', $third_screen);
            return view('layouts.waterproofing_form');
        }
        else if($id == '2'){
            $third_screen = "construction application";
            $session = $request->session()->put('third-screen', $third_screen);
            return view('layouts.construction_application_form');
        }
    }

    // show the page from which we can select the areas.
    public function fifth_screen(Request $request, $id){
        $page = $request->session()->get('third-screen');

        if($id == '1' && $page == 'waterproofing'){
                $area = "Below 200 sqft";
                $session = $request->session()->put('area', $area);
                return view('layouts.waterproofing_types', [
                'area' => $area,
            ]);
        }
        else if($id == '2' && $page == 'waterproofing'){
                $area = "200 sqft to 500 sqft";
                $session = $request->session()->put('area', $area);
                return view('layouts.waterproofing_types', [
                'area' => $area,
            ]);
        }
        else if($id == '3' && $page == 'waterproofing'){
                $area = "500 to 1000 sqft";
                $session = $request->session()->put('area', $area);
                return view('layouts.waterproofing_types', [
                'area' => $area,
            ]);
        }
        else if($id == '4' && $page == 'waterproofing'){
                $area = "1000sqft to 2000 sqft";
                $session = $request->session()->put('area', $area);
                return view('layouts.waterproofing_types', [
                'area' => $area,
            ]);
        }
        else if($id == '5' && $page == 'waterproofing'){
                $area = "Above 2000 sqft";
                $session = $request->session()->put('area', $area);
                return view('layouts.waterproofing_types', [
                'area' => $area,
            ]);
        }
        
        if($id == '1' && $page == 'construction application'){
                $area = "Below 500 Sqft";
                $session = $request->session()->put('type', $area);
                return view('layouts.construction_application_type', [
                'area' => $area,
            ]);
        }
        else if($id == '2' && $page == 'construction application'){
                $area = "500 Sqft to 1500 Sqft";
                $session = $request->session()->put('area', $area);
                return view('layouts.construction_application_type', [
                'area' => $area,
            ]);
        }
        else if($id == '3' && $page == 'construction application'){
                $area = "1500 Sqft to 2500 Sqft";
                $session = $request->session()->put('area', $area);
                return view('layouts.construction_application_type', [
                'area' => $area,
            ]);
        }
        else if($id == '4' && $page == 'construction application'){
                $area = "2500 Sqft to 5000 Sqft";
                $session = $request->session()->put('type', $area);
                return view('layouts.construction_application_type', [
                'area' => $area,
            ]);
        }
        else if($id == '5' && $page == 'construction application'){
                $area = "5000 Sqft";
                $session = $request->session()->put('area', $area);
                return view('layouts.construction_application_type', [
                'area' => $area,
            ]);
        }
    }
    
    //now on the basis of selected option, let the user to select related images
    public function sixth_screen(Request $request, $id){
        $page = $request->session()->get('third-screen');
        if($id == '1' && $page == 'waterproofing'){
                $type = "Wall waterproofing";
                $session = $request->session()->put('type', $type);
                return view('layouts.img_form', [
                'type' => $type,
            ]);
        }
        else if($id == '2' && $page == 'waterproofing'){
                $type = "Roof waterproofing";
                $session = $request->session()->put('type', $type);
                return view('layouts.img_form', [
                'type' => $type,
            ]);
        }
        else if($id == '3' && $page == 'waterproofing'){
                $type = "Pool Waterproofing";
                $session = $request->session()->put('type', $type);
                return view('layouts.img_form', [
                'type' => $type,
            ]);
        }
        else if($id == '4' && $page == 'waterproofing'){
                $type = "Ceiling Waterproofing";
                $session = $request->session()->put('type', $type);
                return view('layouts.img_form', [
                'type' => $type,
            ]);
        }
        else if($id == '5' && $page == 'waterproofing'){
                $type = "Pavement Waterproofing";
                $session = $request->session()->put('type', $type);
                return view('layouts.img_form', [
                'type' => $type,
            ]);
        }
        else if($id == '6' && $page == 'waterproofing'){
                $type = "Dampness";
                $session = $request->session()->put('type', $type);
                return view('layouts.img_form', [
                'type' => $type,
            ]);
        }
        else if($id == '7' && $page == 'waterproofing'){
                $type = "Cracks Filling";
                $session = $request->session()->put('type', $type);
                return view('layouts.img_form', [
                'type' => $type,
            ]);
        }
        else if($id == '8' && $page == 'waterproofing'){
                $type = "Molds";
                $session = $request->session()->put('type', $type);
                return view('layouts.img_form', [
                'type' => $type,
            ]);
        }
        else if($id == '9' && $page == 'waterproofing'){
                $type = "Paint Peel-Off";
                $session = $request->session()->put('type', $type);
                return view('layouts.img_form', [
                'type' => $type,
            ]);
        } 
        if($id == '1' && $page == 'construction application'){
                $type = "Masonary Work";
                $session = $request->session()->put('type', $type);
                return view('layouts.img_form', [
                'type' => $type,
            ]);
        }
        else if($id == '2' && $page == 'construction application'){
                $type = "Plastering Area";
                $session = $request->session()->put('type', $type);
                return view('layouts.img_form', [
                'type' => $type,
            ]);
        }
        else if($id == '3' && $page == 'construction application'){
                $type = "Slabs & Water Leakage";
                $session = $request->session()->put('type', $type);
                return view('layouts.img_form', [
                'type' => $type,
            ]);
        }
        else if($id == '4' && $page == 'construction application'){
                $type = "High Strength Construction";
                $session = $request->session()->put('type', $type);
                return view('layouts.img_form', [
                'type' => $type,
            ]);
        }
    }

    // after selecting image, store the image in our local machine, also lets ask the date and time for appointment. 
    public function img_submit(Request $request){
        $image_1="";
        if($request -> hasFile('image_1')){
            $extension = $request -> file('image_1') -> extension();
            $file  = $request->file('image_1');
            $fileNameString = (string) Str::uuid();
            $image_1 = $fileNameString.".".$extension;
            $path = Storage::putFileAs('public/image', $file, $image_1);      
        $session = $request->session()->put('image_1', $image_1);
        }

        $image_2="";
        if($request -> hasFile('image_2')){
            $extension = $request -> file('image_2') -> extension();
            $file  = $request->file('image_2');
            $fileNameString = (string) Str::uuid();
            $image_2 = $fileNameString.".".$extension;
            $path = Storage::putFileAs('public/image', $file, $image_2);         
            $session = $request->session()->put('image_2', $image_2);

        }

        $image_3="";
        if($request -> hasFile('image_3')){
            $extension = $request -> file('image_3') -> extension();
            $file  = $request->file('image_3');
            $fileNameString = (string) Str::uuid();
            $image_3 = $fileNameString.".".$extension;
            $path = Storage::putFileAs('public/image', $file, $image_3);      
            $session = $request->session()->put('image_3', $image_3);

        }

        return view('calander');
    }

    //now lets store all the data of the user in our database. also after this redirect to our main page with success notification. 
    public function final_submit(Request $request, $id){   
        $post = new Schedule([
            'project_type' => $request->session()->get('project-type'),
            'third_screen' => $request->session()->get('third-screen'),
            'area' => $request->session()->get('area'),
            'type' => $request->session()->get('type'),
            'image_1' => $request->session()->get('image_1'),
            'image_2' => $request->session()->get('image_2'),
            'image_3' => $request->session()->get('image_3'),
            'user_id' => $id,    
            'start_date' => $request->input('start_date'),    
            'start_time' => $request->input('start_time'),    
            'end_date' => $request->input('end_date'),    
            'end_time' => $request->input('end_time'),    
        ]);
        $post->save();

        return redirect("/")->with('message', 'Thank You!');
    }
}
