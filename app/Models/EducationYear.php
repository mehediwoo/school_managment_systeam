<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationYear extends Model
{
    use HasFactory;

    public function session(){
        return $this->hasMany(Session::class,'eduyear_id','id');
     }

     public function registrationLimit(){

        return $this->hasMany(EducationYear::class,'eduyear_id','id');
    }

    public function student(){

        return $this->hasMany(Student::class,'eduyear_id','id');
    }

    public function e_mark_distribution(){
        return $this->hasMany(ExamMarkDistri::class,'current_year','id');
    }
}
