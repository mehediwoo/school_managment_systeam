<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchSubscription extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function plan(){
        return $this->belongsTo(Plan::class,'plan_id','id');
    }
}
