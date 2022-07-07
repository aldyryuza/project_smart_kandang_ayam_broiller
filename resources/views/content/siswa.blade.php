@extends('layout.main')
@php
$title = 'Data-siswa';
@endphp

@section('content')
    <br>
    <br>

    <div id="sukses">

    </div>
    <div class="card">
        <div class="card-header">
            <h4>Data Siswa
                <button type="button" class="btn btn-primary btn-sm float-right " data-toggle="modal"
                    data-target="#tambah-siswa">
                    Tambah siswa +
                </button>
            </h4>
            <!-- Button trigger modal -->

        </div>
        <div class="card-body">
            <!-- Tambah Modal -->
            <div class="modal fade" id="tambah-siswa" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>



                        <div class="modal-body">



                            <form id="form-siswa">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="nama-siswa"> Nama Siswa :</label>
                                    <input class="form-control" type="text" id="nama" placeholder="Agung Aldi Prasetya">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jenis_kelamin"> Jensi Kelamin :</label>
                                    <input class="form-control" type="text" id="jenis_kelamin"
                                        placeholder="Laki - Laki / Perempuan">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="no_hp"> No Hp :</label>
                                    <input class="form-control" type="text" id="hp" placeholder="085807290527">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary simpan-siswa">Simpan</button>
                                </div>
                            </form>



                        </div>

                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="Edit-siswa" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>





                        <div class="modal-body">

                            <form id="form-edit-siswa">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <div class="form-group mb-3">
                                    <label for="nama-siswa"> Nama Siswa :</label>
                                    <input class="form-control" type="text" id="nama2" placeholder="Agung Aldi Prasetya">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jenis_kelamin"> Jensi Kelamin :</label>
                                    <input class="form-control" type="text" id="jenis_kelamin2"
                                        placeholder="Laki - Laki / Perempuan">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="no_hp"> No Hp :</label>
                                    <input class="form-control" type="text" id="hp2" placeholder="085807290527">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary simpan-siswa">Simpan</button>
                                </div>
                            </form>
                        </div>



                    </div>

                </div>
            </div>
        </div>

        <table class="table table-bordered table-hover table-responsive-md" id="tabelku">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Nomor Hp</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($siswa as $r)
                    <tr id="sid{{ $r->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $r->nama }}</td>
                        <td>{{ $r->jenis_kelamin }}</td>
                        <td>{{ $r->hp }}</td>
                        <td>
                            <a href="javascript:void(0)" onclick="editSiswa({{ $r->id }})"
                                class="btn btn-info">Edit</a>
                            <a href="javascript:void(0)" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>


    {{-- Script JS --}}

@section('scripts')
    {{-- Datatable --}}
    <script>
        $(document).ready(function() {
            $('#tabelku').DataTable();
        });
    </script>

    {{-- Add Data --}}
    <script>
        $('#form-siswa').submit(function(e) {
            e.preventDefault();

            let nama = $("#nama").val();
            let jenis_kelamin = $("#jenis_kelamin").val();
            let hp = $("#hp").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: "POST",
                url: "{{ route('tambah-siswa') }}",
                data: {
                    nama: nama,
                    jenis_kelamin: jenis_kelamin,
                    hp: hp,

                },

                success: function(response) {
                    if (response) {
                        $('#tabelku tbody').prepend(
                            '<tr><td>' + response.nama +
                            '</td><td>' + response.jenis_kelamin +
                            '</td><td>' + response.hp +
                            '</td></tr>');

                        $('#form-siswa')[0].reset();
                        $('#tambah-siswa').modal('hide');

                        toastr.success(response.message);
                    }
                }
            });

        });
    </script>

    {{-- Edit Data --}}
    <script>
        function editSiswa(id) {
            $.get("/siswa/" + id,
                function(siswa) {
                    $('#id').val(siswa.id);
                    $('#nama2').val(siswa.nama);
                    $('#jenis_kelamin2').val(siswa.jenis_kelamin);
                    $('#hp2').val(siswa.hp);
                    $('#Edit-siswa').modal('toggle');
                },

            );
        }
    </script>
    <script>
        $('#form-edit-siswa').submit(function(e) {
            e.preventDefault();
            let id = $("#id").val();
            let nama = $("#nama2").val();
            let jenis_kelamin = $("#jenis_kelamin2").val();
            let hp = $("#hp2").val();

            $.ajax({
                type: "PUT",
                url: "{{ route('update-siswa') }}",
                data: {
                    nama: nama,
                    jenis_kelamin: jenis_kelamin,
                    hp: hp,
                },
                dataType: "dataType",
                success: function(response) {
                    $('#sid' + response.id + 'td:nth-child(1)').text(response.nama);
                    $('#sid' + response.id + 'td:nth-child(2)').text(response.jenis_kelamin);
                    $('#sid' + response.id + 'td:nth-child(3)').text(response.hp);
                    $('#Edit-siswa').modal('hide')

                }
            });
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            $(document).on('click', '.simpan-siswa', function(e) {
                e.preventDefault();
                var data = {
                    'nama': $('#nama_siswa').val(),
                    'jenis_kelamin': $('#jenis_kelamin').val(),
                    'hp': $('#no_hp').val()
                }
                // console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/tambah-siswa",
                    data: "data",
                    dataType: "json",
                    success: function(response) {
                        console.log(response.errors);
                        if (response.status == 400) {
                            $('#error-list').html("");
                            $('#error-list').addClass("alert alert-danger");
                            $.each(response.errors, function(key, err_values) {
                                $('#error-list').append('<li>' + err_values + '</li>')
                            });
                        } else {
                            $('#sukses').addClass('alert alert-success');
                            $('#sukses').text(response.message);
                            $('#tambah-siswa').modal('hide');
                            $('#tambah-siswa').find('input').val('');
                            // toastr.success(response.message);
                        }
                    }
                });
            });
        });
    </script> --}}
@endsection
@endsection
