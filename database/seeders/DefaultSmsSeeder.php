<?php

namespace Database\Seeders;

use Domains\User\Models\Sms;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DefaultSmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sms::factory()->create([
            'uuid' => Str::uuid()->toString(),
            'user_id' => 1
        ]);
    }
}
