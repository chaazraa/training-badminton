<h2 style="font-weight: bold; font-size: 24px; margin-bottom: 16px;">📋 Daftar Booking</h2>

<!-- Tombol Tambah Booking -->
<a href="{{ route('bookings.create') }}" 
   style="display: inline-block; margin-bottom: 20px; padding: 8px 16px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">
    ➕ Tambah Booking
</a>

<ul style="list-style: none; padding: 0;">
    @forelse ($bookings as $booking)
        <li style="margin-bottom: 15px; padding: 16px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
            <strong>Code:</strong> {{ $booking->code }} <br>
            <strong>User:</strong> {{ optional($booking->user)->name ?? '🕵️‍♂️ User tidak tersedia' }} <br>
            <strong>Coach:</strong> {{ optional($booking->coach)->name ?? '🎯 Pelatih belum ditentukan' }} <br>
            <strong>Schedule:</strong> {{ optional($booking->schedule)->tanggal ?? '🎯 Jadwal belum ditentukan' }} <br>

            <div style="margin-top: 12px; display: flex; gap: 10px; flex-wrap: wrap;">
                <!-- Tombol Lihat -->
                <a href="{{ route('bookings.show', $booking) }}" 
                   style="color: #2196F3; text-decoration: none; font-weight: bold;">
                   🔍 Lihat
                </a>

                <!-- Tombol Edit -->
                <a href="{{ route('bookings.edit', $booking) }}" 
                   style="color: #FF9800; text-decoration: none; font-weight: bold;">
                   ✏️ Edit
                </a>

                <!-- Form Hapus -->
                <form action="{{ route('bookings.destroy', $booking) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            onclick="return confirm('Yakin mau hapus booking ini?')"
                            style="background: none; border: none; color: #f44336; cursor: pointer; font-weight: bold; text-decoration: underline;">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </li>
    @empty
        <li>Tidak ada data booking yang tersedia.</li>
    @endforelse
</ul>
