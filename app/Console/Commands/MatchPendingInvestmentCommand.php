<?php

namespace App\Console\Commands;

use App\Investment;
use App\Referral;
use App\Traits\MatchPendingInvestment;
use App\User;
use App\Withdrawal;
use Illuminate\Console\Command;

class MatchPendingInvestmentCommand extends Command
{
    use MatchPendingInvestment;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'match:pendingInvestment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Matches Pending Investments';

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
        $pendingInvestments = Investment::where('pending', 1)->get();
        foreach ($pendingInvestments as $pendingInvestment){
            $referral = Referral::where('referred_id', $pendingInvestment->user_id)->first();
            $withdrawable = Withdrawal::where([['status', 0], ['match', 0], ['user_id', '!=', $pendingInvestment->user_id]])->pluck('amount')->sum();
            if($pendingInvestment->package->price <= $withdrawable){

                $this->match($pendingInvestment->package->id, $pendingInvestment->package->price, $pendingInvestment->id, $pendingInvestment->user_id);
                $user = User::find($pendingInvestment->user_id);
                if ($user->investment->count() == 1 && $referral !== null) {
                    $referral->update(['amount' => ($pendingInvestment->package->price * 5) / 100, 'investment_id' => $pendingInvestment->id]);
                }
                $pendingInvestment->update(['pending' => 0]);
            }
        }
    }
}
