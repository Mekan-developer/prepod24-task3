<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    protected static ?string $password;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'name' => 'Mekan',
            'email' => 'mekan.developer@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('Secret!'),
            'remember_token' => Str::random(10), 
        ]);
        $user2 = User::create([
            'name' => 'Mekan2',
            'email' => 'mekan2@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('Secret!'),
            'remember_token' => Str::random(10), 
        ]);
        $user3 = User::create([
            'name' => 'Mekan3',
            'email' => 'mekan3@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('Secret!'),
            'remember_token' => Str::random(10), 
        ]);

        Auth::login($user);
        Auth::login($user2);
        Auth::login($user3);
    }
}
