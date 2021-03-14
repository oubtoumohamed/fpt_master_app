<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_module extends Model
{
    //
    protected $fillable = [
        'student_id','module_id','date_affect' 	
    ];


    public function module(){
        return $this->belongsTo('App\Module');
    }
    
}
