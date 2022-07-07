@extends('layout.main')
@php
$title = 'Edit Kandang';
@endphp

@section('content')
    <br><br>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    @foreach ($editKandang as $r)
        <form action="/update-kandang" method="post">
            @csrf
            <div class="text-center">
                <h2>
                    Edit Kandang Ayam
                </h2>
            </div>
            <div class="form-group">
                <label for="namaKandang">Nama Kandang</label>
                <input type="hidden" class="form-control" id="id" name="id" placeholder="...."
                    value="{{ $r->id }}">
                <input type="text" class="form-control" id="namaKandang" name="namaKandang" placeholder="...."
                    value="{{ $r->alamat_kandang }}">
            </div>
            <div class="form-group">


            </div>
            <div class="form-group ">
                <label for="mac">Masukan SN Peangkat </label>

                <input type="text" class="form-control" id="mac" name="mac" placeholder="...."
                    value="{{ $r->mac }}">

            </div>
            <div class="form-group">
                <label for="populasiAyam">populasi Ayam</label>
                <input type="text" class="form-control" id="populasiAyam" name="populasiAyam" placeholder="...."
                    value="{{ $r->populasi_ayam }}">
            </div>
            <div class="form-group">
                <label for="tgl_ayam_masuk">Tanggal Ayam Masuk</label>
                <input type="date" class="form-control" id="tgl_ayam_masuk" name="tgl_ayam_masuk" placeholder="...."
                    value="{{ $r->tanggal_ayam_masuk }}">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="{{ $r->status == '1' ? 'tidak aktif' : 'aktif' }} {{ $r->status }}"> </option>
                    <option value="1"> Tidak Aktif</option>
                    <option value="0"> Aktif</option>
                </select>

            </div>

            <div class="modal-footer">
                <a href="{{ url('/home') }}" class="btn btn-secondary"> Kembali </a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    @endforeach
@endsection
