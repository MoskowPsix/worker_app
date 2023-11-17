<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(IndexRequest $request) 
    {
        $data = $request->validated();
        $workerQuery = Worker::query();

        if (isset($data['name'])) {
            $workerQuery->where("name", 'LIKE', "%".$data["name"]."%");
        }

        if (isset($data['surname'])) {
            $workerQuery->where("name", 'LIKE', "%".$data["surname"]."%");
        }

        if (isset($data['email'])) {
            $workerQuery->where("name", 'LIKE', "%".$data["email"]."%");
        }

        if (isset($data['from'])) {
            $workerQuery->where("age", '>', $data["from"]);
        }

        if (isset($data['to'])) {
            $workerQuery->where("age", '<', $data["to"]);
        }

        if (isset($data['descriptions'])) {
            $workerQuery->where("name", 'LIKE', "%".$data["descriptions"]."%");
        }

        if (isset($data['is_married'])) {
            $workerQuery->where("is_married", true);
        }

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
