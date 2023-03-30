<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coder extends Model
{
    use HasFactory;

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function promotion(){
        return $this->belongsTo(Promotion::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }
    
    public function language()
        {
        return $this->belongsToMany(Language::class, 'coders_languages');
    }
}
