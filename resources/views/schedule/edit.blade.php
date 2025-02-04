@extends('layouts.app')

@section('content')
<h2>Edit Jadwal</h2>
<form action="{{ route('schedules.update', $schedule) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="day">Hari:</label>
    <input type="text" name="day" value="{{ $schedule->day }}" required>
    
    <label for="time">Waktu:</label>
    <input type="text" name="time" value="{{ $schedule->time }}" required>
    
    <label for="activity">Kegiatan:</label>