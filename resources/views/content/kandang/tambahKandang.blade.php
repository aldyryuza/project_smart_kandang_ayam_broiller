@extends('layout.main')
@php
$title = 'Tambah Kandang';
$date = date('Y-m-d');
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

    <form action="/upload-kandang" method="post">
        @csrf
        <div class="text-center">
            <h2>
                Tambah Kandang Ayam
            </h2>
        </div>
        <div class="form-group">
            <label for="namaKandang">Nama Kandang</label>
            <input type="text" class="form-control" id="namaKandang" name="namaKandang" placeholder="...."
                value="{{ old('namakandang') }}" required>
        </div>
        <div class="form-group">

        </div>
        <div class="form-group ">

            <label for="mac">Masukan SN Perangkat </label>

            <input type="number" class="form-control" id="mac" name="mac" placeholder="...."
                value="{{ old('mac') }}" required>
            <div id="p" class="alert alert-warning">
                Isikan data MAC yang sudah ada di tabel <a href="/perangkat">Perangkat</a>
            </div>

        </div>
        <div class="form-group">
            <label for="populasiAyam">populasi Ayam</label>
            <input type="number" class="form-control" id="populasiAyam" name="populasiAyam" placeholder="...."
                value="{{ old('populasiAyam') }}" required>
        </div>
        <div class="form-group">
            <label for="tgl_ayam_masuk">Tanggal Ayam Masuk</label>
            <input type="date" class="form-control" id="tgl_ayam_masuk" name="tgl_ayam_masuk" placeholder="...."
                value="{{ $date }}" required>
        </div>

        <div class="modal-footer">
            <a href="{{ url('/home') }}" class="btn btn-secondary"> Kembali </a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $("#p").hide();
        $("#mac").click(function() {
            toastr.warning(`Pastikan MAC , tidak di pakai dan ada di tabel Perangkat`);
            $("#p").show();
        });
    </script>
@endsection
