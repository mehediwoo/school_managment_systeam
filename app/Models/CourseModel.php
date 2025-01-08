<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Session;
use  App\Http\Controllers\Backend\StudentRgisterFundController;
class CourseModel extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function session(){
        return $this->hasMany(Session::class,'course_id','id');
    }



    public function student()
    {
        return $this->hasMany(Student::class,'course_id','id');
    }

    public function regFund(){
        return $this->hasMany(StudentRgisterFundController::class,'course_id','id');
    }
 }
