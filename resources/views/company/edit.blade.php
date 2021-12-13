@extends('layouts.frontend')

@section('content')

<div class="container">       
    <div class="card">
        <div class="card-header">
            <h4>Edit Company <a class="btn btn btn-secondary float-right" href="{{ url('company') }}">Back</a></h4>  
            
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


            <form action="{{ url('company/'.$company->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="oldImage" value="{{ $company->logo }}">
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control" name="companyname"  value="{{ $company->name }}">
                </div>           
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $company->email }}">
                </div>
                <div class="form-group">
                    <label>Logo</label>
                    <input type="file" class="form-control"name="image">
                    <img class="ImgDimension" src="{{ asset($company->logo)}}">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" class="form-control"name="website" value="{{ $company->website }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>      
        </div>
    </div>
  
</div>

@endsection()   

