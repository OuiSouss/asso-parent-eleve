<?php

use Illuminate\Database\Seeder;

class ContributionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contributions')->insert([
            'name' => 'Normal',
            'cost' => 15,
        ]);

        DB::table('contributions')->insert([
            'name' => 'Soutien',
            'cost' => 25,
        ]);

        DB::table('contributions')->insert([
            'name' => 'Bienfaiteur',
            'cost' => 39,
        ]);
    }
}
