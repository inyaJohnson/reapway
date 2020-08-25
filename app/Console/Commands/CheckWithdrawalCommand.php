<?php

namespace App\Console\Commands;

use App\Investment;
use App\Withdrawal;
use Illuminate\Console\Command;

class CheckWithdrawalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:withdrawal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if investment withdrawal is complete';

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
        $investments = Investment::where('commitment', 1)->get();
        foreach ($investments as $investment){
            $transactionStatus = $investment->recipientTransaction->where('recipient_status', 1)->pluck('withdrawal_id');
            Withdrawal::whereIn('id', $transactionStatus)->update(['status'=> 1]);
            $withdrawalStatus = $investment->withdrawal->pluck('status');
            if(!$withdrawalStatus->isEmpty() && !in_array(0, $withdrawalStatus->toArray())){
                $investment->update(['withdrawn' => 1]);
            }
        }
    }
}
