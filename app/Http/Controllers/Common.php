<?php

namespace App\Http\Controllers;


use App\Company;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class Common extends Controller
{
    public function index()
    {
        return View('welcome');
    }
    public function login()
    {
        return View('login');
    }
    public function doLogin()
    {
        $this->validate(\request() , ['email' => 'required' , 'password'=> 'required']  );
        if(Auth::attempt(['email' => \request('email'), 'password' => \request('password')]))
        {

            Session::put('user_id' , Auth::user()->id);

            if(Auth::user()->type = 1)
            {
                return View('adminHome');
            }
            else{
                return View('userHome');
            }

        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
    public function register()
    {
        $companies = Company::all();
        return View('register')->with('companies', $companies);

    }


    public function store()
    {

        $this->validate(request(), [
            'name' => 'required | unique:users',
            'email' => 'required|email |unique:users',
            'password' => 'required| min:3',
            'phone' => 'required | unique:users'
        ]);

        $user = User::create(request(['phone' , 'name' , 'email' , 'password'  , 'company_id']));

        //login
        auth()->login($user);
        // redirect
        return View('userHome')->with(['user' =>$user]);

    }

}

