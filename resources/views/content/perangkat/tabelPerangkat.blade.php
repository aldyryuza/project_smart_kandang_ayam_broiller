@extends('layout.main')
@php
$title = 'Informasi-Perangakat';
@endphp

@section('content')
    <br>
    <br>
    {{-- Tabel Perangkat IOT --}}
    <div class="table-responsive">
        <div class="card">
            <div class="card-header">
                <h4 class="my-4">Daftar Data Perangkat

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success btn-sm mx-sm-2 float-right" data-toggle="modal"
                        data-target="#staticBackdrop">
                        Tambah
                        <i class="fas fa-plus"></i>
                    </button>
                </h4>


            </div>
            <div class="card-body">
                <p class="font-weight-light">Data seluruh Perangkat</p>
                <table id="perangkat" class="table table-hover table-responsive-md table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>MAC Addres</th>
                            {{-- <th>Digunakan di Kandang</th> --}}
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                            
                        @endphp
                        @foreach ($perangkat as $r)
                            @php
                                
                            @endphp

                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $r->id }}</td>
                                {{-- <td> Kandang {{ $r->alamat_kandang }}</td> --}}
                                <td>
                                    {{-- <a href="/perangkat/edit/{{ $r->id }}"
                                        class="btn badge badge-pill badge-warning">
                                        Edit </a> --}}
                                    <form action="/hapus-perangkat/{{ $r->id }}" method="post" class=" text-center"
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

    <br>
    <hr>
    <br>

    {{-- Tabel Perangkat yang Sudah Digunakan --}}
    <div class="table-responsive">
        <div class="card">
            <div class="card-header">
                <h4 class="my-4">Informasi Perangkat Yang Sedang Digunakan


                </h4>


            </div>
            <div class="card-body">
                <p class="font-weight-light">Data seluruh Perangkat yang sudah digunakan</p>
                <table id="digunakan" class="table table-hover table-responsive-md table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>MAC Addres</th>
                            <th>Digunakan di Kandang</th>


                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                            $perangkatDigunakan = DB::table('master_kandang')
                                ->join('tabel_iot', 'master_kandang.mac', '=', 'tabel_iot.id')
                                ->get();
                        @endphp
                        @foreach ($perangkatDigunakan as $r)
                            @php
                                
                            @endphp

                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $r->mac }}</td>
                                <td> Kandang {{ $r->alamat_kandang }}</td>

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
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Perangkat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="upload-perangkat" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id">Masukan MAC Perangakat</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="....">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#perangkat').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#digunakan').DataTable();
        });
    </script>

    @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif
@endsection
