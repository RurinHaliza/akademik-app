<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        $krs = Krs::with([
            'mahasiswa',
            'matakuliah'
        ])->get();

        return view('krs.index', compact('krs'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $matakuliah = Matakuliah::all();

        return view('krs.create', compact(
            'mahasiswa',
            'matakuliah'
        ));
    }

    public function store(Request $request)
    {
        Krs::create($request->all());

        return redirect('/krs')
            ->with('success', 'KRS berhasil ditambahkan');
    }

    public function edit($id)
    {
        $krs = Krs::findOrFail($id);

        $mahasiswa = Mahasiswa::all();
        $matakuliah = Matakuliah::all();

        return view('krs.edit', compact(
            'krs',
            'mahasiswa',
            'matakuliah'
        ));
    }

    public function update(Request $request, $id)
    {
        $krs = Krs::findOrFail($id);

        $krs->update($request->all());

        return redirect('/krs')
            ->with('success', 'KRS berhasil diupdate');
    }

    public function destroy($id)
    {
        $krs = Krs::findOrFail($id);

        $krs->delete();

        return redirect('/krs')
            ->with('success', 'KRS berhasil dihapus');
    }
}