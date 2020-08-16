<?php

namespace App\Console\Commands;

use App\Investment;
use Illuminate\Console\Command;

class CheckCommitmentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:commitment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks if deposits have been made for an Investment';

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
//        $investments = Investment::where([
//            ['commitment', 0]
//        ])->get();
//
//        foreach ($investments as $investment){
//            $status = $investment->transaction->pluck('recipient_status');
//            if(!$status->isEmpty() && in_array(0, $status->toArray())){
//                continue;
//            }
//            $investment->update(['commitment' => 1]);
//        }

        $investments = Investment::where('commitment', 0)->get();
        foreach ($investments as $investment){
            $status = $investment->transaction->pluck('recipient_status');
            if(!$status->isEmpty() && !in_array(0, $status->toArray())){
                $investment->update(['commitment' => 1]);
            }
        }
    }
}
