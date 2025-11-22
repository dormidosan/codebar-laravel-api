<?php

use App\Console\Commands\PruneExpiredSanctumTokens;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command(PruneExpiredSanctumTokens::class)->daily();

// Another possibility for scheduling a command:
//Schedule::command('sanctum:prune-expired --hours=24')->daily();
//Schedule::command('app:prune-expired-sanctum-tokens --hours=24')->daily();

// Two valid options for scheduling a command:
// Schedule::command('emails:send Taylor --force')->daily();
// Schedule::command(SendEmailsCommand::class, ['Taylor', '--force'])->daily();

// Another alternative for scheduling a command:
Artisan::command('emails:send {user} {--force}', function () {
    $this->info('Deleting recent users...');
    // Logic to delete recent users
    // For example, you can use a model to delete users older than a certain date
    // User::where('created_at', '<', now()->subDays(30))->delete();
    $this->info('Recent users emailed successfully.');
})->purpose('Send emails to the specified user')->daily();

Schedule::call(function () {
    // print message in laravel.log
    Log::info('Deleting recent users 2 mins...');
})->everyTwoMinutes()->name('delete-recent-users');