<?php

use Illuminate\Database\Seeder;

class ActivatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Activator::create([
            'account_name' => 'RocketPay',
            'account_number' => '2398675482',
            'bank' => 'firstBank',
            'phone' => '0897864572'
        ]);
    }
}
