@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </nav>
    </div>
    <div class="container">
      @if ($attendances)
            @if ($attendances->is_working)
              <form action="{{route('attendances.checkout',$attendances->id)}}" method="post">
                @method('put')
                @csrf
                <input type="submit" value="Check Out" class="btn btn-danger">
              </form>
            @else
              <form action="{{route('workingdata.store',$attendances->id)}}" method="post">
                @csrf
                <input type="submit" value="Check In" class="btn btn-success">
              </form>
            @endif
            @else 
              <form action="{{route('attendances.store')}}" method="post">
                @csrf
                <input type="submit" value="Check In" class="btn btn-success">
              </form>
            @endif
      
    </div>
@endsection