<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agent;

class AgencijaZaNekretnine extends Model
{
    use HasFactory;
    //jedana agencija ima vise zaposlenih
public function agenti(){
    return $this->hasMany(Agent::class);
}


}
