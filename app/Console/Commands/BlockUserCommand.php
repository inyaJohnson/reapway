<?php

namespace App\Console\Commands;

use App\Investment;
use App\Transaction;
use App\User;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Console\Command;

class BlockUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'block:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Block users that miss deposit timeline';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $transactions = Transaction::where([
            ['depositor_status', 0],
            ['deadline', '<=', Carbon::now()->addHour()]
        ])->get();

        foreach ($transactions as $transaction){
            $user = User::find($transaction->depositor_id);
            $user->update(['blocked' => 1]);
            $investment = Investment::find($transaction->depositor_investment_id);
            if($investment !== null){
                $investment->delete();
            }
            Withdrawal::create([
                'user_id' => $transaction->recipient_id,
                'investment_id' => $transaction->recipient_investment_id,
                'amount' => $transaction->amount,
            ]);
            $transaction->delete();
        }
    }
}
