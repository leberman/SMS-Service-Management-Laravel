<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \User\Models\User::factory(10)->create();

        if (app()->environment('local')) {
            $this->call(
                class: DefaultUserSeeder::class
            );
            $this->call(
                class: DefaultSmsSeeder::class
            );
        }
    }
}
