<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use \App\Models\User;
use \App\Models\Roles;
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
        User::factory(15)->create();

        Roles::factory()->create([
            'name' => 'admin',
            'slug' => 'admin-role'
        ]);

        Roles::factory()->create([
            'name' => 'user',
            'slug' => 'user-role'
        ]);

        foreach(User::all() as $user) {
            $roles = Roles::inRandomOrder()->take(rand(1,2))->pluck('id');
            $user->roles()->attach($roles);
        }
    }
}
