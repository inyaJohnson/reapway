<?php


namespace App\Http\View\Composers;


use App\Investment;
use App\Package;
use App\User;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\View\View;

class AdminData
{
    public function compose(View $view)
    {
        $nextToMature = [];
        $investments = Investment::with('user', 'package')->get();
        foreach ($investments as $investment) {
            if ((Carbon::now()->dayOfYear - Carbon::parse($investment->updated_at)->dayOfYear) >= 20
                && $investment->status == 1 && $investment->withdrawn == 0) {
                $nextToMature[] = $investment;
            }
        }
        $totalInvestment = number_format(Investment::where([
            ['status', 1],
            ['maturity', 0]
        ])->pluck('capital')->sum());

        $availableWithdrawal = number_format(Withdrawal::where('confirmation_status', 0)->sum('amount'));
        $totalWithdrawal = number_format(Withdrawal::where('confirmation_status', 1)->sum('amount'));
        $totalNumberOfInvestment = Investment::all()->count();
        $pendingInvestment = Investment::where('status', 0)->count();
        $numOfUsers = User::all()->count();
        $numOfBlockedUsers = User::where('blocked', 1)->count();
        $numOfActiveUsers = User::where('blocked', 0)->count();

        return $view->with(['investments' => $investments, 'totalInvestment' => $totalInvestment,
            'totalWithdrawal' => $totalWithdrawal, 'availableWithdrawal' => $availableWithdrawal,
            'totalNumberOfInvestment' => $totalNumberOfInvestment, 'numOfUsers' => $numOfUsers, 'pendingInvestment' => $pendingInvestment,
            'numOfBlockedUsers' => $numOfBlockedUsers, 'numOfActiveUsers' => $numOfActiveUsers, 'nextToMature' => $nextToMature]);
    }
}

//
//Investment::with('user', 'package')->where([
//    ['status', 1],
//    ['withdrawn', 0],
//])
//    ->whereRaw()
//    ->latest()->get();
