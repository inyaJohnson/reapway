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
            'phone' => '07037555691',
            'referral_code' => substr(md5(time()), 0, 16),
            'email_verified_at' => now(),
        ]);

        $admin->role()->attach($role, ['created_at' => now(), 'updated_at' => now()]);
    }
}
