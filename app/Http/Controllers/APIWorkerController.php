<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Http\Resources\WorkerResource;

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
}
