<?php

namespace App\Console\Commands;

use App\Jobs\SomeJob;
use App\Models\Deportment;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectWorker;
use App\Models\Worker;
use App\Models\Client;
use App\Models\Avatar;
use App\Models\Review;
use App\Models\Tag;
use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Some develops';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    SomeJob::dispatch()->onQueue('some_queue');
    return 0;
    }
}
