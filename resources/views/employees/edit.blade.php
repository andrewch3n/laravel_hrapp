@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('employees.index')}}">Employees</a></li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            <h1 class="h5">Employee Edit</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <form action="{{route("employees.update",$user->id)}}" method="POST">
                        {{method_field("PUT")}}
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control" value="{{$user->name}}">
                            </div>                    
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" value="{{$user->email}}">
                            </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" id="" class="form-control" value="{{$user->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="">NRC</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="division" id="division" class="form-control" value="{{$user->division}}">
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
                                    <select name="township" id="township" class="form-control" value="{{$user->township}}">
                                        
                                    </select>
                                </div>
                                <div class="col-md-1 mt-2">
                                    <label>(N)</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="nrcNo" id="nrcNo" maxlength="6" class="form-control" value="{{$user->nrcNo}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Salary</label>
                            <input type="text" name="salary" id="" class="form-control" value="{{$user->salary}}">
                        </div>
                        <div class="form-group">
                            <label for="">Date of Birth</label>
                            <input type="date" name="dob" id="" class="form-control" value="{{$user->dob}}">
                        </div>
                        <div>
                            <input type="submit" class="btn btn-success" value="Edit">
                        </div>
                        
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
    var division={
           1:["BaMaNa","MaKaNa","MoNaNa"],
           2:["LaKaKa","MaWaTa"],
           3:["PaAhAh"],
           9:["KhaAhZa","MaNaTa","MaYaMa"]
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
        var options ="";
        var str = "<?php echo $employee->nrc; ?>";
        var str1 = str.split("/");
   
        var str2 = str1[1].split('(N)');
        var options = "<option value='"+str1[0]+"'>"+str1[0]+"</option>";
        var options2 = "<option value='"+str2[0]+"'>"+str2[0]+"</option>";
  
        // $("#division").html(options);
        $("#township").html(options2);
        $("#nrcNo").val(str2[1]);
        changeTownship( str1[0]);
        $("#division option[value=" + str1[0] + "]").prop("selected",true);
        $("#township option[value=" + str2[0] +"]").prop("selected",true);
</script>
@endsection