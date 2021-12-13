<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Company;
use Illuminate\Support\Facades\File; 

class CompanyController extends Controller
{
  
    public function index()
    {
        $company = Company::paginate(10);
        return view('company.index', compact('company'));
       
    }

    public function create()
    {
        return view('company.create');
    }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'companyname' => 'required',
            'email' => 'required|email|unique:employees',           
        ]);
        $company = new Company;
        $company->name=$request->input('companyname');
        $company->email=$request->input('email');
        $company->logo=$request->input('logo');
        $company->website=$request->input('website');

        if($request->hasFile('image'))
        {
            $validatedData = $request->validate([
                'image' => 'image|mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100',
            ]);
            $image = $request->file('image');
            $newName = time().'.'.$image->extension();
            $path = public_path('/images');
            $image->move($path,$newName);

            $company->logo="/images/".$newName;
        }
        $company->save();
        if($company)
        {
            return redirect('company')->with('success', 'Company added successfully');
        } else {
            return redirect('company')->with('failed', 'Company added failed');
        }
     

    }

    public function show($id)
    {
        $company = Company::where('id',$id)->first(); 
        return view('company.view', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::find($id);      
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {        
        $company = Company::find($id); 
        $validatedData = $request->validate([
            'companyname' => 'required',           
        ]); 
        $company->name=$request->input('companyname');
        $company->email=$request->input('email');     
        $company->website=$request->input('website');

        if($request->hasFile('image'))
        {
            $validatedData = $request->validate([
                'image' => 'image|mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100',
            ]);
            $image = $request->file('image');
            $newName = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('/images');
            $image->move($path,$newName);
            $company->logo="/images/".$newName;           
            unlink(public_path($request->input('oldImage')));            
        }

        $company->update();
        if($company)
        {
            return redirect('company')->with('success', 'Company updated successfully');
        } else {
            return redirect('company')->with('failed', 'Company updated failed');
        }
       

    }

    public function destroy($id)
    {
        $company = Company::find($id); 
        $company->delete();
        if($company)
        {
            return redirect('company')->with('success', 'Company deleted successfully');
        } else {
            return redirect('company')->with('failed', 'Company deleted failed');
        }
      
    }
}
