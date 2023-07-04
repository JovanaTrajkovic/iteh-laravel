<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AgencijaZaNekretnineSeeder;
use Database\Seeders\AgentSeeder;
 use Database\Seeders\KlijentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $an = new AgencijaZaNekretnineSeeder();
        $ag = new AgentSeeder();
        $kl = new KlijentSeeder();
        $an->run();
        $ag->run();
        $kl->run();
    }
}
