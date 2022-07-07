@extends('layout.main')

@php
$title = 'Detail Informasi Kandang';

$panen = DB::select('select * from panen where id_kandang = ?', [$detail->id], 'order by DESC');

$date = date('Y-m-d');
// dd($date);
@endphp

@section('content')
    <br>
    <br>
    {{-- Kandang --}}
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h3>Kandang {{ $detail->alamat_kandang }}</h3>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <label>
                        <h5><b>Suhu</b></h5>

                    </label>
                    <input type="text" class="form-control" placeholder="Suhu" readonly
                        value="{{ $detail->iotModel->suhu }}&deg C">
                </div>
                <div class="col">
                    <label>
                        <h5><b>Kelembapan</b></h5>
                    </label>
                    <input type="text" class="form-control" placeholder="Kelembapan" readonly
                        value="{{ $detail->iotModel->kelembapan }} %">
                </div>
                <div class="col">
                    <label>
                        <h5><b>Kadar Amonia </b></h5>
                    </label>
                    <input type="text" class="form-control" placeholder="Kadar Amonia" readonly
                        value="{{ $detail->iotModel->amonia }} ppm">
                </div>
            </div>

            <div id="data1">
                <fieldset class="form-group row mt-3">
                    <legend class="col-form-label col-sm-2 float-sm-left pt-0">Cooler</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input type="checkbox" {{ $detail->iotModel->relay1 === '1' ? 'checked' : '' }}
                                class="form-check-input " data-toggle="toggle" name="relay1" data-onstyle="success"
                                data-size="xs" data-id="{{ $detail->iotModel->id }}">
                        </div>

                    </div>
                </fieldset>
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-left pt-0">Heating</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input type="checkbox" {{ $detail->iotModel->relay1 === '1' ? 'checked' : '' }}
                                class="form-check-input " data-toggle="toggle" name="relay2" data-onstyle="success"
                                data-size="xs" data-id="{{ $detail->iotModel->id }}">
                        </div>

                    </div>
                </fieldset>
            </div>



        </div>
    </div>

    <br><br>

    @php

    $date = $detail->tanggal_ayam_masuk;
    $hitung_umur = date_diff(date_create($date), date_create($detail->create_at));
    $umur = $hitung_umur->format('%a');
    // print_r($umur);
    // die();
    @endphp

    {{-- Informasi Kandang --}}
    <div class="table-responsive">
        <div class="card">
            <div class="card-header">
                <h4 class="my-4">Detail Informasi Kandang {{ $detail->alamat_kandang }}

                    {{-- <a href="/tambah-data-informasi-budidaya/{{ $detail->id }}"
                        class="btn btn-outline-success btn-sm mx-sm-2 float-right ">Tambah
                        <i class="fas fa-plus"></i>
                    </a> --}}


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success btn-sm mx-sm-2 float-right" data-toggle="modal"
                        data-target="#staticBackdrop">
                        Tambah
                        <i class="fas fa-plus"></i>
                    </button>


                </h4>
                {{-- {{ $detail->rekapHarianModel->ayam_mati }} --}}

            </div>
            <div class="card-body">
                <p class="font-weight-light">Data Informasi</p>
                <table id="dataInformasi" class="table table-hover table-responsive-md table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>tanggal</th>
                            <th>Ayam Mati </th>
                            {{-- <th>Umur</th> --}}
                            <th>Jumlah Pakan / Kg</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>

                        @php
                            // $rekap = DB::select('select * from rekap_harian where id_kandang = ?', [$detail->id])->get();
                            $rekap = DB::table('rekap_harian')
                                ->where('id_kandang', '=', $detail->id)
                                ->where('deleted_at', '=', null)
                                ->get();
                            // $rekap1 = DB::table('rekap_harian')
                            //     ->where('id_kandang', '=', [$detail->id])
                            //     ->where('status', '=', '0')
                            //     ->get();
                            // dd($rekap1);
                        @endphp

                        @foreach ($rekap as $r)
                            {{-- @php
                                if ($r->status != '1') {
                                    if ($tanggal_panen > $date) {
                                        DB::table('rekap_harian')
                                            ->where('id', $r->id)
                                            ->update([
                                                'status' => '1',
                                            ]);
                                    }
                                }
                            @endphp --}}

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->tanggal }}</td>
                                {{-- <td>{{ $r->id_pakan }}</td> --}}
                                <td>{{ $r->ayam_mati }} Ekor</td>
                                {{-- <td>{{ $umur }} hari</td> --}}
                                <td>{{ $r->pakan_keluar }} kg</td>
                                <td>
                                    <a href="/detail-informasi-harian/{{ $r->id }}">
                                        <span class="badge badge-pill badge-warning  ">Edit</span>
                                    </a>



                                    <form action="/informasi-budidaya/delete/{{ $r->id }}" method="post"
                                        class="d-inline" onsubmit="return confirm('Yakin hapus data ?')">
                                        @method('delete')
                                        @csrf

                                        <input type="hidden" name="idKandang" value="{{ $r->id_kandang }}">
                                        <button type="submit" class="btn badge badge-pill badge-danger ">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="text-center">


                    @php
                        
                        $pakan = DB::select('select sum(pakan_keluar)  from rekap_harian where id_kandang = ?', [$detail->id]);
                        
                    @endphp
                    <p class="">| Umur Ayam : <b>{{ $umur }} Hari</b> | Total Ayam :
                        <b>{{ $detail->populasi_ayam }} Ekor</b> |

                    </p>
                    <p class=""></p>




                    <button type="button" class="btn btn-outline-info btn-sm mx-sm-2 " data-toggle="modal"
                        data-target="#panen">
                        Panen
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

            </div>
        </div>


    </div>

    <br>
    <hr>
    <br>
    {{-- Data History Panen --}}
    <div class="table-responsive">
        <div class="card">
            <div class="card-header">
                <h4 class="my-4">Data History Panen

                </h4>


            </div>
            <div class="card-body">
                <p class="font-weight-light">Data History Panen</p>
                <table id="historyPanen" class="table table-hover table-responsive-md table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>tanggal Panen</th>
                            <th>Populasi Akhir</th>
                            <th>Umur</th>
                            <th>Bobot Ayam</th>
                            <th>Harga Panen</th>
                            <th>Total Harga Panen</th>
                            <th>Detail</th>

                        </tr>
                    </thead>
                    <tbody>



                        @foreach ($panen as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->tanggal }}</td>
                                <td>{{ $r->populasi_akhir }} ekor</td>
                                <td>{{ $r->umur_panen }} hari</td>
                                <td>{{ $r->bobot_panen }} Kg</td>
                                <td>Rp. {{ $r->harga_panen }}</td>
                                <td>RP. {{ $r->harga_panen }}</td>
                                <td>
                                    <a href="/edit-data-panen/{{ $r->id }}">
                                        <span class="badge badge-pill badge-warning  ">Edit</span>
                                    </a>



                                    <form action="/panen/delete/{{ $r->id }}" method="post" class="d-inline"
                                        onsubmit="return confirm('Yakin hapus data ?')">
                                        @method('delete')
                                        @csrf

                                        <input type="hidden" name="idKandang" value="{{ $r->id_kandang }}">
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
    <br><br>
@endsection
@php
$tanggal_sekarang = date('Y-m-d');
@endphp
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Informasi Budidaya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/upload-detail-informasi" method="POST">
                @csrf


                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" value="{{ $tanggal_sekarang }}" id="tanggal"
                            name="tanggal">
                        <input type="hidden" class="form-control" id="idKandang" name="idKandang"
                            value="{{ $detail->id }}">

                        @php
                            $rekap = DB::select('select * from rekap_harian where id_kandang = ?', [$detail->id]);
                            $pakan = DB::select('select * from master_pakan ');
                        @endphp

                        <label for="idPakan" class="mt-2">Jenis Pakan</label>
                        <select id="idPakan" name="idPakan" class="form-control">
                            <option value="">Pilih Pakan</option>
                            @foreach ($pakan as $p)
                                <option value="{{ $p->id }}">{{ $p->jenis_pakan }}</option>
                            @endforeach
                        </select>

                    </div>


                    <div class="form-group">
                        <label for="ayamMati">Ayam Mati</label>
                        <input type="number" class="form-control" id="ayamMati" name="ayamMati"
                            placeholder="....">
                    </div>

                    <div class="form-group">
                        <label for="pakanKeluar">Pakan Keluar</label>
                        <input type="number" class="form-control" id="pakanKeluar" name="pakanKeluar"
                            placeholder="....">
                    </div>
                    <input type="hidden" class="form-control" name="status" value="0">

                    <div class="modal-footer">

                        {{-- <a href="/detail/{{ $detail->id }}" class="btn btn-secondary">Back</a> --}}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="panen" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Informasi Panen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="/upload/panen" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tanggalpanen">Tanggal Panen</label>
                        <input type="date" class="form-control" id="tanggalpanen" name="tanggalpanen"
                            value="{{ $tanggal_sekarang }}">
                        <input type="hidden" class="form-control" id="idKandang" name="idKandang"
                            value="{{ $detail->id }}">
                    </div>
                    <div class="form-group">


                    </div>

                    <div class="form-group">
                        <label for="populasiakhir">Populasi Akhir</label>
                        <input type="number" class="form-control" id="populasiakhir" name="populasiakhir"
                            placeholder="...." value="{{ $detail->populasi_ayam }}">
                    </div>
                    <div class="form-group">
                        <label for="umurpanen">Umur Panen</label>
                        <input type="number" class="form-control" id="umurpanen" name="umurpanen"
                            placeholder="...." value="{{ $umur }}">
                    </div>
                    <div class="form-group">
                        <label for="bobotPanen">Bobot Panen</label>
                        <input type="number" class="form-control" id="bobotPanen" name="bobotPanen"
                            placeholder="....">
                    </div>
                    <div class="form-group">
                        <label for="hargapanen">Harga Panen</label>
                        <input type="number" class="form-control" id="hargapanen" name="hargapanen"
                            placeholder="....">
                    </div>

                    <div class="modal-footer">

                        {{-- <a href="/detail/{{ $detail->id }}" class="btn btn-secondary">Back</a> --}}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
            $('#dataInformasi').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#historyPanen').DataTable();
        });
    </script>
    @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif

    <script>
        $('#data1').hide();
    </script>
@endsection
