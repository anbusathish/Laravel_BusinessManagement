@extends('layouts.frontend')

@section('content')

    <div class="container">       
        <div class="card">
            <div class="card-header">
                <h4>Employees  <a class="btn btn-btn btn-success float-right" href="{{ url('employee/create') }}">Add</a></h4>      
                  
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
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>                       
                        <th scope="col">Company Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if (count($employee) > 0)           
                            @php
                            $i=1;
                            @endphp
                            @foreach($employee as $emp)
                            <tr>
                                <th>{{ $i++; }}</th>
                                <td>{{ $emp->firstname }}</td>
                                <td>{{ $emp->lastname }}</td>
                                <td>{{ $emp->companies->name }}</td>
                                <td>{{ $emp->email }}</td>
                                <td>{{ $emp->phone }}</td>
                                <td class="buttongAlignment">
                                    <a href="{{ url('employee/'.$emp->id.'/edit ') }}" class="btn btn-primary">Edit</a>  
                                    <form action="{{ url('employee/'.$emp->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')   
                                    <button type="submit" class="btn btn-danger">Delete</button> 
                                    </form>   
                                    <form action="{{ url('employee/'.$emp->id) }}">
                                    @csrf
                                    @method('HEAD')   
                                    <a href="{{ url('employee/'.$emp->id) }}" class="btn btn-info">View</a><td>
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
                  {{ $employee->links() }}               
            </div>
        </div>
      
    </div>

@endsection()    



