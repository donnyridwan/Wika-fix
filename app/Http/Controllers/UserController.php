<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class UserController extends Controller
{
    public function create()
    {
        return view('user.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'perusahaan' => 'required',
        ]);

        // Hash the password using bcrypt
        $hashedPassword = Hash::make($request->password);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO users(nama, email , password, role, perusahaan, created_at) VALUES(:nama, :email, :password, :role, :perusahaan, :created_at)',
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $hashedPassword, // Use the hashed password
                'role' => $request->role,
                'perusahaan' => $request->perusahaan,
                'created_at' => now(),
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
            'password' => 'required',
            'role' => 'required',
            'perusahaan' => 'required',
        ]);

        // Hash the password using bcrypt
        $hashedPassword = Hash::make($request->password);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE users SET nama = :nama, email = :email, password = :password, role = :role, perusahaan = :perusahaan, updated_at = :updated_at WHERE id_user = :id',
            [
                'id' => $id,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $hashedPassword, // Use the hashed password
                'role' => $request->role,
                'perusahaan' => $request->perusahaan,
                'updated_at' => now(),
            ]
        );

        return redirect()->route('user.index')->with('success', 'Data peminjam berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM users WHERE id_user =:id_user', ['id_user' => $id]);
        return redirect()->route('user.index')->with('success', 'Data peminjam berhasil dihapus');
    }
}
