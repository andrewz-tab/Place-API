<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Place;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'login' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('admin'),
        ]);
        $user1 = User::factory()->create([
            'login' => 'user',
            'role' => 'user',
            'password' => Hash::make('user'),
        ]);
        $places = Place::factory(10)->create();
        $users = User::factory(10)->create();
        $users->add($admin)->add($user1);
        
        foreach($users as $user){
            $user->places()->attach($places->random(rand(1,3))->pluck('id')->toArray());
        }
    }
}
