<?php

namespace App\Console\Commands;

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
    // $worker = Worker::find(1);
    // $worker->delete();
    // $worker2 = Worker::find(2);
    // $worker2->delete();
    // $worker = Worker::withTrashed()->find(1);
    // $worker->restore();
    // $workers = Worker::all();

    $workers = Worker::onlyTrashed()->get();
    foreach ($workers as $worker) {
        $worker->restore();
    }

    $worker->forceDelete(); // Delete навсегда


    // dd($workers->count());
    return 0;
    }
}
