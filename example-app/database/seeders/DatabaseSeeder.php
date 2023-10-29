<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\PostModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    

       $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);
    }
}
