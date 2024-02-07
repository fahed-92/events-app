<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MascotDaily extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_supervisors', 'no_wardrobe',
        'no_performers', 'no_extra_performers',
        'date', 'comments', 'photos_link' ,'corner_id'
    ];


    public function show() {
        return $this->hasMany(Show::class , 'mascot_daily_id');
    }
}
