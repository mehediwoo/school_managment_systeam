<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam_publish_date extends Model
{
    use HasFactory;

    public function exam(){
        return $this->belongsTo(ExamSetup::class,'exam_id','id');
    }
}
