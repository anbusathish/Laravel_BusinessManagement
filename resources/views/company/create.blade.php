@extends('layouts.frontend')

@section('content')

<div class="container">       
    <div class="card">
        <div class="card-header">
            <h4>Add Company <a class="btn btn btn-secondary float-right" href="{{ url('company') }}">Back</a></h4>  
            
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


            <form action="{{ url('company') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control" name="companyname" >
                </div>           
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Logo</label>
                    <input type="file" class="form-control"name="image">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="url" class="form-control"name="website" placeholder="https://example.com" pattern="https://.*"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>      
        </div>
    </div>
  
</div>

@endsection()   

