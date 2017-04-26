<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'name' => 'Seconde'
        ]);

        DB::table('levels')->insert([
            'name' => 'Première'
        ]);

        DB::table('levels')->insert([
            'name' => 'Terminale'
        ]);
    }
}
