@extends('adminlte::page')

@section('title', 'Dashboard Dosen')

@section('content_header')
    <h1>Dashboard Dosen</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        Profil Dosen
    </div>

    <div class="card-body">

        <p><b>NIP :</b> {{ $dosen->nip }}</p>
        <p><b>Nama :</b> {{ $dosen->nama }}</p>
        <p><b>Alamat :</b> {{ $dosen->alamat }}</p>
        <p><b>No HP :</b> {{ $dosen->nohp }}</p>

    </div>
</div>

<div class="row">

    <div class="col-md-4">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $jumlahPengampu }}</h3>
                <p>Mata Kuliah Diampu</p>
            </div>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $jumlahPresensi }}</h3>
                <p>Total Presensi</p>
            </div>
            <div class="icon">
                <i class="fas fa-check-square"></i>
            </div>
        </div>
    </div>

</div>

<div class="card mt-4">

    <div class="card-header">

        Mata Kuliah Diampu

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                </tr>

            </thead>

            <tbody>

                @foreach($pengampus as $item)

                <tr>

                    <td>
                        {{ $item->kode_mk }}
                    </td>

                    <td>
                        {{ $item->matakuliah->nama_mk }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@stop