@extends('adminlte::page')

@section('title', 'Dashboard Mahasiswa')

@section('content_header')
    <h1>Dashboard Mahasiswa</h1>
@stop

@section('content')

<div class="row">

    <div class="col-md-4">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $jumlahKrs }}</h3>
                <p>Mata Kuliah Diambil</p>
            </div>
            <div class="icon">
                <i class="fas fa-book-open"></i>
            </div>
        </div>
    </div>

</div>

<div class="card">

    <div class="card-header">
        Profil Mahasiswa
    </div>

    <div class="card-body">

        <p><b>NIM :</b> {{ $mahasiswa->nim }}</p>
        <p><b>Nama :</b> {{ $mahasiswa->nama }}</p>
        <p><b>Semester :</b> {{ $mahasiswa->semester }}</p>
        <p><b>Alamat :</b> {{ $mahasiswa->alamat }}</p>

    </div>

</div>

@stop