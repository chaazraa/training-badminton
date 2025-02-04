<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Training - Badminton</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('trainings.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">DATE</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}">
                                
                                <!-- error message untuk date -->
                                @error('date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">TIME</label>
                                <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}">
                                
                                <!-- error message untuk time -->
                                @error('time')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PARTICIPANTS</label>
                                <input type="number" class="form-control @error('participant') is-invalid @enderror" name="participant" value="{{ old('participant') }}" placeholder="Number of participants">
                                
                                <!-- error message untuk participant -->
                                @error('participant')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">INSTRUCTOR</label>
                                <input type="text" class="form-control @error('instructor') is-invalid @enderror" name="instructor" value="{{ old('instructor') }}" placeholder="Instructor name">
                                
                                <!-- error message untuk instructor -->
                                @error('instructor')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">DURATION (minutes)</label>
                                <input type="number" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration') }}" placeholder="Duration in minutes">
                                
                                <!-- error message untuk duration -->
                                @error('duration')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NOTES (Optional)</label>
                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" rows="5" placeholder="Any additional notes">{{ old('notes') }}</textarea>
                                
                                <!-- error message untuk notes -->
                                @error('notes')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
