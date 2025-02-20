@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Participant</h2>
    <form action="{{ route('participants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <input type="text" name="name" required placeholder="Name">
        <input type="text" name="phone" required placeholder="Phone">
        <input type="email" name="email" required placeholder="Email">
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <textarea name="address" required placeholder="Address"></textarea>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection
