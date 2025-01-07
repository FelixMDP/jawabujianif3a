<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class bukuController extends Controller
{
    public function index()
    {
        $data = DB::select("select * from buku");
        return view("buku.view", ["buku" => $data]);
    }

    public function add()
    {
        return view('buku.add');
    }

    public function submitBuku(Request $request)
    {
        DB::table('buku')->insert([
            'judul_buku' => $request->input('judul_buku'),

            'penerbit' => $request->input('penerbit'),
            'pengarang' => $request->input('pengarang'),
            'jumlah' => $request->input('jumlah'),
        ]);
        return redirect()->route('bukuview')->with('message', 'Data Buku Berhasil Ditambah');
    }

    public function edit($idbuku)
    {
        $buku = Buku::where('idbuku', $idbuku)->first();
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $idbuku)
    {   

        DB::table('buku')
            ->where('idbuku', $idbuku) 
            ->update([
                'judul_buku' => $request->input('judul_buku'),
                'penerbit' => $request->input('penerbit'),
                'pengarang' => $request->input('pengarang'),
                'jumlah' => $request->input('jumlah'),
            ]);


        return redirect()->route('bukuview')->with('message', 'Berhasil di Edit');
    }

    public function delete($idbuku){
        DB::delete("Delete from buku where buku.idbuku = '$idbuku'");
        
        return redirect()->route('bukuview')->with('message','Data Barang Berhasil Dihapus!');
    }
}
