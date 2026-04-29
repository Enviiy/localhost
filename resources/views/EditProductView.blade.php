@extends('layouts.app')

@section('content')
    <h2 class="m-5 mb-0">Редактировать товар</h2>
    <form action="{{ route('EditProduct', ['id' => $products->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card p-2 m-5">
            <img src="{{ asset($products->image) }}" class="img-fluid" style="max-height: 100%; width: 25%; max-width: 100%; object-fit: contain;">
            <div class="card-body">
                <label class="form-label mt-3" for="title">Название товара</label>
                <input class="form-control" type="text" id="title" name="title" value="{{ $products->title }}">

                <label class="form-label mt-3" for="description">Описание товара</label>
                <textarea class="form-control" rows="5" type="text" id="description" name="description">{{ $products->description }}</textarea>

                <label class="form-label mt-3" for="quantity">Кол-во шт.</label>
                <input class="form-control" type="text" id="quantity" name="quantity" value="{{ $products->quantity }}">

                <label class="form-label mt-3" for="price">Цена товара</label>
                <input class="form-control" type="text" id="price" name="price" value="{{ $products->price }}">

                <label class="form-label mt-3" for="image">Изменить фото</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">

                <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                <p>{{ session('messageEditProduct') }}</p>
            </div>
        </div>
    </form>
@endsection
