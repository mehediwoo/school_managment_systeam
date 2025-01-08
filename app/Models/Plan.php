<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function branch_subscription(){
        return $this->hasMany(Branch_subscription::class,'plan_id','id');
    }

    public function branches(){
        return $this->belongsTo(Branch::class,'plan_id','id');
    }
}
