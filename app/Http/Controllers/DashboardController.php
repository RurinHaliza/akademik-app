<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\JadwalAkademik;
use App\Models\Krs;
use App\Models\PresensiAkademik;
use App\Models\Golongan;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'admin')
        {
            $golonganChart = Golongan::withCount('mahasiswa')->get();
            $mahasiswaTerbaru = Mahasiswa::latest()->take(3)->get();
            $dosenTerbaru = Dosen::latest()->take(2)->get();
            
            return view('dashboard.admin', [
                'totalMahasiswa' => Mahasiswa::count(),
                'totalDosen' => Dosen::count(),
                'totalMatakuliah' => Matakuliah::count(),
                'totalJadwal' => JadwalAkademik::count(),
                'totalKrs' => Krs::count(),
                'totalPresensi' => PresensiAkademik::count(),
                'golonganChart' => $golonganChart,
                'mahasiswaTerbaru' => $mahasiswaTerbaru,
                'dosenTerbaru' => $dosenTerbaru,
            ]);
        }

        if(auth()->user()->role == 'dosen')
        {
            $dosen = auth()->user()->dosen;

            $pengampus = $dosen->pengampu()
                ->with('matakuliah')
                ->get();

            return view('dashboard.dosen', [
                'dosen' => $dosen,
                'pengampus' => $pengampus,
                'jumlahPengampu' => $pengampus->count(),
                'jumlahPresensi' => \App\Models\PresensiAkademik::count()
            ]);
        }

        $mahasiswa = auth()->user()->mahasiswa;

        return view('dashboard.mahasiswa', [
            'mahasiswa' => $mahasiswa,
            'jumlahKrs' => $mahasiswa->krs()->count(),
        ]);
    }
}