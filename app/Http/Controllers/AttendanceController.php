<?php

namespace App\Http\Controllers;
use App\User;
use App\Attendance;
use App\WorkingData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $attendances = Attendance::where('user_id',$user->id)->get();
        return view('attendances.index',compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = Auth::user();
        $time = date('H:i:s');
        $date = date('Y-m-d');
        $attendances = Attendance::create(['check_in'=>$time,'date'=>$date,'is_working'=>true]);
        $users->attendances()->save($attendances);
        $working_data=WorkingData::create(['check_in'=>$time]);
        $attendances->working_data()->save($working_data);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendances=Attendance::find($id);
        return view('attendances.show',compact('attendances'));
    }
    public function showemployee($id)
    {
        $attendances=Attendance::find($id);
        return view('attendances.show',compact('attendances'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    }
    public function checkout($id){
        $attendances=Attendance::find($id);
        $time = date('H:i:s');
        $attendances->update(['check_out'=>$time,'is_working'=>false]);
        $working_data=WorkingData::where('attendance_id',$id)->orderBy('id','desc')->first();
        $working_data->update(['check_out'=>$time]);
        return redirect()->route('dashboard');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
