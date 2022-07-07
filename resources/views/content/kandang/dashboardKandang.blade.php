@extends('layout.main')

@php
$title = 'Dashboard Kandang';

// dd($masterKandang);

@endphp

@section('content')
    <br>
    <br>
    <center>
        <div class="card" style="width: 12rem;">
            <div class="card-body text-lg-center">
                <a href="{{ url('tambah-kandang') }}">
                    <h1 class="font-weight-bold">+</h1>
                </a>

            </div>
        </div>

    </center>
    <hr>
    <br>
    <br>

    <div class="row row-cols-1 row-cols-md-2">

        @foreach ($masterKandang as $r)
            <div class="col mb-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h4>Kandang {{ $r->alamat_kandang }}</h4>
                        <div class="float-right">
                            <a href="/kandang/edit/{{ $r->id }}" class="btn btn-outline-warning btn-sm"> Edit
                            </a>
                            <form action="/kandang/delete/{{ $r->id }}" method="post" class="d-inline"
                                onsubmit="return confirm('Yakin hapus data ?')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger btn-sm"> Hapus</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row" id="wadah">

                            <div class="col dataIot">
                                <label>Suhu</label>
                                <input type="text" class="form-control" placeholder="Suhu" readonly
                                    value="{{ $r->iotModel->suhu }}&deg C">
                            </div>
                            <div class="col dataIot">
                                <label>Kelembapan</label>
                                <input type="text" class="form-control" placeholder="Kelembapan" readonly
                                    value="{{ $r->iotModel->kelembapan }} %">
                            </div>
                            <div class=" col dataIot">
                                <label> Kadar Amonia</label>
                                <input type="text" class="form-control" placeholder="Kadar Amonia" readonly
                                    value="{{ $r->iotModel->amonia }} ppm">
                            </div>

                        </div>

                        <fieldset class="form-group row mt-3">
                            <legend class="col-form-label col-sm-2 float-sm-left pt-0">Cooler</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input type="checkbox" {{ $r->iotModel->relay1 === '1' ? 'checked' : '' }}
                                        onchange="updateRelay(this)" class="form-check-input" data-toggle="toggle"
                                        name="relay1" data-onstyle="success" data-size="xs"
                                        data-id="{{ $r->iotModel->id }}">
                                </div>


                            </div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <legend class="col-form-label col-sm-2 float-sm-left pt-0">Heating</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input type="checkbox" {{ $r->iotModel->relay2 === '1' ? 'checked' : '' }}
                                        onchange="updateRelay2(this)" data-toggle="toggle" name="relay2"
                                        data-onstyle="success" data-size="xs" data-id="{{ $r->iotModel->id }}">
                                </div>

                            </div>
                        </fieldset>


                        <button type="button" class="btn btn-primary btn-sm">
                            Populasi <span class="badge badge-light">{{ $r->populasi_ayam }}
                            </span>

                        </button>
                        @php
                            
                            $date = $r->tanggal_ayam_masuk;
                            $hitung_umur = date_diff(date_create($date), date_create($r->create_at));
                            $umur = $hitung_umur->format('%a');
                         
                        @endphp
                        <button type="button" class="btn btn-warning btn-sm">
                            Umur <span class="badge badge-light">{{ $umur }}</span>
                        </button>

                        <a href="/detail/{{ $r->id }}"><span
                                class="badge badge-pill badge-info float-right mt-3">Detail</span>
                        </a>

                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection





@section('scripts')
    @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif

    {{-- AJAX UPDATE --}}
    <script>
        // ON OFF RELAY1 (Pendingin /Coller)
        function updateRelay(elm) {

            var c = $(elm);
            $.ajax({
                url: 'api/ubah-perangkat',
                type: 'POST',
                data: {
                    relay1: c.is(':checked') ? 1 : 0,
                    id: c.attr("data-id"),

                },
                dataType: "json",

                success: function(data) {
                    toastr.success(`${data.message}`);
                }
            });

        }

        // ON OFF RELAY2 (Penghangat /Heating)
        function updateRelay2(elm) {

            var c = $(elm);
            $.ajax({
                url: 'api/ubah-pemanas',
                type: 'POST',
                data: {
                    relay2: c.is(':checked') ? 1 : 0,
                    id: c.attr("data-id"),

                },
                dataType: "json",

                success: function(data) {
                    toastr.success(`${data.message}`);
                }
            });

        }
    </script>

    <script>
        setInterval(() => {

            location.reload();
        }, 20000);
    </script>
@endsection
