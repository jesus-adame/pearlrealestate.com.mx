<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        User::create([
            'name' => 'root',
            'last_name' => 'root',
            'email' => 'root@pearlrealestate.com.mx',
            'password' => bcrypt('secret22'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $this->call([
            AmenitySeeder::class,
        ]);
    }
}
