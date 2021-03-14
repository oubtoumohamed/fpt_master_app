<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    protected $fillable = [
        'student_formation_id', 'module_id','semester', 'note_normale','remark_normale', 'note_normale','remark_normale', 'validate'
    ];


    //-------------------------


    public function formation(){
        return $this->belongsTo('App\Student_formation','student_formation_id','id');
    }

    public function module(){
        return $this->belongsTo('App\Module');
    }
    
    public function getsemester(){
        return $this->semester ? semesters($this->semester) : '';
    }

    public function getstudent_formation_id(){
//        dd($this->formation);
        return $this->formation;
    }

    //'student_formation_id', 'module_id','semester', 'note_normale','remark_normale', 'note_normale','remark_normale', 'validate',
}