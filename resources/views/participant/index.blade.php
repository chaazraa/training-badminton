@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Participants List</h2>
    <a href="{{ route('participants.create') }}" class="btn btn-primary mb-3">Add New Participant</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($participants as $participant)
            <tr>
                <td>{{ $participant->id }}</td>
                <td>{{ $participant->name }}</td>
                <td>{{ $participant->phone }}</td>
                <td>{{ $participant->email }}</td>
                <td>
                    <a href="{{ route('participants.show', $participant->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('participants.edit', $participant->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
