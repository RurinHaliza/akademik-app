<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Golongan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('golongan')->get();

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $golongan = Golongan::all();

        return view('mahasiswa.create', compact('golongan'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->nim),
            'role' => 'mahasiswa'
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'semester' => $request->semester,
            'id_gol' => $request->id_gol,
            'user_id' => $user->id
        ]);

        return redirect('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $golongan = Golongan::all();

        return view('mahasiswa.edit', compact('mahasiswa', 'golongan'));
    }

    public function update(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);

        $mahasiswa->update($request->all());

        return redirect('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil diupdate');
    }

    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);

        $mahasiswa->delete();

        return redirect('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil dihapus');
    }

    
}