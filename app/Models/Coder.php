<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coder extends Model
{
    use HasFactory;
    public function recruiters()
        {
        return $this->belongsToMany(Recruiter::class, 'matches');
    }
}
