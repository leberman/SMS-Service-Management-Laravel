<?php

namespace Database\Factories;

use Domains\User\Models\Sms;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class SmsFactory extends Factory
{
    protected $model = Sms::class;

    public function definition(): array
    {
        return [
            'message' => fake()->text(70),
            'user_id' => 1,
        ];
    }
}
