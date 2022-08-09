<?php

namespace Database\Seeders;

use Domains\User\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DefaultUserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'uuid' => Str::uuid()->toString(),
            'first_name' => 'Mohammad',
            'last_name' => 'shahbazi',
            'email' => 'leberman11@gmail.com',
            'phone' => '09234567890'
        ]);
    }
}
