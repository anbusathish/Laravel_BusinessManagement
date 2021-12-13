<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Employee;
use App\models\Company;
class EmployeeController extends Controller
{
   
    public function index()
    {
        $employee = Employee::paginate(10);
       
        return view('employee.index', compact('employee'));
    }

   
    public function create()
    {
        $companyList = Company::all('id','name');
        return view('employee.create', compact('companyList'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',           
        ]);
        $employee = new Employee;
        $employee->firstname=$request->input('firstname');
        $employee->lastname=$request->input('lastname');
        $employee->company_id=$request->input('company');
        $employee->email=$request->input('email');
        $employee->phone=$request->input('phone');
        $employee->save();
        if($employee)
        {
            return redirect('employee')->with('success', 'Employee added successfully');
        } else {
            return redirect('employee')->with('failed', 'Employee added failed');
        }
        
    }

    public function show($id)
    {
        $employee = Employee::where('id',$id)->first(); 
        return view('employee.view', compact('employee'));
    }

    public function edit($id)
    {   
        $employee = Employee::find($id);
        $companyList = Company::all('id','name');
        return view('employee.edit', compact('employee','companyList'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);       
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',           
        ]);  
        $employee->firstname=$request->input('firstname');
        $employee->lastname=$request->input('lastname');
        $employee->company_id=$request->input('company');
        $employee->email=$request->input('email');
        $employee->phone=$request->input('phone');
        $employee->update();
        if($employee)
        {
            return redirect('employee')->with('success', 'Employee updated successfully');
        } else {
            return redirect('employee')->with('failed', 'Employee updated failed');
        }       
    }

    public function destroy($id)
    {
        $employee = Employee::find($id); 
        $employee->delete();     
        if($employee)
        {
            return redirect('employee')->with('success', 'Employee deleted successfully');
        } else {
            return redirect('employee')->with('failed', 'Employee deleted failed');
        } 
    }
}
