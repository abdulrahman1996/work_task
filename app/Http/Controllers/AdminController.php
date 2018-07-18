<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public  function adminHome()
    {
        return View('adminHome' , ['name'  ,Auth::user()->name]);
    }
    public function createEmployee(){

        return View('createUser' , ['companies' =>Company::all()]);
    }
    public function storeEmployee()
    {

        $this->validate(request(), [
            'name' => 'required | unique:users',
            'email' => 'required|email |unique:users',
            'password' => 'required| min:3',
            'phone' => 'required | unique:users'
        ]);

         User::create(request(['phone' , 'name' , 'email' , 'password'  , 'company_id']));

        // redirect
        return View('allEmployees' ,['employees'=>User::where('type' , '=' , 0)->get()]);

    }
    public  function  editUser()
    {
        $id = \request('id');
        \request()->validate([
            'phone' => 'required',
            'email' => 'required',
            'name' => 'required',
            'company_id' =>'required'
        ]);

        $user= User::find($id);
        $user->fill(\request()->all());
        $user->save();
        return View('allEmployees' ,['employees'=>User::where('type' , '=' , 0)->get()]);
    }
    public  function deleteUser()
    {
        $id = \request('id');
        $user=User::find($id);
        $user->delete();
        return View('allEmployees' ,['employees'=>User::where('type' , '=' , 0)->get()]);

    }
    public function getEmployerById()
    {
      $id =  \request('id');
        return View('user' , [ 'companies'=>Company::all() , 'employer' =>User::find($id)]);

    }
    public function searchEmployer()
    {
        $search_field = \request('search_field');

            $result =  User::where('name', 'LIKE', $search_field.'%')->get()
            ->merge(User::where('email', 'LIKE', $search_field.'%')->get())
            ->where('type' , '0')
            ->unique('id')->values()->all();
            return View('allEmployees' , ['employees' =>$result]);

    }
    public  function  getAllEmployees()
    {
        return View('allEmployees' ,['employees'=>User::where('type' , '=' , 0)->get()]);
    }
    public function  getAllCompanies()
    {
        return View('allCompanies' ,['companies'=>Company::all()]);
    }
}
