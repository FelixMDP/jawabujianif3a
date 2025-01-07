@extends('viewanggota')
@section('konten')
@if(session()->has('message'))
        <div class="alert alert-success">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex">
        <h4>List Data Anggota</h4>
        <div class="ms-auto">
        <a class="btn btn-success" href="{{route('anggotaadd')}}">Tambah Anggota</a>
        </div>
    </div>
    <table class="table">
        <tr>
            <th>ID Anggota</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jurusan</th>
            <th>Tanggal Daftar</th>
        </tr>
        @foreach ($anggota as $no=>$data)
        <tr>
            <td>{{ $data->idanggota}}</td>
            <td>{{ $data->nama_anggota }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->jurusan }}</td>
            <td>{{ $data->tgl_dftar }}</td>
            <td><a href= "{{route('anggotaedit', $data->idanggota)}}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{route('anggotadelete', $data->idanggota)}}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Menghapus ini?')" >
                    @csrf
                    <button id="delete" class="btn btn-sm btn-danger">Delete</button>
                </form>    
        </td>
        </tr>
        @endforeach
    </table>
@endsection