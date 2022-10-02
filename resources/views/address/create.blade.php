@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <h1>Address Form</h1>
        </div>
            <div class="card-body">
                <form action="{{route('address.store',$users->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Street</label>
                        <input type="text" name="street" id="" class="form-control @error('street') is-invalid @enderror">
                        @error('street')
                                <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="">City</label>
                        <input type="text" name="city" id="" class="form-control @error('city') is-invalid @enderror">
                        @error('city')
                                <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success" value="Register">
                    </div>
                    
                </form>
            </div>
    </div>
@endsection