@extends('layout.main')
@php
$title = 'Tambah Informasi Budidaya';
@endphp
@section('content')
    <br><br>
    <form action="/upload-detail-informasi" method="POST">
        @csrf
        <div class="text-center">
            <h2>
                Tambah Informasi Budidaya
            </h2>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal">
            <input type="hidden" class="form-control" id="idKandang" name="idKandang" value="{{ $detail->id }}">
            @php
                $rekap = DB::select('select * from rekap_harian where id_kandang = ?', [$detail->id]);
                $pakan = DB::select('select * from master_pakan ');
                
            @endphp

            <label for="tanggal" class="mt-2">Jenis Pakan</label>
            <select id="idPakan" name="idPakan" class="form-control">
                <option value="">Pilih Pakan</option>
                @foreach ($pakan as $p)
                    <option value="{{ $p->id }}">{{ $p->jenis_pakan }}</option>
                @endforeach
            </select>
            {{-- @foreach ($rekap as $r)
                <input type="text" class="form-control" value="{{ $r->id_pakan }}">
            @endforeach --}}
        </div>
        <div class="form-group">


        </div>

        <div class="form-group">
            <label for="ayamMati">Ayam Mati</label>
            <input type="number" class="form-control" id="ayamMati" name="ayamMati" placeholder="....">
        </div>
        {{-- <div class="form-group">
            <label for="umur">Umur</label>
            <input type="text" class="form-control" id="umur" name="umur" placeholder="....">
        </div> --}}
        <div class="form-group">
            <label for="pakanKeluar">Pakan Keluar</label>
            <input type="number" class="form-control" id="pakanKeluar" name="pakanKeluar" placeholder="....">
        </div>

        <div class="modal-footer">

            <a href="/detail/{{ $detail->id }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
@endsection
