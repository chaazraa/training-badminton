<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Training - Badminton</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Jadwal Pelatihan Badminton</h3>
                    <h5 class="text-center"><a href="https://badminton.com">www.badminton.com</a></h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('trainings.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PELATIHAN</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">DATE</th>
                                    <th scope="col">TIME</th>
                                    <th scope="col">PARTICIPANTS</th>
                                    <th scope="col">INSTRUCTOR</th>
                                    <th scope="col">DURATION</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($trainings as $training)
                                    <tr>
                                        <td>{{ $training->date }}</td>
                                        <td>{{ $training->time }}</td>
                                        <td>{{ $training->participant }}</td>
                                        <td>{{ $training->instructor }}</td>
                                        <td>{{ $training->duration }} minutes</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('badminton_trainings.destroy', $training->id) }}" method="POST">
                                                <a href="{{ route('badminton_trainings.show', $training->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('badminton_trainings.edit', $training->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Pelatihan belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $trainings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>
</html>
