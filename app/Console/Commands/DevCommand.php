<?php

namespace App\Console\Commands;

use App\Http\Filter\Var1\WorkerFilter;
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
    $workerQuery = Worker::query();
    $filter = new WorkerFilter(['from' => 25, 'to' => 27]);
    $filter->applyFilter($workerQuery);
    dump($workerQuery->get()->toArray());
    return 0;
    }
}
