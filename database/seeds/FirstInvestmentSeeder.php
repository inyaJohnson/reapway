<?php

use Illuminate\Database\Seeder;
use App\Package;
use App\Investment;
use App\Withdrawal;

class FirstInvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Package::create([
                'name' => 'RocketPay Starter',
                'description' => 'Capital Package',
                'price' => 500000,
                'percentage' => 100,
                'duration' => 0
            ]);

            Investment::create([
                'user_id' => 1,
                'package_id' => 1,
                'percentage' => 100,
                'duration' => 0,
                'profit' => 500000,
                'maturity' => 1,
                'withdrawn' => 0,
                'reinvest' => 2
            ]);

            Withdrawal::create([
                'user_id' => 1,
                'investment_id' => 1,
                'amount' => 500000,
                'status' => 0,
                'match' => 0
            ]);
    }
}
