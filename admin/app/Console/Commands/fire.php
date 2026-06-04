<?php

namespace App\Console\Commands;

use App\Jobs\TestJob;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('fire')]
#[Description('Command description')]
class fire extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        TestJob::dispatch();
    }
}
