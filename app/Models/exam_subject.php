<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam_subject extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(CourseModel::class, 'course_id');
    }

    public function exam()
    {
        return $this->belongsTo(ExamSetup::class, 'exam_id');
    }
}
