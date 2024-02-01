<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corner extends Model
{
    use HasFactory;

    protected $fillable =['name' , 'no_of_activity'];

    public function dailyInfo(){
        return $this->hasMany(DailyInfo::class , 'corner_id');
    }

    public function staff(){
        return $this->hasMany(Staff::class , 'corner_id');
    }
}
