<?php


namespace App\Traits;
use Carbon\Carbon;

trait DepositTransaction
{
    public function  create($packageId, $investmentId, $amount){
        auth()->user()->deposit()->create([
            'package_id' => $packageId,
            'investment_id' => $investmentId,
            'depositor_id' => auth()->user()->id,
            'type' => 'deposit',
            'amount' => $amount,
            'deadline' => Carbon::now()->addHours(13),
        ]);
    }


}
