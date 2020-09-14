<?php

namespace App\Console\Commands;

use App\Deposit;
use App\Investment;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckMaturityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:maturity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if investment is matured';

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
        $deposits = Deposit::with('investment', 'package')->where('confirmation_status', 1)->get();
        foreach ($deposits as $deposit) {
            if (Carbon::now()->dayOfYear() - Carbon::parse($deposit->updated_at)->dayOfYear >= $deposit->package->duration) {
                $deposit->investment->update([
                    'maturity' => 1,
                ]);
            }
        }
    }
}
