<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Hash;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
       
    }

    public function login(Request $request)
    {      
           
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required',           
            ]);
            $userLogin = User::where('email','=', $request->email)->first();          
            if($userLogin)
            {
                if(Hash::check($request->password, $userLogin->password))
                {
                    $request->session()->put('userID', $userLogin->id);
                    $request->session()->put('userEmail', $userLogin->email);
                    return redirect('company');

                } else {
                    return back()->with('failed', 'Please check your password');
                }
            
            } else {
                return back()->with('failed', 'Please check you email');
            }     

     }

     public function logout() 
     {

        if(Session::has('userID'))
        {
            Session::pull('userID');
            Session::pull('userEmail');
            return redirect('/');
        }


     }
    
}
