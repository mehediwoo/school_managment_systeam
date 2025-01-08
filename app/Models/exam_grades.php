<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam_grades extends Model
{
    use HasFactory;

    public function branch()
    {
        return $this->belongsTo(User::class,'branch_id');
    }
}
