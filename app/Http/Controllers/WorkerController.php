<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index() 
    {
        $workers = Worker::all();
        dd($workers);
        return $workers;
    }
    public function show($id) 
    {
        $worker = Worker::find($id);
        dd($worker);
        return $worker;
    }
    public function create() 
    {
        $worker = [
            'name' => 'Alex',
            'surname' => 'TESRA',
            'email' => 'tae@er.re',
            'age' => 14,
            'descriptions' => 'I fat',
            'is_married' => false,
        ];
        Worker::create($worker);
        return 'create ok';
    }
    public function update(Worker $worker) 
    {
        $worker->save();
        return 'Worker updated';
    }
    public function delete($id) 
    {
        Worker::find($id)->delete();
        return 'Worker deleted';
    }
}
