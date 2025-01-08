<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamMarkDistri extends Model
{
    use HasFactory;

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function institute(){
        return $this->belongsTo(User::class,'branch_id','id');
    }

    public function exam(){
        return $this->belongsTo(ExamSetup::class,'exam_id','id');
    }

    public function session(){
        return $this->belongsTo(Session::class,'session_id','id');
    }

    public function year(){
        return $this->belongsTo(EducationYear::class,'current_year','id');
    }
}
