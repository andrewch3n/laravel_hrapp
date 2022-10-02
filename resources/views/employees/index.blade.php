@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Employees</li>
            </ol>
          </nav>

          <div class="card">
              <div class="card-header">
                    <h1 class="h5">Employee List</h1>
              </div>
              <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Detail</th>
                                <th>Delete</th>
                                <th>Attendance List</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                          <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            @if (($user->employee_details!=null))
                                <td>{{$user->employee_details->phone}}</td>
                            @else
                                <td>-</td>
                            @endif
                            <td><a class="btn btn-info" href="{{route('employees.show',$user->id)}}">Info</a></td>
                            <td><form action="{{route('employees.destroy',$user->id)}}" method="post">
                                    {{method_field("DELETE")}}
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-danger" id="delete" onclick="return confirm('Are u sure you want to delete?')">
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{route("attendances.showemployee",$user->id)}}">Attendance List</a>
                            </td>
                            </tr>
                       @endforeach
                        </tbody>
                    </table>
              </div>
          </div>
    </div>
    
@endsection