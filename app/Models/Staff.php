<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable =['full_name' , 'position' ,'date_of_join' , 'date_of_end' , 'salary' , 'corner_id', 'account_name',
    'noc','id_pic' ,'bank_name' , 'cv', 'iban_number', 'note' ];

//    public function setDateOfEndAttribute($value)
//    {
//        $this->attributes['date_of_join'] =  Carbon::parse($value);
//    }

    public function att(){
        return $this->hasMany(Att::class , 'staff_id');
    }
}
