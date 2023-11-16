@extends('loyaot.main')
   
@section('content')
    <div>
            <div>
                Name: {{$worker->name}}
            </div>
            <div>
                Surname: {{$worker->surname}}
            </div>
            <div>
                Email: {{$worker->email}}
            </div>
            <div>
                Age: {{$worker->age}}
            </div>
            <div>
                Descriptions: {{$worker->descriptions}}
            </div>
            <div>
                Is Married: {{$worker->is_married}}
            </div>
            <div>
                {{$worker->created_at}}
            </div>
            <div>
                {{$worker->updated_at}}
            </div>
            <div><a href="{{ route('workers.index') }}">Назад</a></div>
            <hr>
    </div>
@endsection