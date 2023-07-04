<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agent;

class AgencijaZaNekretnine extends Model
{
    //mpora da se stavi u svakom modelu ovo ako nam ime baze nije isto kao model
   // protected $table = 'agencija_za_nekretnine';
    use HasFactory;
    protected $fillable = [
        'naziv',
        'adresa',
        'email',
        'website',
        'brojTelefona'
    ];


    //jedna agencija ima vise zaposlenih
public function agenti(){
    return $this->hasMany(Agent::class);
}



}
