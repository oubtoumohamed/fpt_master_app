<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_formation extends Model
{
    //
    protected $fillable = [
        'student_id','formation_id','year','semester','note'
	];

    public function __toString(){
        return ( $this->id ) ? $this->formation->__toString() : "";
    }

    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function formation(){
        return $this->belongsTo('App\Formation');
    }

    public function modules_note(){
        return $this->hasMany('App\Note');
    }

    public function module_note($module){
        $note = $this->modules_note()->where('module_id', $module)->first();

        if( $note && $note->id )
            return $note;
        
        return new Note();
    }
    
}
