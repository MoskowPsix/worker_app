@extends('loyaot.main')
   
@section('content')
   
    <div>
        <form action="{{route('workers.index')}}" method="get" >
            <input type="text" name="name" placeholder="name" value="{{request()->get('name')}}">
            <input type="text" name="surname" placeholder="surname" value="{{request()->get('surname')}}">
            <input type="text" name="email" placeholder="email" value="{{request()->get('email')}}">
            <input type="number" name="from" placeholder="from" value="{{request()->get('from')}}">
            <input type="number" name="to" placeholder="to" value="{{request()->get('to')}}">
            <input type="text" name="descriptions" placeholder="descriptions" value="{{request()->get('descriptions')}}">
            <input type="checkbox" name="is_married" id="isMarried" {{request()->get('is_married') == 'on'? 'checked' : ''}}>
            <label for="isMarried"></label>
            <input type="submit" value="Найти">
            <a href="{{route('workers.index')}}">Сбросить</a>
        </form>
    </div>
    <div>
            @can('create', \App\Modal\Worker::class)
            <div><a href="{{route('workers.create')}}">Добавить</a></div>
            @endcan
        @foreach($workers as $worker)
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
            <div><a href="{{ route('workers.show', $worker->id) }}">Посмотреть</a></div>
             @can('update', $worker)
             <div><a href="{{ route('workers.edit', $worker->id) }}">Редактировать</a></div>
             @endcan
             @can('update', $worker)
            <div>
                <form action="{{route('workers.destroy', $worker->id)}}" method="post">
                @csrf
                @method('Delete')
                <input type="submit" value="Удалить">
                </form>
            </div>
            @endcan
            <hr>
        @endforeach

        <div class="my-nav">{{$workers->withQueryString()->links()}}</div>
    </div>

    @endsection