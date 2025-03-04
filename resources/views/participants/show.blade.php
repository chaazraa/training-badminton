@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Participant Details</h2>
    <a href="{{ route('participants.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('participants.edit', $participant->id) }}" class="btn btn-warning">Edit</a>

    <div class="card mt-3">
        <div class="card-body">
            <div class="mb-3">
                <strong>Profile Image:</strong><br>
                @if($participant->image)
                    <img src="{{ asset('storage/' . $participant->image) }}" width="150">
                @else
                    No Image
                @endif
            </div>

            <p><strong>Name:</strong> {{ $participant->name }}</p>
            <p><strong>Phone:</strong> {{ $participant->phone }}</p>
            <p><strong>Email:</strong> {{ $participant->email }}</p>
            <p><strong>Gender:</strong> {{ ucfirst($participant->gender) }}</p>
            <p><strong>Address:</strong> {{ $participant->address }}</p>

            <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
