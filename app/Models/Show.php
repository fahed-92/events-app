<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'date' , 'time' , 'no_kids', 'mascot_daily_id'];

    public function mascotDaily() {
        return $this->belongsTo(MascotDaily::class , 'mascot_daily_id');
    }
}
