<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function create()
    {
        return view('pesanan.add');
    }

    public function index()
    {
        $pesanans = DB::select('select * from pesanan');
        return view('pesanan.index')->with('pesanans', $pesanans);
    }

    public function tolak($id,Request $request)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pesanan SET status = :status
        WHERE id_pesanan = :id', 
        [
            'id' => $id,
            'status' => 'gagal',
        ]);
        return redirect()->route('pesanan.index')->with('success', 'Pemesanan Tiket Telah ditolak !');
    }

    public function edit($id)
    {
        $pesanan = DB::table('pesanan')->where('id_pesanan', $id)->first();
        return view('pesanan.edit')->with('pesanan', $pesanan);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'kode_tiket'=> 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        // DB::update('UPDATE user SET id_user =:id_user, judul_user = :judul_peminjam, alamat_peminjam = :alamat_peminjam WHERE id_peminjam = :id',
        DB::update(
            'UPDATE pesanan SET status = :status, kode_tiket = :kode_tiket, updated_at = :updated_at WHERE id_pesanan = :id',
            [
                'id'=> $id, 
                'kode_tiket'=> $request->kode_tiket,
                'status' => 'selesai',
                'updated_at' => NOW(), 
            ]
        );
        return redirect()->route('pesanan.index')->with('success', 'Data peminjam berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pesanan WHERE id_user =:id_pesanan', ['id_pesanan' => $id]);
        return redirect()->route('pesanan.index')->with('success', 'Data peminjam berhasil dihapus');
    }
    
}
