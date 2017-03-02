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
            'cost' => 10,
        ]);

        DB::table('contributions')->insert([
            'name' => 'Bienfaiteur',
            'cost' => 50,
        ]);
    }
}
