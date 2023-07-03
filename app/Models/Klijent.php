<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agent;

class Klijent extends Model
{
    use HasFactory;

    public function agenti(){
        return $this->belongsTo(Agent::class);
    }
}
