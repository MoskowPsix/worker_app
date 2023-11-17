<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\Http\Filter\Var1\WorkerFilter;


class WorkerController extends Controller
{
    public function index(IndexRequest $request) 
    {
        $data = $request->validated();

        // $filter = new WorkerFilter($data);
        // $workerQuery = Worker::filter($filter);
        $filter = app()->make(WorkerFilter::class, ['params' => $data]);
        $workerQuery = Worker::filter($filter);

        $workers = $workerQuery->paginate(4);
        return view('workers.index', compact('workers'));
    }
    public function show($id) 
    {
        $worker = Worker::find($id);
        return view('workers.show', compact('worker'));
    }
    public function create() 
    {
        $this->authorize('create', Worker::class);
        return view('workers.create');
    }
    public function store(StoreRequest $request) 
    {
        $this->authorize('create', Worker::class);
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        Worker::create($data);
        return redirect()->route('workers.index');
    }
    public function edit($id) 
    {
        $this->authorize('update', Worker::find($id));
        $worker = Worker::find($id);
        return view('workers.edit', compact('worker'));
    }
    public function update($id, UpdateRequest $request) 
    {
        $this->authorize('update', Worker::find($id));
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        Worker::find($id)->update($data);
        return redirect()->route('workers.show', $id);
    }
    public function destroy($id) 
    {
        $this->authorize('delete', Worker::find($id));
        Worker::find($id)->delete();
        return redirect()->route('workers.index');
    }
}
