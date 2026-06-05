<?php

namespace App\Http\Controllers;

use App\Models\PresensiAkademik;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class PresensiAkademikController extends Controller
{
    public function index()
    {
        $presensi = PresensiAkademik::with([
            'mahasiswa',
            'matakuliah'
        ])->get();

        return view('presensi.index', compact('presensi'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $matakuliah = Matakuliah::all();

        return view('presensi.create', compact(
            'mahasiswa',
            'matakuliah'
        ));
    }

    public function store(Request $request)
    {
        PresensiAkademik::create($request->all());

        return redirect('/presensi')
            ->with('success', 'Presensi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $presensi = PresensiAkademik::findOrFail($id);

        $mahasiswa = Mahasiswa::all();
        $matakuliah = Matakuliah::all();

        return view('presensi.edit', compact(
            'presensi',
            'mahasiswa',
            'matakuliah'
        ));
    }

    public function update(Request $request, $id)
    {
        $presensi = PresensiAkademik::findOrFail($id);

        $presensi->update($request->all());

        return redirect('/presensi')
            ->with('success', 'Presensi berhasil diupdate');
    }

    public function destroy($id)
    {
        $presensi = PresensiAkademik::findOrFail($id);

        $presensi->delete();

        return redirect('/presensi')
            ->with('success', 'Presensi berhasil dihapus');
    }
}