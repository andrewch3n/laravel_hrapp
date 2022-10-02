@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <h1 class="card-title h5">Employee</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h1 class="h5">Basic Info</h1>
                        <p>ID :{{$user->id}}</p>
                        <p>UserName :{{$user->name}}</p>
                        <p>Email :{{$user->email}}</p>
                    </div>
                    <div class="col-md-4">
                        <h1 class="card-title h5">Employee Detail</h1>
                        @if ($user->employee_details!=null)
                            <p>Phone Number :{{$user->employee_details->phone}}</p>
                            <p>NRC :{{$user->employee_details->nrc}}</p>
                            <p>Position: {{$user->employee_details->position->name}}</p>
                            <p>Salary :{{$user->employee_details->salary}}</p>
                            <p>Date of Birth :{{$user->employee_details->dob}}</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h1 class="h5">Address</h1>
                        @if ($user->employee_details->addresses != null)
                        <p>Street: {{$user->employee_details->addresses->street}}</p>
                        <p>City: {{$user->employee_details->addresses->city}}</p>
                        
                        
                    @else
                    <a href="{{route('address.create',$user->id)}}" class="btn btn-success">Add Address</a>
                    @endif
                    </div>
                </div>
                    <div class="col-md-1">
                        <a class="btn btn-success" href="{{route("employees.edit",$user->id)}}">Edit</a>
                    </div>
                    
                
            </div>
        </div>
    </div>
@endsection