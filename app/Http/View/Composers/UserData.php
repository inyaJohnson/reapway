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
        $totalInvestment = number_format(auth()->user()->investment->pluck('amount')->sum());
        $deposits = Deposit::where([
            ['user_id', auth()->user()->id],
            ['confirmation_status', 0]
        ])->get();

        $withdrawals = Withdrawal::where([
            ['user_id', auth()->user()->id],
            ['confirmation_status', 0]
        ])->get();

        $runningInvestments = auth()->user()->investment()->where('withdrawn', 0)->get();
        $investments = auth()->user()->investment;

        return $view->with(['totalWithdrawn' => $totalWithdrawn, 'pendingWithdrawal' => $pendingWithdrawal, 'totalNumberInvestment' => $totalNumberInvestment,
            'totalInvestment' => $totalInvestment, 'deposits' => $deposits, 'withdrawals' => $withdrawals, 'runningInvestments' => $runningInvestments,
            'investments' => $investments]);
    }
}
