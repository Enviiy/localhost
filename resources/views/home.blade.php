@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-evenly">
    <div class="col m-3">
        <form method="POST" action="{{ route('booking.store') }}" class="needs-validation" novalidate>
            @csrf
            <div class="row g-3">
                <!-- Имя -->
                <div class="col-md-6">
                    <label for="name" class="form-label fw-semibold">Имя <span class="text-danger">*</span></label>
                    <input type="text" value="@auth @if(Auth::user()){{$user->name}}@endif @endauth" class="form-control" id="name" name="name" required>
                    <div class="invalid-feedback">Пожалуйста, укажите имя</div>
                </div>

                <!-- Фамилия -->
                <div class="col-md-6">
                    <label for="surname" class="form-label fw-semibold">Фамилия</label>
                    <input type="text" value="@auth @if(Auth::user()){{$user->surname}}@endif @endauth" class="form-control" id="surname" name="surname">
                </div>

                <!-- Номер телефона -->
                <div class="col-md-6">
                    <label for="phone" class="form-label fw-semibold">Номер телефона <span class="text-danger">*</span></label>
                    <input type="tel" value="@auth @if(Auth::user()){{$user->phone}}@endif @endauth" class="form-control" id="phone" name="phone" required>
                    <div class="invalid-feedback">Введите корректный номер телефона</div>
                </div>

                <!-- Количество гостей -->
                <div class="col-md-6">
                    <label for="guests" class="form-label fw-semibold">Количество гостей <span class="text-danger">*</span></label>
                    <select class="form-select" id="guests" name="guests" required>
                        <option value="" disabled selected>Выберите количество</option>
                        <option value="1">1 гость</option>
                        <option value="2">2 гостя</option>
                        <option value="3">3 гостя</option>
                        <option value="4">4 гостя</option>
                        <option value="5">5 гостей</option>
                        <option value="6">6 гостей</option>
                        <option value="7">7 гостей</option>
                        <option value="8">8 гостей</option>
                    </select>
                    <div class="invalid-feedback">Выберите количество гостей</div>
                </div>

                <!-- Место -->
                <div class="col-md-6">
                    <label for="table_number" class="form-label fw-semibold">Номер столика <span class="text-danger">*</span></label>
                    <select class="form-select" id="table_number" name="table_number" required>
                        @foreach ($tables as $table)
                            <option value="{{ $table->id }}">Столик №{{ $table->table_number }}</option>
                        @endforeach
                    </select>
                    <div class="form-text">Всего в ресторане 53 места</div>
                    <div class="invalid-feedback">Выберите столик</div>
                </div>

                <!-- Время брони -->
                <div class="col-md-6">
                    <label for="booking_time" class="form-label fw-semibold">Время брони <span class="text-danger">*</span></label>
                    <select class="form-select" id="booking_time" name="booking_time" required>
                        @foreach ($time_slots as $time_slot)
                        <option value="{{ $time_slot->id }}">{{ $time_slot->slot_time }}</option>
                        @endforeach
                    </select>
                    <div class="form-text">Бронирование на 1 час</div>
                    <div class="invalid-feedback">Выберите время брони</div>
                </div>

                <!-- Дата -->
                <div class="col-md-12">
                    <label for="booking_date" class="form-label fw-semibold">Дата брони <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="booking_date" name="booking_date"
                        min="{{ date('Y-m-d') }}" required>
                    <div class="form-text">Бронирование доступно от сегодняшней даты</div>
                    <div class="invalid-feedback">Выберите дату брони</div>
                </div>

                <!-- Кнопка отправки -->
                <div class="col-12 mt-4 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-90 py-2 fs-5">
                        Забронировать столик
                    </button>
                </div><br>
            </div>
        </form>
        @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        @endif
    </div>
        <div class="">
            <img src="../../assets/img/image.png" alt="" style="width: 390px; height: 800px">
        </div>
</div>
@endsection
