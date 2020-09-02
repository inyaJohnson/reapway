<?php


namespace App\Traits;


trait CreatePendingInvestment
{
    public function pendingInvestment($package){
        $message = ['success' => 'Investment created, You will be matched soon'];
        $investment = auth()->user()->investment()->create([
            'package_id' => $package->id,
            'percentage' => $package->percentage,
            'duration' => $package->duration,
            'profit' => round($package->price * ($package->percentage / 100)),
            'pending' => 1
        ]);
        if(!$investment){
            $message = ['error' => 'Unable to create Investment'];
        }
        return $message;
    }
}
