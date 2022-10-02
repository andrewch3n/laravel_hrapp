<?php

namespace App\Http\Controllers;
use App\User;
use App\Position;
use App\Role;
use App\EmployeeDetail;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view("employees.index",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions=Position::all();
        $roles=Role::all();
        return view("employees.create",compact('positions','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'phone'=>'required|min:10',
            'nrcNo'=>'required|min:6',
            'salary'=>'required|numeric',
            'dob'=>'required|date'
        ],
        ['name.required'=>'Please fill your shit name']);
        $name = $request->input('name');
        $email = $request->input('email');
        $password=$request->input('password');

        $user=User::create(['name'=>$name,'email'=>$email,'password'=>Hash::make($password)]);

        $roleIds =$request->roles;
        
        foreach ($roleIds as $roleId) {
            $role=Role::find($roleId);
            $user->roles()->save($role);
        }

        $phone = $request->input('phone');
        $division = $request->input('division');
        $township = $request->input('township');
        $nrcNo = $request->input('nrcNo');
        $salary = $request->input('salary');
        $dob = $request->input('dob');
        
        $positionId=$request->input('position');
        $position=Position::find($positionId);

        $employeeDetail=EmployeeDetail::create([
            "phone"=>$phone,
            "nrc"=>$division."/".$township."(N)".$nrcNo,
            "salary"=>$salary,
            "dob"=>$dob,

        ]);

        $position->employee_details()->save($employeeDetail);
        $user->employee_details()->save($employeeDetail);
        return redirect()->route("employees.index");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user=User::find($id);
        return view('employees.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::where('id',$id)->first();
        
        return view('employees.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nrc=$request->division."/".$request->township."(N)".$request->nrcNo;
        $employee=EmployeeDetail::where('id', $id)->update(['name'=>$request->input('name'),'email'=>$request->input('email'),'phone'=>$request->input('phone'),
        'nrc'=>$nrc,'salary'=>$request->input('salary'),'dob'=>$request->input('dob')]);
        return redirect()->route("employees.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $employee=Employee::find($id);
        // $employee->delete();
        $user=User::destroy($id);

        return redirect()->route('employees.index');
    }
}

