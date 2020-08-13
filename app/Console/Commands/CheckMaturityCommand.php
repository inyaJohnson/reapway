<?php

namespace App\Console\Commands;

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
        $investments = Investment::where('maturity', 0)->get();
        foreach ($investments as $investment){
            if(Carbon::now()->dayOfYear() - Carbon::parse($investment->created_at)->dayOfYear > $investment->duration) {
                $investment->update([
                    'maturity' => 1,
                ]);
            }
        }

    }
}
