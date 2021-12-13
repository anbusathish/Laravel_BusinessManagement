@extends('layouts.frontend')

@section('content')

    <div class="container">       
        <div class="card">
            <div class="card-header">
                <h4>Companies  <a class="btn btn-btn btn-success float-right" href="{{ url('company/create') }}">Add</a></h4>      
                  
            </div>
            <div class="card-body">
              @if(Session:: has('success'))
              <div class="alert alert-success" role="alert">
                  {{ Session:: get('success') }}
              </div>
              @endif
              @if(Session:: has('failed'))
              <div class="alert alert-danger" role="alert">
                  {{ Session:: get('failed') }}
              </div>
              @endif

                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>                       
                        <th scope="col">Website</th>
                        <th scope="col">Logo</th>
                        <th>Actions</th>
                      </tr>
                    </thead>                   
                    <tbody>
                      @if (count($company) > 0)                             
                      @php
                      $i=1;
                    @endphp
                    @foreach($company as $com)
                      <tr>
                        <td>{{ $i++; }}</td>
                        <td>{{ $com->name }}</td>
                        <td>{{ $com->email }}</td>
                        <td>{{ $com->website }}</td>
                        <td style="width: 23%;"><img class="ImgDimension" src="{{ asset($com->logo)}}"></td>
                        <td class="buttongAlignment">
                            <a href="{{ url('company/'.$com->id.'/edit ') }}" class="btn btn-primary">Edit</a>  
                            <form action="{{ url('company/'.$com->id) }}" method="POST">
                            @csrf
                            @method('DELETE')   
                            <button type="submit" class="btn btn-danger">Delete</button> 
                            </form>   
                            <form action="{{ url('company/'.$com->id) }}">
                            @csrf
                            @method('HEAD')   
                            <a href="{{ url('company/'.$com->id) }}" class="btn btn-info">View</a><td>
                            </form>   
                      </tr>
                      @endforeach
                      @else                       
                      <tr >
                        <td colspan="6" style="text-align:center">No Record found</td>
                      </tr>                      
                      @endif                
                    
                    </tbody>
                  </table> 
                  {{ $company->links() }}             
            </div>
        </div>
      
    </div>

@endsection()    



