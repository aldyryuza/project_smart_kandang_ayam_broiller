@extends('layout.main')
@php
$title = 'Informasi-Pakan';
@endphp

@section('content')
    <br>
    <br>
    <div class="table-responsive">
        <div class="card">
            <div class="card-header">
                <h4 class="my-4">Informasi Pakan

                    {{-- <a href="{{ url('/tambah-pakan') }}" class="btn btn-outline-success btn-sm mx-sm-2 float-right ">Tambah
                        <i class="fas fa-plus"></i>
                    </a> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success btn-sm mx-sm-2 float-right" data-toggle="modal"
                        data-target="#staticBackdrop">
                        Tambah
                        <i class="fas fa-plus"></i>
                    </button>
                </h4>


            </div>
            <div class="card-body">
                <p class="font-weight-light">Data seluruh Pakan</p>
                <table id="pakan" class="table table-hover table-responsive-md table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Jenis Pakan</th>
                            <th>Total Pakan</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($master_pakan as $r)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $r->jenis_pakan }}</td>
                                <td>{{ $r->total_pakan }} Kg</td>
                                <td>
                                    <a href="/pakan/edit/{{ $r->id }}" class="btn badge badge-pill badge-warning">
                                        Edit </a>
                                    <form action="/pakan/delete/{{ $r->id }}" method="post" class="d-inline"
                                        onsubmit="return confirm('Yakin hapus data ?')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn badge badge-pill badge-danger ">Hapus</button>
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
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Informasi Pakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="/upload-pakan" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="jenispakan">Jenis Pakan</label>
                        <input type="text" class="form-control" id="jenispakan" name="jenispakan" placeholder="....">
                    </div>

                    <div class="form-group">
                        <label for="totalpakan">Total Pakan</label>
                        <input type="number" class="form-control" id="totalpakan" name="totalpakan"
                            placeholder="....">
                    </div>

                    <div class="modal-footer">

                        {{-- <a href="{{ url('informasi-pakan') }}" class="btn btn-secondary">Back</a> --}}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>




        </div>
    </div>
</div>


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
