<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('email', 32)->unique();
            $table->string('phone', 11);
            $table->string('password', 100);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('users');
    }
};
