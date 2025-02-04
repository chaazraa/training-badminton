<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Training - Badminton</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/training/'.$training->image) }}" class="rounded" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>Training Date: {{ $training->date }}</h3>
                        <hr/>
                        <p><strong>Time:</strong> {{ $training->time }}</p>
                        <p><strong>Instructor:</strong> {{ $training->instructor }}</p>
                        <p><strong>Duration:</strong> {{ $training->duration }} minutes</p>
                        <p><strong>Participants:</strong> {{ $training->participant }}</p>
                        <hr/>
                        <h2>Comments</h2>
                        @foreach($training->comments as $comment)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p>{{ $comment->content }}</p>
                                    <small class="text-muted">by {{ $comment->user->name }}</small>
                                </div>
                            </div>
                        @endforeach

                        <h2>Add a Comment</h2>
                        <form action="{{ route('comments.store', $training) }}" method="POST">
                            @csrf
                            <input type="hidden" name="training_id" value="{{ $training->id }}">
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
