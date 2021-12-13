@extends('layouts.frontend')

@section('content')

    <div class="container">      
         <div class="card">
          <div class="card-header">
            <h4>View Employee <a class="btn btn btn-secondary float-right" href="{{ url('employee') }}">Back</a></h4>              
            </div>
            <div class="card-body">             
              <div class="card-body">
                <h5 class="card-title">{{ $employee->firstname  }} {{ $employee->lastname }}</h5>
                <p class="card-text">{{ $employee->email }}</p>
                <p class="card-text">{{ $employee->companies->name }}</p>
                <p class="card-text">{{ $employee->email }}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">{{ $employee->phone }}</small>
              </div>
            </div> 
         </div> 
    </div>
@endsection()    



