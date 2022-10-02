@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="h5">My Attendances</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Date</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr>
                                <td>{{$attendance->check_in}}</td>
                                <td>{{$attendance->check_out}}</td>
                                <td>{{$attendance->date}}</td>
                                <td>
                                    <a href="{{route('attendances.show',$attendance->id)}}">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection