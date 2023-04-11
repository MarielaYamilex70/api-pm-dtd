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

    public function promo(){
        return $this->belongsTo(Promo::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }
    
    public function language()
        {
        return $this->belongsToMany(Language::class, 'coders_languages');
    }

    public function recruiter()
        {
        return $this->belongsToMany(Recruiter::class, 'matches');
    }

    public function stack()
        {
        return $this->belongsToMany(Stack::class, 'coders_stacks');
    }

    public function location()
    {
    return $this->belongsToMany(Province::class, 'coders_locations');
}
}
