<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class peminjamanController extends Controller
{
    public function index()
    {
        $data = DB::select("select * from buku");
        $data2 = DB::select(("select * from anggota"));
        return view("main", ["buku" => $data, "anggota" => $data2]);
    }

    public function index2()
    {
        $data = DB::table('detail_pinjam')
            ->join('anggota', 'detail_pinjam.idanggota', '=', 'anggota.idanggota')
            ->join('buku', 'detail_pinjam.idbuku', '=', 'buku.idbuku')
            ->select('detail_pinjam.*', 'anggota.nama_anggota as nama', 'buku.judul_buku as judul')
            ->get();
        return view("detail.view", ["details" => $data]);
    }

    public function store(Request $request)
    {
        DB::table('detail_pinjam')->insert([
            'idanggota' => $request->input('anggota'),
            'idbuku' => $request->input('buku'),

            'tgl_pinjam' => date(now()),
            'tgl_kembali' => $request->input('tgl_kembali'),
            'denda' => 0
        ]);

        DB::table('buku')
            ->where('idbuku', $request->input('buku'))
            ->update(['jumlah' => DB::raw('jumlah - 1')]);
        return redirect("/");
    }
    public function edit($nopinjam)
    {
        $buku = DB::select("select * from buku");
        $anggota = DB::select(("select * from anggota"));
        $detail = $data = DB::table('detail_pinjam')
            ->join('anggota', 'detail_pinjam.idanggota', '=', 'anggota.idanggota')
            ->join('buku', 'detail_pinjam.idbuku', '=', 'buku.idbuku')
            ->select('detail_pinjam.*', 'anggota.nama_anggota as nama', 'buku.judul_buku as judul')
            ->where('nopinjam', $nopinjam)
            ->first();
        return view('detail.edit', compact('detail', "buku" ,"anggota"), );
    }

    public function update(Request $request, $nopinjam)
    {   

        DB::table('detail_pinjam')
            ->where('nopinjam', $nopinjam) 
            ->update([
                'idanggota' => $request->input('anggota'),
                'idbuku' => $request->input('buku'),
                'tgl_pinjam' => $request->input('tgl_pinjam'),
                'tgl_kembali' => $request->input('tgl_kembali'),
                'denda' => $request->input('denda'),
            ]);


        return redirect()->route('detailview')->with('message', 'Berhasil di Edit');
    }


    public function delete($nopinjam)
    {
        DB::delete("Delete from detail_pinjam where detail_pinjam.nopinjam = '$nopinjam'");

        return redirect()->route('detailview')->with('message', 'Data Pinjam Berhasil Dihapus!');
    }
}
