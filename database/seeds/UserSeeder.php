<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            'name' => 'Rocket Pay',
            'email' => 'admin@rocketpay.cc',
            'password' => bcrypt('Rocking_hard_067'),
            'referral_code' => substr(md5(time()), 0, 16),
        ]);

        $admin->role()->attach($role, ['created_at' => now(), 'updated_at' => now()]);
    }
}
