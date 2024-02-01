<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyInfo extends Model
{
    use HasFactory;

    protected $fillable = [ 'corner_id' , 'no_Kids' , 'no_staff' , 'liked_activity' , 'daily_maintenance' , 'photos_link' , 'date' ];
}
