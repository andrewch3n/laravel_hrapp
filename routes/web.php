<?php

use App\Attendance;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $user=Auth::user();
    $attendances=Attendance::where('user_id',$user->id)->where('date',date('Y-m-d'))->first();
    return view('home',compact('attendances'));
})->name('dashboard')->middleware('auth');

Route::group(['prefix'=>'admin','middleware'=>['auth','manager']],function(){
    Route::resource('employees','EmployeeController');
    Route::resource('positions','PositionController');
    Route::post('/employees/{id}/address',"AddressController@store")->name('address.store');
    Route::get('/employees/{id}/createadd','AddressController@create')->name('address.create');
});

Auth::routes();

Route::get('/attendances','AttendanceController@index')->name('attendances.index')->middleware('auth');
Route::post('/attendances',"AttendanceController@store")->name('attendances.store')->middleware('auth');
Route::put('/attendances/{id}','AttendanceController@checkout')->name('attendances.checkout');
Route::post('/attendances/{id}/workingdata',"WorkingDataController@store")->name('workingdata.store');
Route::get('/attendances/{id}','AttendanceController@show')->name('attendances.show')->middleware('auth');
Route::get('users/{id}/attendances','AttendanceController@showemployee')->name('attendances.showemployee')->middleware('auth');




    