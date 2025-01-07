@extends('viewanggota')
@section('konten')
<h4>Penambahan Anggota</h4>
    <form action="{{route('anggotasubmited')}}" method="POST">
    @csrf
        <label>Nama Anggota: </label>
        <input type="text" name="nama_anggota" id="nama_anggota" class="form-control mb-2">
        <label>Alamat:</label>
        <input type="text" name="alamat" id="alamat" class="form-control mb-2">
        <label>Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection