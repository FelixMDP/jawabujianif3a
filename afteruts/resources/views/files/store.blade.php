<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Storage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h4 class="text-center my-4">Uploaded Files @ <a href="https://mdp.ac.id">Universitas MDP</a></h4>
                </div>
                <a href="{{ route('files.create') }}" class="btn btn-md btn-link mb-3">Upload New File</a>

                <div class="card rounded">
                    <div class="card-body">
                        @if ($files->isEmpty())
                            <p class="text-center">No files uploaded yet.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                         <th>File Name</th>
                                        <th>Generated Name</th>
                                        <th>Uploaded At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $index => $file)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $file->nama_file }}</td>
                                            <td>{{ $file->generated_nama }}</td>
                                            <td>{{ $file->created_at->format('Y-m-d H:i:s') }}</td>
                                            <td>
                                                <a href="{{ route('files.download', $file->id) }}">Download</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>