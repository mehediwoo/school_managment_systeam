<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stRegAvlableAmount extends Model
{
    use HasFactory;

    public function StRegistrationFund(){

        return $this->belongsTo(StRegistrationFund::class,'amountfund_id','id');
    }

    public function institute(){

        return $this->belongsTo(user::class,'institute_id','id');
    }

    public function session(){

        return $this->belongsTo(Session::class,'session_id','id');
    }

    public function course(){

        return $this->belongsTo(CourseModel::class,'course_id','id');
    }

    public function user(){

        return $this->belongsTo(User::class,'created_by','id');
    }
}
