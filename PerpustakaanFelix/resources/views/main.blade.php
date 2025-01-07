<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perpustakaan Felix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .card {
            margin-top: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 600;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-top: 20px;
        }

        footer {
            margin-top: 50px;
            text-align: center;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Perpustakaan Felix</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/">Peminjaman</a></li>
                        <li class="nav-item"><a class="nav-link" href="/bukuview">Buku</a></li>
                        <li class="nav-item"><a class="nav-link" href="/anggotaview">Anggota</a></li>
                        <li class="nav-item"><a class="nav-link" href="/detailview">Detail</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container">
        <h1 class="text-center mt-5">Transaksi Peminjaman Buku</h1>

        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{Route('confirm')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="buku" class="form-label">Buku yang Dipinjam:</label>
                        <select class="form-select" name="buku" id="buku">
                            @forelse ($buku as $buku)
                            <option value="{{ $buku->idbuku }}">{{ $buku->judul_buku }}</option>
                            @empty
                            <option value="">Tidak ada buku tersedia</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="anggota" class="form-label">Anggota yang Meminjam:</label>
                        <select class="form-select" name="anggota" id="anggota">
                            @forelse ($anggota as $anggota)
                            <option value="{{ $anggota->idanggota }}">{{ $anggota->nama_anggota }}</option>
                            @empty
                            <option value="">Tidak ada anggota tersedia</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="tgl_kembali" class="form-label">Tanggal Pengembalian:</label>
                        <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Pinjam</button>
                </form>
            </div>
        </div>

        <footer>
            <p>&copy; 2025 Perpustakaan Felix. All Rights Reserved.</p>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
