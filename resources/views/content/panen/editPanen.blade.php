@extends('layout.main')
@php
$title = 'Edit Informasi Data Panen';
@endphp
@section('content')
    <br><br>
    @foreach ($editPanen as $r)
        <form action="/update/panen" method="POST">
            @csrf
            <div class="text-center">
                <h2>
                    Tambah Data Informasi Panen
                </h2>
            </div>
            <div class="form-group">
                <label for="tanggalpanen">Tanggal Panen</label>
                <input type="date" class="form-control" id="tanggalpanen" name="tanggalpanen" value="{{ $r->tanggal }}">
                <input type="hidden" class="form-control" id="idKandang" name="idKandang" value="{{ $r->id_kandang }}">
                <input type="hidden" class="form-control" id="id" name="id" value="{{ $r->id }}">
            </div>
            <div class="form-group">


            </div>

            <div class="form-group">
                <label for="populasiakhir">Populasi Akhir</label>
                <input type="number" class="form-control" id="populasiakhir" name="populasiakhir" placeholder="...."
                    value="{{ $r->populasi_akhir }}">
            </div>
            <div class="form-group">
                <label for="umurpanen">Umur Panen</label>
                <input type="number" class="form-control" id="umurpanen" name="umurpanen" placeholder="...."
                    value="{{ $r->umur_panen }}">
            </div>
            <div class="form-group">
                <label for="bobotPanen">Bobot Panen</label>
                <input type="number" class="form-control" id="bobotPanen" name="bobotPanen" placeholder="...."
                    value="{{ $r->bobot_panen }}">
            </div>
            <div class="form-group">
                <label for="hargapanen">Harga Panen</label>
                <input type="number" class="form-control" id="hargapanen" name="hargapanen" placeholder="...."
                    value="{{ $r->harga_panen }}">
            </div>

            <div class="modal-footer">

                <a href="/detail/{{ $r->id_kandang }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    @endforeach
@endsection
