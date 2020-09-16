<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \App\Role::where('name', 'admin')->first();
        $admin = \App\User::create([
            'name' => 'Admin Way',
            'email' => 'admin@reapway.ng',
            'password' => bcrypt('12345678'),
            'phone' => '08134822658',
        ]);

        $admin->role()->attach($role, ['created_at' => now(), 'updated_at' => now()]);
    }
}
