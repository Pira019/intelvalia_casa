<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function congees()
    {
       return $this->hasMany(Congee::class);
    }



    public function soldeCongee()
    {
        return $this->hasMany(SoldeCongee::class);
    }
}
