<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Http\Resources\WorkerResource;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;

class APIWorkerController extends Controller
{
    public function index() {
        $workers = Worker::all();
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
