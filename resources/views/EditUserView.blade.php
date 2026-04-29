@extends('layouts.app')

@section('content')
    <h1>Редактирование пользователя</h1>
    <form method="post" action="{{ route('EditUser', ['id'=>$users->id]) }}" enctype="multipart/form-data" class="mt-5">
        @csrf
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Пользователь</h5>
                <label for="name" class="form-label">Имя</label>
                <input type="text"  value="{{ $users->name }}" class="form-control" id="name" name="name"><br>

                <label for="surname" class="form-label">Фамилия</label>
                <input type="text" value="{{ $users->surname }}" class="form-control" id="surname" name="surname"></input><br>

                <label for="phone" class="form-label">Номер</label>
                <input type="number" value="{{ $users->phone }}" class="form-control" id="phone" name="phone"><br>

                <label for="email" class="form-label">email</label>
                <input type="Text" value="{{ $users->email }}" class="form-control" id="email" name="email"><br>

                <button type="submit" class="btn btn-outline-primary">Изменить</button>
                <p>{{ session('messageEditUser') }}</p>
            </div>
        </div>
    </form>
@endsection
