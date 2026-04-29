@extends('layouts.app')

@section('content')
    <h1>Админ панель</h1>
    <form method="post" action="{{ route('addProduct') }}" enctype="multipart/form-data" class="mt-5">
        @csrf
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Добавление продукта</h5>
                <label for="title" class="form-label">Название продукта</label>
                <input type="text" class="form-control" id="title" name="title"><br>

                <label for="description" class="form-label">Описание</label>
                <textarea type="text" class="form-control" id="description" name="description"></textarea><br>

                <label for="quantity" class="form-label">Количество</label>
                <input type="number" class="form-control" id="quantity" name="quantity"><br>

                <label for="image" class="form-label">Фото товара</label>
                <input type="file" class="form-control" id="image" name="image" required accept="image/*"><br>

                <label for="price" class="form-label">Цена</label>
                <input type="number" class="form-control" id="price" name="price"><br>

                <button type="submit" class="btn btn-primary">Добавить</button>
                <p>{{ session('messageAddProduct') }}</p>
            </div>
        </div>
    </form>



    <form method="post" action="{{ route('deleteProduct') }}" class="mt-5">
        @csrf
        @method('DELETE')
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Удаление продукта</h5>
                <select name="id_products" id="" class="form-select">
                    @foreach ($products as $a)
                        <option value="{{ $a->id }}">{{ $a->title }}</option>
                    @endforeach
                </select><br>
                <button type="submit" class="btn btn-danger">Удалить</button>
                <p>{{ session('messagedeleteProduct') }}</p>
            </div>
        </div>
    </form>

   <h2 class="mt-5">Пользователи</h2>


<table class="table mt-1">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">role</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Редактирование</th>
            <th scope="col">Удалить</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>
                @if($user->role_id == 1)
                    <span class="badge bg-secondary">Пользователь</span>
                @else
                    <span class="badge bg-danger">Админ</span>
                @endif
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('EditUserView', ['id' => $user->id]) }}" class="btn btn-outline-primary btn-sm">Редактировать</a>
            </td>
            <td>
                <form method="POST" action="{{ route('DeleteUser', $user->id) }}" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        Удалить
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@if(session('messageDeleteUser'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('messageDeleteUser') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


   <h2 class="mt-5">Бронь</h2>
<table class="table mt-1">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">user_id</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Телефон</th>
            <th scope="col">Кол-во гостей</th>
            <th scope="col">Столик</th>
            <th scope="col">Дата брони</th>
            <th scope="col">Время</th>
            <th scope="col">Статус</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Редактирование</th>
            <th scope="col">Удалить</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $b)
        <tr>
            <th scope="row">{{ $b->id }}</th>
            <td>{{ $b->user_id }}</td>
            <td>{{ $b->name }}</td>
            <td>{{ $b->surname }}</td>
            <td>{{ $b->phone }}</td>
            <td>{{ $b->guests }}</td>
            <td>{{ $b->table_id }}</td>
            <td>{{ $b->booking_date }}</td>
            <td>{{ \Carbon\Carbon::parse($b->slot_time)->format('H:i') }}</td>
            <td>{{ $b->status_name}}</td>
            <td>{{ $b->created_at }}</td>
            <td>
                <a href="{{ route('EditBookingView', ['id' => $b->id]) }}" class="btn btn-outline-primary btn-sm">Редактировать</a>
            </td>
            <td>
                <form method="POST" action="{{ route('DeleteBooking', $b->id) }}" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        Удалить
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@if(session('messageDeleteBooking'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('messageDeleteBooking') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@endsection
