{{-- filepath: d:\project\training-badminton\resources\views\user\dashboard.blade.php --}}
@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800">Selamat Datang, {{ auth()->user()->name }}!</h1>
    <p class="text-gray-600 mt-2">Berikut adalah ringkasan aktivitas Anda:</p>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
        <div class="bg-orange-100 p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-orange-600">Total Sesi Latihan</h3>
            <p class="text-3xl font-bold mt-2">12</p>
        </div>
        <div class="bg-blue-100 p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-blue-600">Total Jam Latihan</h3>
            <p class="text-3xl font-bold mt-2">58 Jam</p>
        </div>
        <div class="bg-green-100 p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-green-600">Kalori Terbakar</h3>
            <p class="text-3xl font-bold mt-2">12,345 kcal</p>
        </div>
    </div>

    <!-- Jadwal Latihan -->
    <div class="mt-8">
        <h2 class="text-xl font-bold text-gray-800">Jadwal Latihan Berikutnya</h2>
        <table class="w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Waktu</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Pelatih</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Lokasi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">15 Mei 2025</td>
                    <td class="border border-gray-300 px-4 py-2">10:00 - 12:00</td>
                    <td class="border border-gray-300 px-4 py-2">Coach John Doe</td>
                    <td class="border border-gray-300 px-4 py-2">Lapangan A</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">18 Mei 2025</td>
                    <td class="border border-gray-300 px-4 py-2">14:00 - 16:00</td>
                    <td class="border border-gray-300 px-4 py-2">Coach Jane Smith</td>
                    <td class="border border-gray-300 px-4 py-2">Lapangan B</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Tombol Aksi -->
    <div class="mt-8 flex justify-end">
        <a href="{{ route('user.bookings.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">
            🏸 Book Sesi Baru
        </a>
    </div>
</div>
@endsection