@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="h5">Attendance Detail</h1>
            </div>
            <div class="card-body">
                <p>Attendance Date:{{$attendances->date}}</p>
                <p>Employee:{{$attendances->user->name}}</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Check In</th>
                            <th>Check Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances->working_data as $working_data)
                            <tr>
                                <td>{{$working_data->check_in}}</td>
                                <td>{{$working_data->check_out}}</td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection