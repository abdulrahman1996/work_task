<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComponyController extends Controller
{

    public function  store()
    {

        \request()->validate([
            'address' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'name' => 'required'
        ]);
        $company = new Company();
        $company->fill(\request()->all());
        $company->save();
        return View('allCompanies' , ['companies' =>Company::all()]);
    }
    public  function addCompany()
    {
        return View('createCompany');
    }
    public  function  edit()
    {
        \request()->validate([
            'address' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'name' => 'required'
        ]);
        $id = \request('id');
        $company = Company::find($id);
        $company->fill(\request()->all());
        $company->save();
        return View('allCompanies' , ['companies' =>Company::all()]);
    }
    public  function delete()
    {
        $id = \request('id');
        $company =Company::find($id);
        $company->delete();
        return View('allCompanies' , ['companies' =>Company::all()]);

    }
    public function get()
    {
        return View('allCompanies' , ['companies' =>Company::all()]);

    }
    public function getById()
    {
       echo $id = \request('id');
        return View('company ' , ['company' =>Company::find($id)]);

    }
    public function search()
    {
        $search_field = \request('search_field');
       $result =  Company::where('name', 'LIKE', $search_field.'%')->get()
        ->merge(Company::where('email', 'LIKE', $search_field.'%')->get())
        ->merge(Company::where('address', 'LIKE', $search_field.'%')->get())
        ->unique('id')->values()->all();

        return View('allCompanies' , ['companies' =>$result]);    }
}

