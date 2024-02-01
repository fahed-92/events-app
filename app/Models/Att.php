<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Att extends Model
{
    use HasFactory;

    protected $fillable =['status' , 'check_in', 'check_out', 'date', 'staff_id' ,'created_at','updated_at'];
}
