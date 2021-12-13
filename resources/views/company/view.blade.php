@extends('layouts.frontend')

@section('content')

    <div class="container"> 
     
         <div class="card">
          <div class="card-header">
            <h4>View Company <a class="btn btn btn-secondary float-right" href="{{ url('company') }}">Back</a></h4>  
            
            </div>
            <div class="card-body">
              <img style="max-width: 20%;" src="{{ asset($company->logo) }}">
              <div class="card-body">
                <h5 class="card-title">{{ $company->name  }}</h5>
                <p class="card-text">{{ $company->email }}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">{{ $company->website }}</small>
              </div>
            </div> 
         </div>           
        
    </div>

@endsection()    



