<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            'name' => 'Générale'
        ]);

        DB::table('sections')->insert([
            'name' => 'Scientifique'
        ]);

        DB::table('sections')->insert([
            'name' => 'Littéraire'
        ]);

        DB::table('sections')->insert([
            'name' => 'Économique et social'
        ]);
    }
}
