@extends('adminlte::page')

@section('title', 'Data Dosen')

@section('content_header')
    <h1>Data Dosen</h1>
@stop

@section('plugins.Datatables', true)

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/dosen/create" class="btn btn-primary mb-3">
    Tambah Dosen
</a>

<div class="card">
    <div class="card-body">

        <table id="tableDosen" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($dosen as $dsn)

                <tr>
                    <td>{{ $dsn->nip }}</td>
                    <td>{{ $dsn->nama }}</td>
                    <td>{{ $dsn->user->email ?? '-' }}</td>
                    <td>{{ $dsn->alamat }}</td>
                    <td>{{ $dsn->nohp }}</td>

                    <td>

                        <a href="/dosen/{{ $dsn->nip }}/edit"
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        <form action="/dosen/{{ $dsn->nip }}"
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
    $('#tableDosen').DataTable({
        responsive: true,
        autoWidth: false,
    });
});
</script>

@stop