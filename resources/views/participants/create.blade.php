@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Register as Participant</h2>
    <form action="{{ route('participants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" class="form-control" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection
