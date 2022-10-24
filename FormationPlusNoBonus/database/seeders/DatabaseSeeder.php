<?php

namespace Database\Seeders;

use App\Models\Convention;
use App\Models\Etudiant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // création de plusieurs conventions pour plusieurs etudiants
        Convention::factory(5)
        ->create()
        ->each(function ($convention) {
            Etudiant::factory(5)
            ->create(['id_convention' => $convention->id]);
        });
    }
}
