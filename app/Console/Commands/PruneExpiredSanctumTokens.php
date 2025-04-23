<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PruneExpiredSanctumTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prune-expired-sanctum-tokens {--hours=24 : Hours since expiration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
//        $model = Sanctum::$personalAccessTokenModel;
//        $pruned = $model::where('expires_at', '<', now())->delete();
//        $this->info("Pruned {$pruned} expired Sanctum tokens.");

        $hours = $this->option('hours');
        $this->call('sanctum:prune-expired', [
            '--hours' => $hours
        ]);
        $this->info("Pruned Sanctum tokens expired for {$hours} hours");
    }
}
