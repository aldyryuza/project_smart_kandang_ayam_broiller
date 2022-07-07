@extends('layout.main')
@php
$title = 'Edit Pakan';
@endphp

@section('content')
    <br>
    <br>

    @foreach ($editPakan as $r)
        <form action="{{ url('/update-pakan') }}" method="POST">
            @csrf
            <div class="text-center">
                <h2>
                    Edit Pakan
                </h2>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" placeholder="...." value="{{ $r->id }}">

                <label for="jenispakan">Jenis Pakan</label>
                <input type="text" class="form-control" id="jenispakan" name="jenispakan" placeholder="...."
                    value="{{ $r->jenis_pakan }}">
            </div>
            <div class="form-group">


            </div>

            <div class="form-group">
                <label for="totalpakan">Total Pakan</label>
                <input type="text" class="form-control" id="totalpakan" name="totalpakan" placeholder="...."
                    value="{{ $r->total_pakan }}">
            </div>

            <div class="modal-footer">

                <a href="{{ url('informasi-pakan') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    @endforeach
@endsection

@section('scripts')
@endsection
