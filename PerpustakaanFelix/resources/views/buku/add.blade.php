@extends('viewBuku')
@section('konten')
<h4>Penambahan Buku</h4>
    <form action="{{route('bukusubmited')}}" method="POST">
    @csrf
        <label>Judul Buku: </label>
        <input type="text" name="judul_buku" id="judul_buku" class="form-control mb-2">
        <label>Penerbit:</label>
        <input type="text" name="penerbit" id="penerbit" class="form-control mb-2">
        <label>Pengarang:</label>
        <input type="text" name="pengarang" id="pengarang" class="form-control mb-2">
        <label>Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection