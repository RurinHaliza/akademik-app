<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengampu;
use App\Models\Dosen;
use App\Models\Matakuliah;

class PengampuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role == 'admin')
        {
            $pengampus = Pengampu::with([
                'dosen',
                'matakuliah'
            ])->get();
        }
        else
        {
            $nip = auth()->user()->dosen->nip;

            $pengampus = Pengampu::with([
                'dosen',
                'matakuliah'
            ])
            ->where('nip',$nip)
            ->get();
        }

        return view('pengampu.index', compact('pengampus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosens = Dosen::all();
        $matakuliahs = Matakuliah::all();

        return view('pengampu.create', compact(
            'dosens',
            'matakuliahs'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'kode_mk' => 'required'
        ]);

        Pengampu::create([
            'nip' => $request->nip,
            'kode_mk' => $request->kode_mk
        ]);

        return redirect()
            ->route('pengampu.index')
            ->with('success','Data pengampu berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengampu = Pengampu::findOrFail($id);

        $dosens = Dosen::all();

        $matakuliahs = Matakuliah::all();

        return view('pengampu.edit', compact(
            'pengampu',
            'dosens',
            'matakuliahs'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nip' => 'required',
            'kode_mk' => 'required'
        ]);

        $pengampu = Pengampu::findOrFail($id);

        $pengampu->update([
            'nip' => $request->nip,
            'kode_mk' => $request->kode_mk
        ]);

        return redirect()
            ->route('pengampu.index')
            ->with('success','Data pengampu berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengampu::findOrFail($id)->delete();

        return redirect()
            ->route('pengampu.index')
            ->with('success','Data pengampu berhasil dihapus');
    }
}
