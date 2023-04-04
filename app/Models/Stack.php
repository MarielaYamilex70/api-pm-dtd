<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stack extends Model
{
    use HasFactory;

    public function recruiter(){
        return $this->belongsToMany(Recruiter::class, 'recruiters_stacks');
    }

    public function coder(){
        return $this->belongsToMany(Coder::class, 'coders_stacks');
    }
}
