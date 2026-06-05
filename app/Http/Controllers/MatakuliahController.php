<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::all();

        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        Matakuliah::create($request->all());

        return redirect('/matakuliah')
            ->with('success', 'Data mata kuliah berhasil ditambahkan');
    }

    public function edit($kode_mk)
    {
        $matakuliah = Matakuliah::findOrFail($kode_mk);

        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, $kode_mk)
    {
        $matakuliah = Matakuliah::findOrFail($kode_mk);

        $matakuliah->update($request->all());

        return redirect('/matakuliah')
            ->with('success', 'Data mata kuliah berhasil diupdate');
    }

    public function destroy($kode_mk)
    {
        $matakuliah = Matakuliah::findOrFail($kode_mk);

        $matakuliah->delete();

        return redirect('/matakuliah')
            ->with('success', 'Data mata kuliah berhasil dihapus');
    }
}