<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function District(){
        return $this->hasMany(District::class,'division_id','id');
    }
    public function Branch(){
        return $this->hasMany(Branch::class,'division_id','id');
    }
}
