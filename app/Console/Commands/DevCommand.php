<?php

namespace App\Console\Commands;

use App\Http\Filter\Var1\WorkerFilter;
use App\Http\Filter\Worker\WorkerNameFilter;
use App\Http\Filter\Worker\WorkerSurnameFilter;
use App\Http\Filter\Worker\WorkerEmailFilter;
use App\Http\Filter\Worker\WorkerAgeToFromFilter;
use App\Http\Filter\Worker\WorkerDescriptionsFilter;
use App\Http\Filter\Worker\WorkerIsMarriedFilter;

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
use Illuminate\Pipeline\Pipeline;

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
        request()->merge([
            'name' => 'a',
            'to' => 30,
            'from' => 25
        ]);
        $workerQuery = Worker::query();
        $workers = app()->make(Pipeline::class)
        ->send($workerQuery)
        ->through([
            WorkerNameFilter::class,
            WorkerSurnameFilter::class,
            WorkerEmailFilter::class,
            WorkerDescriptionsFilter::class,
            WorkerIsMarriedFilter::class,
        ])
        ->thenReturn();

        dd($workers->get());
    }
}
