<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Data Buku</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src='main.js'></script>
</head>
<body>
    <h1 class="text-center">Data Buku</h1>   
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar navbar-dark bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
             <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav">
                  <a class="nav-link" href="/">Peminjaman</a>
                    <a class="nav-link" href="/bukuview">Buku</a>
                    <a class="nav-link" href="/anggotaview">Anggota</a>
                    <a class="nav-link" href="/detailview">Detail</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="mt-3 container">
        @yield('konten')
    </div>

</body>
</html>