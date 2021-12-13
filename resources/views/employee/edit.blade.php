@extends('layouts.frontend')

@section('content')

<div class="container">       
    <div class="card">
        <div class="card-header">
            <h4>Edit Employee <a class="btn btn btn-secondary float-right" href="{{ url('employee') }}">Back</a></h4>  
            
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('employee/'.$employee->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="firstname" value="{{ $employee->firstname }}" >
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastname" value="{{ $employee->lastname }}">
                </div>
                <div class="form-group">
                    <label>Company</label>
                    <select name="company" class="form-control">
                        <option>--Select company--</option>
                        @foreach ($companyList as $com)                       
                         <option @if($com->id==$employee->company_id) selected @endif value="{{ $com->id }}">{{ $com->name }}</option>                            
                        @endforeach
                      
                    </select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $employee->email }}">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="phone" class="form-control"name="phone" value="{{ $employee->phone }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>    
        </div>
    </div>
  
</div>

@endsection()   

