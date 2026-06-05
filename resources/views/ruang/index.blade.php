@extends('adminlte::page')

@section('title', 'Data Ruangan')

@section('content_header')
    <h1>Data Ruangan</h1>
@stop

@section('plugins.Datatables', true)

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/ruang/create" class="btn btn-primary mb-3">
    Tambah Ruangan
</a>

<div class="card">
    <div class="card-body">

        <table id="tableRuang" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Ruangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($ruang as $r)

                <tr>

                    <td>{{ $r->id }}</td>
                    <td>{{ $r->nama_ruang }}</td>

                    <td>

                        <a href="/ruang/{{ $r->id }}/edit"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/ruang/{{ $r->id }}"
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
    $('#tableRuang').DataTable({
        responsive: true,
        autoWidth: false,
    });
});
</script>

@stop