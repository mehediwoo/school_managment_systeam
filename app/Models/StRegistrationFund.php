<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StRegistrationFund extends Model
{
    use HasFactory;

    public function course(){
        return $this->belongsTo(CourseModel::class,'course_id','id');
    }

    public function session(){
        return $this->belongsTo(Session::class,'session_id','id');
    }

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function registration(){

        return $this->hasMany(RegistrationSession::class,'reg_session_id','id');
    }

    public function availableAmount(){

        return $this->hasMany(stRegAvlableAmount::class,'amountfund_id','id');
    }

}
