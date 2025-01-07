@extends('viewBuku')
@section('konten')
@if(session()->has('message'))
        <div class="alert alert-success">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex">
        <h4>List Data Buku</h4>
        <div class="ms-auto">
        <a class="btn btn-success" href="{{route('bukuadd')}}">Tambah Buku</a>
        </div>
    </div>
    <table class="table">
        <tr>
            <th>ID Buku</th>
            <th>Judul buku</th>
            <th>Penerbit</th>

            <th>Pengarang</th>
            <th>Jumlah</th>
        </tr>
        @foreach ($buku as $no => $data)
        <tr>
            <td>{{ $data->idbuku }}</td>
            <td>{{ $data->judul_buku }}</td>
            <td>{{ $data->penerbit }}</td>
            <td>{{ $data->pengarang }}</td>
            <td>{{ $data->jumlah }}</td>
            <td><a href="{{route('bukuedit', $data->idbuku)}}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{route('bukudelete', $data->idbuku)}}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Menghapus ini?')" >
                    @csrf
                    <button id="delete" class="btn btn-sm btn-danger">Delete</button>
                </form>    
        </td>
        </tr>
        @endforeach
    </table>
@endsection