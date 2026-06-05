@extends('adminlte::page')

@section('title', 'Data KRS')

@section('content_header')
    <h1>Transaksi KRS</h1>
@stop

@section('plugins.Datatables', true)

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(auth()->user()->role == 'admin')
<a href="/krs/create" class="btn btn-primary mb-3">
    Tambah KRS
</a>
@endif

<div class="card">
    <div class="card-body">

        <table id="tableKrs" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Mahasiswa</th>
                    <th>Mata Kuliah</th>
                    @if(auth()->user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>

            <tbody>

                @foreach($krs as $k)

                <tr>

                    <td>{{ $k->mahasiswa->nama }}</td>
                    <td>{{ $k->matakuliah->nama_mk }}</td>

                    @if(auth()->user()->role == 'admin')
                    <td>

                        <a href="/krs/{{ $k->id }}/edit"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/krs/{{ $k->id }}"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>

                        </form>

                    </td>
                    @endif

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
    $('#tableKrs').DataTable({
        responsive: true,
        autoWidth: false,
    });
});
</script>

@stop