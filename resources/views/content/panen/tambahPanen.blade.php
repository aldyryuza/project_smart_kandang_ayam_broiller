@extends('layout.main')
@php
$title = 'Tambah Informasi Panen';
@endphp
@section('content')
    <br><br>
    <form action="/upload/panen" method="POST">
        @csrf
        <div class="text-center">
            <h2>
                Tambah Data Informasi Panen
            </h2>
        </div>
        <div class="form-group">
            <label for="tanggalpanen">Tanggal Panen</label>
            <input type="date" class="form-control" id="tanggalpanen" name="tanggalpanen">
            <input type="hidden" class="form-control" id="idKandang" name="idKandang" value="{{ $detail->id }}">
        </div>
        <div class="form-group">


        </div>

        <div class="form-group">
            <label for="populasiakhir">Populasi Akhir</label>
            <input type="number" class="form-control" id="populasiakhir" name="populasiakhir" placeholder="....">
        </div>
        <div class="form-group">
            <label for="umurpanen">Umur Panen</label>
            <input type="number" class="form-control" id="umurpanen" name="umurpanen" placeholder="....">
        </div>
        <div class="form-group">
            <label for="bobotPanen">Bobot Panen</label>
            <input type="number" class="form-control" id="bobotPanen" name="bobotPanen" placeholder="....">
        </div>
        <div class="form-group">
            <label for="hargapanen">Harga Panen</label>
            <input type="number" class="form-control" id="hargapanen" name="hargapanen" placeholder="....">
        </div>

        <div class="modal-footer">

            <a href="/detail/{{ $detail->id }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
