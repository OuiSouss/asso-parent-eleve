<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ContributionsTableSeeder::class);
        factory(App\User::class, 40)->create();
        factory(App\Adherent::class, 40)->create();
        factory(App\Level::class, 3)->create();
        factory(App\Subject::class, 3)->create();
        factory(App\Section::class, 3)->create();
        factory(App\BookReference::class, 10)->create();
        factory(App\Order::class, 10)->create();
        factory(App\Book::class, 40)->create();
        factory(App\BookOrder::class, 50)->create();
    }
}
