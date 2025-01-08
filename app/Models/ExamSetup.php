<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSetup extends Model
{
    use HasFactory;

    public function branch(){
        return $this->belongsTo(User::class,'branch_id','id');
    }

    public function exam_type(){
        return $this->belongsTo(exam_type::class,'exam_type_id','id');
    }

    public function exam_center(){
        return $this->belongsTo(exam_center::class,'center_id','id');
    }

    public function exam_names(){
        return $this->belongsTo(exam_name::class,'exam_name','id');
    }

    public function exam_course(){
        return $this->belongsTo(exam_subject::class,'exam_course_id','id');
    }
}
