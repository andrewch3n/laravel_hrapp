<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable=['check_in','check_out','date','is_working'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function working_data(){
        return $this->hasMany('App\WorkingData');
    }
}
