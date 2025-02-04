@extends('layouts.app')

@section('content')
<h2>Tambah Jadwal</h2>
<form action="{{ route('schedules.store') }}" method="POST">
    @csrf
    <label for="day">Hari:</label>
    <input type="text" name="day" required>
    
    <label for="time">Waktu:</label>
    <input type="text" name="time" required>
    
    <label for="activity">Kegiatan:</label>
    <input type="text" name="activity" required>
    
    <label for="location">Tempat:</label>
    <input type="text" name="location" required>
    
    <button type="submit">Simpan</button>
</form>
@endsection