@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Positions</li>
            </ol>
        </nav>

          <div class="card">
              <div class="card-header">
                    <h1 class="h5">Position List</h1>
              </div>
              <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($positions as $position)
                        <tr>
                            <td>{{$position->id}}</td>
                            <td>{{$position->name}}</td>
                            <td>
                                <a href="{{ route('positions.edit',$position->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <form class="d-inline" action="{{ route('positions.destroy',$position->id)}}" method="POST">
                                    {{method_field("DELETE")}}
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form></td>
                        </tr>
                       @endforeach
                        </tbody>
                    </table>
              </div>
          </div>
    </div>
    
@endsection