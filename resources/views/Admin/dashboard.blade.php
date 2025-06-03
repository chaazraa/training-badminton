@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Dashboard Admin</h1>

    {{-- Ringkasan --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Jadwal</h5>
                    <p class="card-text fs-3">{{ $schedules->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Pelatih</h5>
                    <p class="card-text fs-3">{{ $coaches->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Total Booking</h5>
                    <p class="card-text fs-3">{{ $bookings->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Jadwal --}}
    <div class="card mb-4">
        <div class="card-header">Daftar Jadwal</div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Pelatih</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->day ?? '-' }}</td>
                            <td>{{ $schedule->time ?? '-' }}</td>
                            <td>{{ $schedule->coach->name ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3">Belum ada jadwal.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Tabel Booking --}}
    <div class="card mb-4">
        <div class="card-header">Daftar Booking</div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Peserta</th>
                        <th>Jadwal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->participant->name ?? '-' }}</td>
                            <td>{{ $booking->schedule->day ?? '-' }} - {{ $booking->schedule->time ?? '-' }}</td>
                            <td>{{ ucfirst($booking->status) ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3">Belum ada booking.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
