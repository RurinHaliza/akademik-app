@extends('adminlte::page')

@section('title', 'Data Golongan')

@section('content_header')
    <h1>Data Golongan</h1>
@stop

@section('plugins.Datatables', true)

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/golongan/create" class="btn btn-primary mb-3">
    Tambah Golongan
</a>

<div class="card">
    <div class="card-body">

        <table id="tableGolongan" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Golongan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($golongan as $gol)

                <tr>

                    <td>{{ $gol->id }}</td>
                    <td>{{ $gol->nama_gol }}</td>

                    <td>

                        <a href="/golongan/{{ $gol->id }}/edit"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/golongan/{{ $gol->id }}"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>
</div>

@stop

@section('js')
<script>
$(function () {
    $('#tableGolongan').DataTable({
        responsive: true,
        autoWidth: false,
    });
});
</script>

@stop