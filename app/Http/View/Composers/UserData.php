<?php


namespace App\Http\View\Composers;


use App\Deposit;
use App\Withdrawal;
use Illuminate\View\View;

class UserData
{
    public function compose(View $view)
    {
        $totalWithdrawn = auth()->user()->withdrawal()->where('confirmation_status', 1)->count();
        $pendingWithdrawal = auth()->user()->withdrawal()->where('confirmation_status', 0)->count();
        $totalNumberInvestment = auth()->user()->investment->count();
        $investmentPriceList = [];
        foreach (auth()->user()->investment as $investment){
            $investmentPriceList[] = $investment->package->price;
        }
        $totalInvestment = number_format(array_sum($investmentPriceList));

        $deposits = Deposit::where([
            ['user_id', auth()->user()->id],
            ['confirmation_status', 0]
        ])->get();

        $withdrawals = Withdrawal::where([
            ['user_id', auth()->user()->id],
            ['confirmation_status', 0]
        ])->get();

        $investments = auth()->user()->investment;

        return $view->with(['totalWithdrawn' => $totalWithdrawn , 'pendingWithdrawal' => $pendingWithdrawal, 'totalNumberInvestment' =>$totalNumberInvestment,
            'totalInvestment' => $totalInvestment, 'deposits' => $deposits, 'withdrawals' => $withdrawals,'investments' =>$investments]);
    }
}
