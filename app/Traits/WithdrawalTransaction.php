<?php


namespace App\Traits;


use Carbon\Carbon;

trait WithdrawalTransaction
{
    public function createWithdrawal($packageId, $investmentId, $amount){
        auth()->user()->transaction()->create([
            'package_id' => $packageId,
            'investment_id' => $investmentId,
            'depositor_id' => auth()->user()->id,
            'type' => 'deposit',
            'amount' => $amount,
            'deadline' => Carbon::now()->addHours(13),
        ]);
    }
}
