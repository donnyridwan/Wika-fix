<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('user.add');
    }
    // 'nama' => 'User',
    //         'email' => 'user@example.com',
    //         'password' => 'user_password',
    //         'role' => 'user',
    //         'perusahaan' => 'User Company',
    //         'created_at' => now(),
    //         'updated_at' => now(),
    public function store(Request $request)
    {
        $request->validate([

            'nama' => 'required',
            'email' => 'required',
            'password'=> 'required',
            'role' => 'required',
            'perusahaan' => 'required',

        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO users(nama, email , password, role, perusahaan, created_at) VALUES(:nama, :email, :password, :role, :perusahaan, :created_at)',
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
                'perusahaan' => $request->perusahaan,
                'created_at' => NOW(), 
            ]
        );

        return redirect()->route('user.index')->with('success', 'Data Pelanggan berhasil disimpan');
    }

    public function index()
    {
        $datas = DB::select('select * from users');
        return view('user.index')->with('datas', $datas);
    }

    public function edit($id)
    {
        $data = DB::table('users')->where('id_user', $id)->first();
        return view('user.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password'=> 'required',
            'role' => 'required',
            'perusahaan' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        // DB::update('UPDATE user SET id_user =:id_user, judul_user = :judul_peminjam, alamat_peminjam = :alamat_peminjam WHERE id_peminjam = :id',
        DB::update(
            'UPDATE users SET nama = :nama, email = :email, password = :password, role = :role, perusahaan = :perusahaan, updated_at = :updated_at WHERE id_user = :id',
            [
                'id'=> $id, 
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
                'perusahaan' => $request->perusahaan,
                'updated_at' => NOW(), 
            ]
        );
        return redirect()->route('user.index')->with('success', 'Data peminjam berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM user WHERE id_user =:id_user', ['id_user' => $id]);
        return redirect()->route('user.index')->with('success', 'Data peminjam berhasil dihapus');
    }
}
