@extends('layout.main')
@php
$title = 'Tambah Pakan';
@endphp

@section('content')
    <br>
    <br>
    <form action="upload-pakan" method="POST">
        @csrf
        <div class="text-center">
            <h2>
                Tambah Pakan
            </h2>
        </div>
        <div class="form-group">
            <label for="jenispakan">Jenis Pakan</label>
            <input type="text" class="form-control" id="jenispakan" name="jenispakan" placeholder="....">
        </div>
        <div class="form-group">


        </div>

        <div class="form-group">
            <label for="totalpakan">Total Pakan</label>
            <input type="text" class="form-control" id="totalpakan" name="totalpakan" placeholder="....">
        </div>

        <div class="modal-footer">

            <a href="{{ url('informasi-pakan') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
@endsection

@section('scripts')
    @endsectionphp
