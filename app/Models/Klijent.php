<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agent;

class Klijent extends Model
{
    use HasFactory;
    protected $fillable = [
        'ime',
        'prezime',
        'email',
        'brojTelefona',
        'agent_id'

    ];
    public function agenti(){
        return $this->belongsTo(Agent::class);
    }
}
