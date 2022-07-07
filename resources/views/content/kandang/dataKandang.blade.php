@extends('layout.main')
@php
$title = 'Data Kandang';

@endphp

@section('content')
    <br>
    <br>
    <div class="table-responsive">
        <div class="card">
            <div class="card-header">
                <h4 class="my-4">Data Kandang Keseluruhan


                    {{-- <button type="button" class="btn btn-outline-success btn-sm mx-sm-2 float-right" data-toggle="modal"
                        data-target="#staticBackdrop">
                        Tambah
                        <i class="fas fa-plus"></i>
                    </button> --}}
                </h4>


            </div>
            <div class="card-body">
                <p class="font-weight-light">Data seluruh kandang</p>
                <table id="pakan" class="table table-hover table-responsive-md table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Nama Kandang</th>
                            <th>MAC</th>
                            <th>Populasi akhir</th>
                            <th>Status Kandang</th>
                            <th>Opsi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($dataKandang as $r)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $r->alamat_kandang }}</td>
                                <td>Perangkat {{ $r->mac }} </td>
                                <td>{{ $r->populasi_ayam }} Ekor</td>
                                <td
                                    class="btn badge {{ $r->status == '1' ? 'badge-pill badge-danger' : 'badge-pill badge-success' }} ">
                                    {{ $r->status == '1' ? 'Tidak Aktif' : 'Aktif' }} </td>
                                <td>
                                    <a href="/kandang/edit/{{ $r->id }}" class="btn badge badge-pill badge-warning">
                                        Edit </a>
                                    <form action="/kandang/delete/{{ $r->id }}" method="post" class="d-inline"
                                        onsubmit="return confirm('Yakin hapus data ?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn badge badge-pill badge-danger"> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>



    </div>
    {{-- Script JS --}}
@endsection



@section('scripts')
    <script>
        $(document).ready(function() {
            $('#pakan').DataTable();
        });
    </script>

    @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif
@endsection
