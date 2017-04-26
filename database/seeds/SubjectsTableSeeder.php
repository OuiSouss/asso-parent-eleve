<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Français'
        ]);

        DB::table('subjects')->insert([
            'name' => 'Mathématiques'
        ]);

        DB::table('subjects')->insert([
            'name' => 'Sciences et Vie de la Terre'
        ]);

        DB::table('subjects')->insert([
            'name' => 'Physique-Chimie'
        ]);

        DB::table('subjects')->insert([
            'name' => 'Anglais'
        ]);

        DB::table('subjects')->insert([
            'name' => 'Espagnol'
        ]);
    }
}
