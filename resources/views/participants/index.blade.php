@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Participants List</h2>
    <a href="{{ route('participants.create') }}" class="btn btn-primary mb-3">Add New Participant</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($participants as $index => $participant)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if($participant->image)
                        <img src="{{ asset('storage/' . $participant->image) }}" width="50">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $participant->name }}</td>
                <td>{{ $participant->phone }}</td>
                <td>{{ $participant->email }}</td>
                <td>{{ ucfirst($participant->gender) }}</td>
                <td>
                    <a href="{{ route('participants.show', $participant->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('participants.edit', $participant->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
