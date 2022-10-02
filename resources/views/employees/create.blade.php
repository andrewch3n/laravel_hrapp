@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('employees.index')}}">Employees</a></li>
              <li class="breadcrumb-item active" aria-current="page">New Employee</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                <h1 class="h5">Employee Form</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <form action="{{route('employees.store')}}" class="needs-validation" method="post" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <p class="invalid-feedback">{{$message}}</p>
                                @enderror    
                            </div>                    
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <p class="invalid-feedback">{{$message}}</p>
                                @enderror 
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <p class="invalid-feedback">{{$message}}</p>
                                @enderror 
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" id="" class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                <p class="invalid-feedback">{{$message}}</p>
                                @enderror 
                            </div>
                            <div class="form-group">
                                <label for="">NRC</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="division" id="division" class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1 mt-2">
                                        <label>/</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="township" id="township" class="form-control">
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-1 mt-2">
                                        <label>(N)</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="nrcNo" id="" maxlength="6" class="form-control @error('nrcNo') is-invalid @enderror">
                                        @error('nrcNo')
                                        <p class="invalid-feedback">{{$message}}</p>
                                        @enderror 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Position</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <select name="position" id="position" class="form-control">
                                            @foreach ($positions as $position)
                                            <option value="{{$position->id}}">{{$position->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>  
                            </div>
                            <div class="form-group">
                                <label for="">Role</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <select name="roles[]" id="role" class="form-control" multiple="multiple">
                                            @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>  
                            </div>
                            <div class="form-group">
                                <label for="">Salary</label>
                                <input type="text" name="salary" id="" class="form-control @error('salary') is-invalid @enderror">
                                @error('salary')
                                <p class="invalid-feedback">{{$message}}</p>
                                @enderror 
                            </div>
                            <div class="form-group">
                                <label for="">Date of Birth</label>
                                <input type="date" name="dob" id="" class="form-control date @error('dob') is-invalid @enderror">
                                @error('dob')
                                <p class="invalid-feedback">{{$message}}</p>
                                @enderror 
                            </div>
                            <div>
                                <input type="submit" class="btn btn-success float-right" value="Register">
                            </div>
                            
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script>
        var division={
            "1":["MaKaNa","BaMaNa","MaNaNa"],
            "2":["LaKaKa","MaWaTa"],
            "3":["PaAhAh"],
            "9":["KhaAhZa","MaNaTa","MaYaMa"]
            };
        $('#division').change(function() {
        var val = $(this).val();
        changeTownship(val);
        
        });
        
        function changeTownship(id){
            var townships = division[id];
            var options = "";
             for(var i= 0; i<townships.length; i++){
            options += "<option value='"+townships[i]+"'>"+townships[i]+"</option>";
            $("#township").html(options);
            }
        };
        changeTownship(1);
    </script>
@endsection