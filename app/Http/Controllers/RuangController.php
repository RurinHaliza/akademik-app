<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index()
    {
        $ruang = Ruang::all();

        return view('ruang.index', compact('ruang'));
    }

    public function create()
    {
        return view('ruang.create');
    }

    public function store(Request $request)
    {
        Ruang::create($request->all());

        return redirect('/ruang')
            ->with('success', 'Data ruang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ruang = Ruang::findOrFail($id);

        return view('ruang.edit', compact('ruang'));
    }

    public function update(Request $request, $id)
    {
        $ruang = Ruang::findOrFail($id);

        $ruang->update($request->all());

        return redirect('/ruang')
            ->with('success', 'Data ruang berhasil diupdate');
    }

    public function destroy($id)
    {
        $ruang = Ruang::findOrFail($id);

        $ruang->delete();

        return redirect('/ruang')
            ->with('success', 'Data ruang berhasil dihapus');
    }
}