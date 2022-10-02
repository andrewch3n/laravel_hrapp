<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingData extends Model
{
    protected $fillable=['check_in','check_out'];

    public function attendance(){
        return $this->belongsTo('App\Attendance');
    }
}
