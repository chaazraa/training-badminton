<h2>Edit Booking</h2>

<form method="POST" action="{{ route('bookings.update', $booking->id) }}">
    @csrf
    @method('PUT')

    <label>User:</label>
    <select name="user_id">
        @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ $user->id == $booking->user_id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select><br>

    <label>Coach:</label>
    <select name="coach_id">
        @foreach ($coaches as $coach)
            <option value="{{ $coach->id }}" {{ $coach->id == $booking->coach_id ? 'selected' : '' }}>
                {{ $coach->name }}
            </option>
        @endforeach
    </select><br>

    <label>Schedule:</label>
    <select name="schedule_id">
        @foreach ($schedules as $schedule)
            <option value="{{ $schedule->id }}" {{ $schedule->id == $booking->schedule_id ? 'selected' : '' }}>
                {{ $schedule->day }} - {{ $schedule->time }}
            </option>
        @endforeach
    </select><br>

    <button type="submit">Simpan Perubahan</button>
</form>

<a href="{{ route('bookings.index') }}">Kembali</a>
