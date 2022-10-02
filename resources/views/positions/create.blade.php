@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('positions.index')}}">Positions</a></li>
              <li class="breadcrumb-item active" aria-current="page">New Positions</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                <h1 class="h5">Position Form</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <form action="{{route('positions.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="position" id="" class="form-control @error('position') is-invalid @enderror">
                                @error('position')
                                        <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>                    
                            
                            <div>
                                <input type="submit" class="btn btn-success float-right" value="Create">
                            </div>
                            
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
@endsection