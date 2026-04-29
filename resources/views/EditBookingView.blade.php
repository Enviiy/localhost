@extends('layouts.app')

@section('content')
<h4>Редактирование бронирования</h4>

<form method="POST" action="{{ route('EditBooking', ['id' => $booking->id]) }}" enctype="multipart/form-data" class="mt-5">
    @csrf
    <div class="card" style="width: 18rem;">
        <div class="card-body">

            <label for="name" class="form-label fw-semibold">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $booking->name) }}" required><br>


            <label for="surname" class="form-label fw-semibold">Фамилия</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname', $booking->surname) }}"><br>


            <label for="phone" class="form-label fw-semibold">Телефон</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', $booking->phone) }}" required><br>


            <label for="guests" class="form-label fw-semibold">Количество гостей</label>
            <select class="form-select" id="guests" name="guests" required>
                @for($i = 1; $i <= 8; $i++)
                    <option value="{{ $i }}" {{ old('guests', $booking->guests)}}>
                        {{ $i }}
                    </option>
                @endfor
            </select><br>


            <label for="table_id" class="form-label fw-semibold">Номер столика</label>
            <select class="form-select" id="table_id" name="table_id" required>
                <option value="">Выберите столик</option>
                @foreach ($tables as $table)
                    <option value="{{ $table->id }}" {{ old('table_id', $booking->table_id)}}>
                        Столик {{ $table->table_number }} ({{ $table->capacity }} мест)
                    </option>
                @endforeach
            </select><br>


            <label for="booking_date" class="form-label fw-semibold">Дата брони</label>
            <input type="date" class="form-control" id="booking_date" name="booking_date" value="{{ old('booking_date', $booking->booking_date) }}" required><br>


            <label for="time_slot_id" class="form-label fw-semibold">Время брони</label>
            <select class="form-select" id="time_slot_id" name="time_slot_id" required>
                @foreach ($time_slots as $time_slot)
                    <option value="{{ $time_slot->id }}" {{ old('time_slot_id', $booking->time_slot_id) }}>
                        {{ \Carbon\Carbon::parse($time_slot->slot_time)->format('H:i') }}
                    </option>
                @endforeach
            </select><br>

            <label for="id_status" class="form-label fw-semibold">Статус</label>
            <select class="form-select" id="id_status" name="id_status" required>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{ old('id_status', $booking->id_status)}}>
                        {{ $status->name }}
                    </option>
                @endforeach
            </select><br>

            <button type="submit" class="btn btn-outline-primary">Изменить</button>
            <p>{{ session('messageEditUser') }}</p>
        </div>
    </div>
</form>
@endsection
