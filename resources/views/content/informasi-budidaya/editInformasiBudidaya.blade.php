@extends('layout.main')
@php
$title = 'Edit Informasi Budidaya';
@endphp
@section('content')
    <br><br>
    @foreach ($editInformasi as $r)
        <form action="/update-detail-informasi" method="POST">
            @csrf
            <div class="text-center">
                <h2>
                    Edit Informasi Budidaya
                </h2>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $r->tanggal }}">
                <input type="hidden" class="form-control" id="idKandang" name="idKandang" value="{{ $r->id_kandang }}">
                <input type="hidden" class="form-control" id="idPakan" name="idPakan" value="{{ $r->id_pakan }}">
                <input type="hidden" class="form-control" id="id" name="id" value="{{ $r->id }}">

            </div>
            <div class="form-group">


            </div>

            <div class="form-group">
                <label for="ayamMati">Ayam Mati</label>
                <input type="number" class="form-control" id="ayamMati" name="ayamMati" placeholder="...."
                    value="{{ $r->ayam_mati }}">
            </div>
            {{-- <div class="form-group">
                <label for="umur">Umur</label>
                <input type="text" class="form-control" id="umur" name="umur" placeholder="...."
                    value="{{ $r->umur }}">
            </div> --}}
            <div class="form-group">
                <label for="pakanKeluar">Pakan Keluar</label>
                <input type="number" class="form-control" id="pakanKeluar" name="pakanKeluar" placeholder="...."
                    value="{{ $r->pakan_keluar }}">
            </div>

            <div class="modal-footer">

                <a href="/detail/{{ $r->id_kandang }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    @endforeach
@endsection
