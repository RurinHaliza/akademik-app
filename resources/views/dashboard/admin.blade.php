@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
    <h1>Dashboard Admin</h1>
@stop

@section('content')

<div class="row">

    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalMahasiswa }}</h3>
                <p>Mahasiswa</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-graduate"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalDosen }}</h3>
                <p>Dosen</p>
            </div>
            <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $totalMatakuliah }}</h3>
                <p>Mata Kuliah</p>
            </div>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-lg-4 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $totalJadwal }}</h3>
                <p>Jadwal Akademik</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $totalKrs }}</h3>
                <p>KRS</p>
            </div>
            <div class="icon">
                <i class="fas fa-edit"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $totalPresensi }}</h3>
                <p>Presensi</p>
            </div>
            <div class="icon">
                <i class="fas fa-check-square"></i>
            </div>
        </div>
    </div>

            <div class="card">

                <div class="card-header">
                    Grafik Mahasiswa per Golongan
                </div>

                <div class="card-body">

                    <canvas id="golonganChart"></canvas>

                </div>

            </div>

</div>

@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('golonganChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            @foreach($golonganChart as $g)
                '{{ $g->nama_gol }}',
            @endforeach
        ],
        datasets: [{
            label: 'Jumlah Mahasiswa',
            data: [
                @foreach($golonganChart as $g)
                    {{ $g->mahasiswa_count }},
                @endforeach
            ]
        }]
    }
});

</script>

@stop