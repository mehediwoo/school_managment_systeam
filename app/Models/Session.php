<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function course(){
       return $this->belongsTo(CourseModel::class,'course_id','id');
    }

    public function eduyear(){
        return $this->belongsTo(EducationYear::class,'eduyear_id','id');
     }

    public function student(){
        return $this->hasMany(Student::class,'session_id','id');
    }

    public function registration(){

        return $this->hasMany(RegistrationSession::class,'session_id','id');
    }

    public function regFund(){
        return $this->hasMany(StudentRgisterFundController::class,'course_id','id');
    }
}
