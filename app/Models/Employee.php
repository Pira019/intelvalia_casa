<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Enum\EContract;
use App\Models\Enum\EStatus;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'statut' => EStatus::class,
        'contrat' => EContract::class
    ];


    public function congees()
    {
       return $this->hasMany(Congee::class);
    }



    public function soldeCongee()
    {
        return $this->hasMany(SoldeCongee::class);
    }
}
