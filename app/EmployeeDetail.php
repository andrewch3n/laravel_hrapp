<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    protected $fillable=['phone','nrc','salary','dob'];
    public function address(){
        return $this->hasOne('App\Address');
    }
    public function position(){
        return $this->belongsTo('App\Position');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
