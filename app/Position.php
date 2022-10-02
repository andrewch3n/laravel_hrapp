<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable=['name'];
    public function employee_details(){
        return $this->hasMany('App\EmployeeDetail');
    }
}
