<h2>Detail Booking</h2>

<p><strong>Kode:</strong> {{ $booking->code }}</p>
<p><strong>Nama User:</strong> {{ $booking->user->name }}</p>
<p><strong>Pelatih:</strong> {{ $booking->coach->name }}</p>
<p><strong>Jadwal:</strong> {{ $booking->schedule->day }} - {{ $booking->schedule->time }}</p>

<a href="{{ route('bookings.index') }}">Kembali</a>
