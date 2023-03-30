<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    public function coder()
    {
    return $this->belongsToMany(Coder::class, 'coders_languages');
}
    public function recruiter()
    {
    return $this->belongsToMany(Recruiter::class, 'recruiters_languages');
}
}
