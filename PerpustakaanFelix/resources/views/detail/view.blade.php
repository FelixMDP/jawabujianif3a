@extends('viewdetail')
@section('konten')
@if(session()->has('message'))
        <div class="alert alert-success">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex">
        <h4>List Detail Peminjaman</h4>
        <div class="ms-auto">
        <a class="btn btn-success" href="{{route('main')}}">Tambah Peminjaman</a>
        </div>
    </div>
    <table class="table">
        <tr>
            <th>Nomor Peminjaman</th>
            
            <th>ID Anggota</th>
            <th>Nama Anggota</th>
            <th>ID Buku</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
        </tr>
        @foreach ($details as $no=>$data)
        <tr>
            <td>{{ $data->nopinjam}}</td>
            <td>{{ $data->idanggota}}</td>
            <td>{{ $data->nama}}</td>
            <td>{{ $data->idbuku}}</td>
            <td>{{ $data->judul }}</td>
            <td>{{ $data->tgl_pinjam }}</td>
            <td>{{ $data->tgl_kembali }}</td>
            <td>{{ $data->denda }}</td>
            <td><a href= "{{route('detailedit', $data->nopinjam)}}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{route('detaildelete', $data->nopinjam)}}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Menghapus ini?')" >
                    @csrf
                    <button id="delete" class="btn btn-sm btn-danger">Delete</button>
                </form>    
        </td>
        </tr>
        @endforeach
    </table>
@endsection