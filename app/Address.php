<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable=['street','city'];
    public function employee_details(){
        return $this->belongsTo('App\EmployeeDetail');
    }
}
