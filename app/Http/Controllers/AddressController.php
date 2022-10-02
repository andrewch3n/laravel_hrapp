<?php

namespace App\Http\Controllers;
use App\EmployeeDetail;
use Illuminate\Http\Request;
use App\Address;
use App\User;

class AddressController extends Controller
{
    public function create($id){
        $user=User::find($id);
        return view('address.create',compact('user'));
        
    }
    public function store($id,Request $request){
        $request->validate([
            'street'=>'required|street',
            'city'=>'required|city',
        ]);
        $user=User::find($id);
        $employee_details=$user->employee_details;
        $address=Address::create(['street'=>$request->street,'city'=>$request->city]);
        $employee_details->address()->save($address);
        return redirect()->route('employees.show',$id);
    }
}
