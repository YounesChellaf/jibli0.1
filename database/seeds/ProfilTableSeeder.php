<?php

use Illuminate\Database\Seeder;

class ProfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Profil::class,20)->create();
    }
}
