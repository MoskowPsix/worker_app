@extends('loyaot.main')
   
@section('content')
    <div>
        <div>
            <form action="{{route('workers.store')}}" method="post">
                @csrf
                <div style="margin-bottom: 15px;">
                    <input type="text" name="name" placeholder="name">
                    <div>
                    @error('name')
                        {{$message}}
                    @enderror
                    </div>
                </div>
                <div style="margin-bottom: 15px;">
                    <input type="text" name="surname" placeholder="surname" value="{{old('surname')}}">
                </div>
                <div>
                    @error('surname')
                        {{$message}}
                    @enderror
                </div>
                <div style="margin-bottom: 15px;">
                    <input type="text" name="email" placeholder="email" value="{{old('email')}}">
                </div>
                <div>
                    @error('email')
                        {{$message}}
                    @enderror
                    </div>
                <div style="margin-bottom: 15px;">
                    <input type="number" name="age" placeholder="age" value="{{old('age')}}">
                </div>
                <div>
                    @error('age')
                        {{$message}}
                    @enderror
                    </div>
                <div style="margin-bottom: 15px;">
                    <textarea placeholder="decriptions" name="descriptions">{{old('isMarried')}}</textarea>
                </div>
                <div>
                    @error('decriptions')
                        {{$message}}
                    @enderror
                    </div>
                <div style="margin-bottom: 15px;">
                    <input id="isMarried" type="checkbox" name="is_married" {{old('isMarried') == 'on' ? 'checked' : ''}}>
                    <label for="isMarried">Is married</label>
                </div>
                @error('is_married')
                    {{$message}}
                @enderror
                <div style="margin-bottom: 15px;"><input type="submit" value="Создать"></div>
            </form>
        </div>
    </div>
@endsection