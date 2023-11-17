<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Http\Resources\WorkerResource;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use Illuminate\Pipeline\Pipeline;
use App\Http\Filter\Worker\WorkerNameFilter;
use App\Http\Filter\Worker\WorkerSurnameFilter;
use App\Http\Filter\Worker\WorkerEmailFilter;
use App\Http\Filter\Worker\WorkerAgeToFromFilter;
use App\Http\Filter\Worker\WorkerDescriptionsFilter;
use App\Http\Filter\Worker\WorkerIsMarriedFilter;

class APIWorkerController extends Controller
{
    public function index() {
        //$data = $request->validated();
        
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

        $workers = $workerQuery->paginate(4);
        return  WorkerResource::collection($workers)->resolve();
    }

    public function show($id) {
        $worker = Worker::findOrFail($id);
        return WorkerResource::make($worker)->resolve();
    }

    public function store(StoreRequest $request) 
    {
        $data = $request->validated();
        $worker = Worker::create($data);
        return WorkerResource::make($worker)->resolve();
    }

    public function update($id, UpdateRequest $request) {
        $data = $request->validated();
        unset($data->id);
        $worker = Worker::findOrFail($id)->update($data);
        // $worker->fresh();
        // return WorkerResource::make($worker)->resolve();
        return response()->json(['update_worker' => $worker]);
    }

    public function destroy($id) {
        Worker::findOrFail($id)->delete();
        return response()->json(['destroy_worker' => true]);
    }
}
