@extends('loyaot.main')
   
@section('content')
    <div>
        <div>
            <form action="{{route('workers.update', $worker->id)}}" method="post">
                @csrf
                @method('Patch')
                <div style="margin-bottom: 15px;"><input type="text" name="name" placeholder="name" value="{{ old('name') ?? $worker->name}}"></div>
                <div>
                    @error('name')
                        {{$message}}
                    @enderror
                </div>
                <div style="margin-bottom: 15px;"><input type="text" name="surname" placeholder="surname" value="{{old('surname') ?? $worker->surname}}"></div>
                <div>
                    @error('surname')
                        {{$message}}
                    @enderror
                </div>
                <div style="margin-bottom: 15px;"><input type="text" name="email" placeholder="email" value="{{old('email') ?? $worker->email}}"></div>
                <div>
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
                <div style="margin-bottom: 15px;"><input type="number" name="age" placeholder="age" value="{{old('age') ?? $worker->age}}"></div>
                <div>
                    @error('age')
                        {{$message}}
                    @enderror
                </div>
                <div style="margin-bottom: 15px;"><textarea placeholder="decriptions" name="descriptions">{{old('descriptions') ?? $worker->descriptions}}</textarea></div>
                <div>
                    @error('decriptions')
                        {{$message}}
                    @enderror
                </div>
                <div style="margin-bottom: 15px;"><input id="isMarried" type="checkbox" name="is_married" {{ $worker->is_married ? 'checked' : ''}}>
                    <label for="isMarried">Is married</label>
                </div>
                <div>
                    @error('is_married')
                        {{$message}}
                    @enderror
                </div>
                <div style="margin-bottom: 15px;"><input type="submit" value="Сохранить"></div>
            </form>
        </div>
    </div>
    @endsection
