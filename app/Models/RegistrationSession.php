<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationSession extends Model
{
    use HasFactory;


    public function session(){

        return $this->belongsTo(Session::class,'session_id','id');
    }

    public function eduyear(){

        return $this->belongsTo(EducationYear::class,'eduyear_id','id');
    }


    public function regfund(){

        return $this->belongsTo(StRegistrationFund::class,'reg_session_id','id');
    }




    
}
