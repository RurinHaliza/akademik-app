<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::with('user')->get();

        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:dosens,nip',
            'email' => 'required|email|unique:users,email',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required'
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->nip),
            'role' => 'dosen'
        ]);

        Dosen::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'user_id' => $user->id
        ]);

        return redirect('/dosen')
            ->with('success', 'Data dosen berhasil ditambahkan');
    }

    public function edit($nip)
    {
        $dosen = Dosen::findOrFail($nip);

        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $nip)
    {
        $dosen = Dosen::findOrFail($nip);

        $dosen->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
        ]);

        if($dosen->user)
        {
            $dosen->user->update([
                'name' => $request->nama,
                'email' => $request->email,
            ]);
        }
        else
        {
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($dosen->nip),
                'role' => 'dosen'
            ]);

            $dosen->update([
                'user_id' => $user->id
            ]);
        }

        return redirect('/dosen')
            ->with('success', 'Data dosen berhasil diupdate');
    }

    public function destroy($nip)
    {
        $dosen = Dosen::findOrFail($nip);

        if($dosen->user)
        {
            $dosen->user->delete();
        }

        $dosen->delete();

        return redirect('/dosen')
            ->with('success','Data dosen berhasil dihapus');
    }
}