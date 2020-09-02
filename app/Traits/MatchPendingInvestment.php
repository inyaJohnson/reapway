<?php


namespace App\Traits;


use App\Transaction;
use App\Withdrawal;
use Carbon\Carbon;

trait MatchPendingInvestment
{
    public function match($packageId, $price, $depositorInvestmentId, $userId){
        /**
         * ptbp => people to be paid
         * mtbp => money to be paid
         * pdfp => people due for payment
         */
        $pdfp = [];
        $mismatch = [];
        $mtbp = $price;
        $withdrawals = Withdrawal::where([
            ['user_id', '!=', $userId],
            ['status', 0],
            ['match', 0]
        ])->get();
        $recipients = [];
        foreach ($withdrawals as $withdrawal) {
            $recipients[] = [
                'id' => $withdrawal->id,
                'investment_id' => $withdrawal->investment_id,
                'recipient_id' => $withdrawal->user_id,
                'maturityAge' => Carbon::now()->dayOfYear() - Carbon::parse($withdrawal->created_at)->dayOfYear,
                'amount' => $withdrawal->amount
            ];
        }
        $maturityAgeArray = array_column($recipients, 'maturityAge');
        array_multisort($maturityAgeArray, SORT_DESC, $recipients);
        foreach ($recipients as $recipient) {
            $temp = $mtbp - $recipient['amount'];
            if ($temp < 0) {
                array_push($mismatch, [
                    'id' => $recipient['id'],
                    'amount' => $recipient['amount'],
                    'recipient_id' => $recipient['recipient_id'],
                    'investment_id' => $recipient['investment_id']
                ]);
                continue;
            }
            $mtbp = $mtbp - $recipient['amount'];
            array_push($pdfp, [
                'id' => $recipient['id'],
                'amount' => $recipient['amount'],
                'recipient_id' => $recipient['recipient_id'],
                'investment_id' => $recipient['investment_id']
            ]);
        }

        if ($mtbp !== 0) {
            array_push($pdfp, [
                'id' => $mismatch[0]['id'],
                'amount' => $mtbp,
                'recipient_id' => $mismatch[0]['recipient_id'],
                'investment_id' => $mismatch[0]['investment_id']
            ]);
//            $createBalanceWithdrawal = Withdrawal::findOrFail($mismatch[0]['recipient_id']);
            Withdrawal::create([
                'user_id' => $mismatch[0]['recipient_id'],
                'investment_id' => $mismatch[0]['investment_id'],
                'amount' => $mismatch[0]['amount'] - $mtbp,
            ]);
        }

//        what to do if investment > withdrawal

        foreach ($pdfp as $transaction) {
            Transaction::create([
                'user_id' => $userId,
                'package_id' => $packageId,
                'recipient_investment_id' => $transaction['investment_id'],
                'depositor_investment_id' => $depositorInvestmentId,
                'depositor_id' => $userId,
                'recipient_id' => $transaction['recipient_id'],
                'withdrawal_id' => $transaction['id'],
                'amount' => $transaction['amount'],
                'deadline' => Carbon::now()->addHours(13),
            ]);

            $updateWithdrawal = Withdrawal::findOrFail($transaction['id']);
            $updateWithdrawal->update(['match' => 1]);
        }
    }
}
