@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Participant</h2>
    <a href="{{ route('participants.index') }}" class="btn btn-secondary">Back</a>

    <form action="{{ route('participants.update', $participant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="image" class="form-label">Profile Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('storage/' . $participant->image) }}" width="100" class="mt-2">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $participant->name }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $participant->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $participant->email }}" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" class="form-control">
                <option value="male" {{ $participant->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $participant->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" class="form-control" required>{{ $participant->address }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
