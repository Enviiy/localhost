@extends('layouts.app')

@section('content')
@if(Auth::user())
<div class="container py-4">
    <!-- Основная информация -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        Основная информация
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"></span>
                                <input type="email" class="form-control border-start-0 bg-light" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted">Имя</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"></span>
                                <input type="text" class="form-control border-start-0 bg-light" value="{{ $user->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted">Фамилия</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"></span>
                                <input type="text" class="form-control border-start-0 bg-light" value="{{ $user->surname }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted">Телефон</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"></span>
                                <input type="text" class="form-control border-start-0 bg-light" value="{{ $user->phone }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Таблица бронирований -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-transparent border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">
                        Мои бронирования
                    </h5>
                    <span class="badge bg-primary rounded-pill p-2">{{ $bookings->count() }} броней</span>
                </div>
                <div class="card-body p-0">
                    @if($bookings->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-4">ID</th>
                                        <th>Дата</th>
                                        <th>Время</th>
                                        <th>Столик</th>
                                        <th>Гостей</th>
                                        <th>Статус</th>
                                        <th class="pe-4">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                    <tr>
                                        <td class="ps-4">
                                            <span class="fw-semibold">#{{ $booking->id }}</span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d.m.Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->slot_time)->format('H:i') }}</td>
                                        <td>Столик №{{ $booking->table_number }}</td>
                                        <td>{{ $booking->guests }} {{ $booking->guests == 1 ? 'гость' : ($booking->guests <= 4 ? 'гостя' : 'гостей') }}</td>
                                        <td>
                                            <span class="bg-opacity-10 px-3 py-2 rounded-pill">
                                                {{ $booking->status_name}}
                                            </span>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('DeleteBooking', $booking->id) }}" style="display: inline-block;">
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
                        </div>
                    @else
                        <div class="text-center py-5">
                            <h5 class="text-muted mt-3">У вас пока нет бронирований</h5>
                            <p class="text-muted small">Забронируйте столик в ресторане YUKI!</p>
                            <a href="{{ route('index') }}" class="btn btn-primary rounded-pill px-4 mt-2">
                                Забронировать столик
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endif
@endsection
