@extends('layouts.app')

@section('content')
<style>
    .card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

/* Ссылка с заголовком */
.card-title {
    transition: color 0.2s ease;
}

.card:hover .card-title {
    color: #0d6efd;
}

/* Изображение */
.card img {
    transition: transform 0.3s ease;
}

.card:hover img {
    transform: scale(1.05);
}

</style>
<h1>Меню</h1>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
    @foreach ($products as $product)
        <div class="col">
            <div class="card h-100 shadow-sm border-0 d-flex flex-column">
                <div class="text-center p-3">
                    <a href="">
                        <img src="{{ asset($product->image) }}" alt="..."
                            style="max-height: 200px; max-width: 100%; object-fit: contain;">
                    </a>
                </div>
                <div class="card-body d-flex flex-column flex-grow-1">
                    <a href="" class="text-decoration-none text-dark">
                        <h5 class="card-title">{{ $product->title }}</h5>
                    </a>
                    <p class="card-text small text-muted">{{ $product->description }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="h5 fw-bold text-primary mb-0">{{ $product->price }} ₽</span>
                        <span class="h5 fw-bold text-primary mb-0">{{ $product->quantity }} шт.</span>
                    </div>

                    @auth
                        @if(Auth::user()->role_id == 2)
                            <div class="d-flex gap-2 mt-3 pt-2 border-top">
                                <a href="{{ route('EditProductView',['id'=>$product->id]) }}" class="btn btn-outline-primary btn-sm flex-grow-1">
                                    Редактировать
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

