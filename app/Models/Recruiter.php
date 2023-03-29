<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;
    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function province(){
        return $this->belongsTo(province::class);
    }
}
