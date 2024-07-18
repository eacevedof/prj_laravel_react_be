<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Users\Domain\Entities\UserEntity;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();
        UserEntity::factory()->create([
            "name" => "Test User",
            "email" => "test@example.com",
        ]);
    }
}
