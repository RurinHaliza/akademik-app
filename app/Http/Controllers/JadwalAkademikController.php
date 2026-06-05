<?php

namespace App\Http\Controllers;

use App\Models\JadwalAkademik;
use App\Models\Matakuliah;
use App\Models\Ruang;
use App\Models\Golongan;
use Illuminate\Http\Request;

class JadwalAkademikController extends Controller
{
    public function index()
    {
        $jadwal = JadwalAkademik::with([
            'matakuliah',
            'ruang',
            'golongan'
        ])->get();

        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $matakuliah = Matakuliah::all();
        $ruang = Ruang::all();
        $golongan = Golongan::all();

        return view('jadwal.create', compact(
            'matakuliah',
            'ruang',
            'golongan'
        ));
    }

    public function store(Request $request)
    {
        JadwalAkademik::create($request->all());

        return redirect('/jadwal')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = JadwalAkademik::findOrFail($id);

        $matakuliah = Matakuliah::all();
        $ruang = Ruang::all();
        $golongan = Golongan::all();

        return view('jadwal.edit', compact(
            'jadwal',
            'matakuliah',
            'ruang',
            'golongan'
        ));
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalAkademik::findOrFail($id);

        $jadwal->update($request->all());

        return redirect('/jadwal')
            ->with('success', 'Jadwal berhasil diupdate');
    }

    public function destroy($id)
    {
        $jadwal = JadwalAkademik::findOrFail($id);

        $jadwal->delete();

        return redirect('/jadwal')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}