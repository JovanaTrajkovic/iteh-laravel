<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AgencijaZaNekretnine;

class Agent extends Model
{
    use HasFactory;
    public function agencija(){
        return $this->belongsTo(AgencijaZaNekretnine::class);
    }

    public function klijenti(){
        return $this->hasMany(Klijent::class);
    }
}
