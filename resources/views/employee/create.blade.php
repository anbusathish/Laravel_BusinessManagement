@extends('layouts.frontend')

@section('content')

<div class="container">       
    <div class="card">
        <div class="card-header">
            <h4>Add Employee <a class="btn btn btn-secondary float-right" href="{{ url('employee') }}">Back</a></h4>  
            
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
            <form action="{{ url('employee') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="firstname" >
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastname" >
                </div>
                <div class="form-group">
                    <label>Company</label>
                    <select name="company" class="form-control">
                        <option>--Select company--</option>
                        @foreach ($companyList as $com)                       
                         <option value="{{ $com->id }}">{{ $com->name }}</option>                            
                        @endforeach
                      
                    </select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="phone" class="form-control"name="phone">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>    
        </div>
    </div>
  
</div>

@endsection()   

