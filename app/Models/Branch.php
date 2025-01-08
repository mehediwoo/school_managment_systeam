<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BranchDetails;

class Branch extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function division(){
        return $this->belongsTo(Division::class,'division_id','id');
    }

    public function branch_subscription(){
        return $this->hasMany(BranchSubscription::class,'branch_id','id')->with('branch_details');
    }

    public function district(){
        return $this->belongsTo(District::class,'district_id','id');
    }


    public function branch_details(){

        return $this->hasOne(BranchDetails::class,'branch_id','id');

    }


    public function branch_extra(){

        return $this->hasOne(branch_extra_file::class,'branch_id','id');

    }

    public function user(){
        return $this->hasOne(User::class,'branch_id','id');
    }

   public function stfund(){
     return $this->hasMany(StRegistrationFund::class,'branch_id','id');
   }

    public function exam(){
        return $this->hasMany(ExamSetup::class,'branch_id','id');
    }

    public function ExamHall(){
        return $this->hasMany(ExamHall::class,'branch_id','id');
    }

    public function e_mark_distribution(){
        return $this->hasMany(ExamMarkDistri::class,'branch_id','id');
    }
}
