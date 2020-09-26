<?php


namespace App\Http\View\Composers;


use App\Investment;
use App\User;
use App\Withdrawal;
use Illuminate\View\View;

class AdminData
{
    public function compose(View $view){
        $investments = Investment::with('package')->get();
        $investmentPriceList = [];
        foreach ($investments as $investment){
            $investmentPriceList[] = $investment->package->price;
        }
        $totalInvestment = number_format(array_sum($investmentPriceList));
        $availableWithdrawal = number_format(Withdrawal::where('confirmation_status', 0)->sum('amount'));
        $totalWithdrawal = number_format(Withdrawal::where('confirmation_status', 1)->sum('amount'));
        $totalNumberOfInvestment = Investment::all()->count();
//        $investments = Investment::with('withdrawal', 'user', 'package')->latest()->get();
        $investments = Investment::with( 'user', 'package')->latest()->get();
        $numOfUsers = User::all()->count();
        $numOfBlockedUsers = User::where('blocked', 1)->get()->count();
        $numOfActiveUsers = User::where('blocked', 0 )->get()->count();

        return $view->with(['investments' => $investments, 'totalInvestment'=> $totalInvestment,
            'totalWithdrawal' => $totalWithdrawal, 'availableWithdrawal'=>$availableWithdrawal,
            'totalNumberOfInvestment' => $totalNumberOfInvestment, 'numOfUsers' => $numOfUsers,
            'numOfBlockedUsers' => $numOfBlockedUsers, 'numOfActiveUsers' => $numOfActiveUsers]);
    }
}
