@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Participant Details</h2>
    <a href="{{ route('participants.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('participants.edit', $participant->id) }}" class="btn btn-warning">Edit</a>

    <div class="card mt-3">
        <div class="card-body">
            <img src="{{ asset('storage/' . $participant->image) }}" width="150" class="mb-3" alt="Participant Image">
            <h3>{{ $participant->name }}</h3>
            <p><strong>Phone:</strong> {{ $participant->phone }}</p>
            <p><strong>Email:</strong> {{ $participant->email }}</p>
            <p><strong>Gender:</strong> {{ ucfirst($participant->gender) }}</p>
            <p><strong>Address:</strong> {{ $participant->address }}</p>
        </div>
    </div>
</div>
@endsection
