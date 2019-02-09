<?php

use Illuminate\Database\Seeder;

class MedicamentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Medicament::class,30)->create();
    }
}
