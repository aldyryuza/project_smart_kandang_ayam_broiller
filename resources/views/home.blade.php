@extends('layout.main')
@php
$title = 'Dashboard';
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
        <div class="col mb-4">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5>Kandang Kesamben</h5>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <label>Suhu</label>
                            <input type="text" class="form-control" placeholder="Suhu" readonly>
                        </div>
                        <div class="col">
                            <label>Kelembapan</label>
                            <input type="text" class="form-control" placeholder="Kelembapan" readonly>
                        </div>
                        <div class="col">
                            <label> Kadar Amonia</label>
                            <input type="text" class="form-control" placeholder="Kadar Amonia" readonly>
                        </div>
                    </div>

                    <fieldset class="form-group row mt-3">
                        <legend class="col-form-label col-sm-2 float-sm-left pt-0">Cooler</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-size="xs">
                            </div>

                        </div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <legend class="col-form-label col-sm-2 float-sm-left pt-0">Heating</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-size="xs">
                            </div>

                        </div>
                    </fieldset>

                    <button type="button" class="btn btn-primary">
                        Populasi <span class="badge badge-light">4</span>
                    </button>
                    <button type="button" class="btn btn-warning">
                        Umur <span class="badge badge-light">4</span>
                    </button>
                    <button type="button" class="btn btn-danger">
                        Jumlah Pakan <span class="badge badge-light">4</span>
                    </button>
                    <a href="{{ url('detail-informasi-kandang') }}"><span
                            class="badge badge-pill badge-info float-right mt-3">Detail</span></a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5>Kandang Kesamben</h5>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <label>Suhu</label>
                            <input type="text" class="form-control" placeholder="First name" readonly>
                        </div>
                        <div class="col">
                            <label>Kelembapan</label>
                            <input type="text" class="form-control" placeholder="Last name" readonly>
                        </div>
                        <div class="col">
                            <label> Kadar Amonia</label>
                            <input type="text" class="form-control" placeholder="Last name" readonly>
                        </div>
                    </div>

                    <fieldset class="form-group row mt-3">
                        <legend class="col-form-label col-sm-2 float-sm-left pt-0">Cooler</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-size="xs">
                            </div>

                        </div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <legend class="col-form-label col-sm-2 float-sm-left pt-0">Heating</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-size="xs">
                            </div>

                        </div>
                    </fieldset>

                    <button type="button" class="btn btn-primary">
                        Populasi <span class="badge badge-light">4</span>
                    </button>
                    <button type="button" class="btn btn-warning">
                        Umur <span class="badge badge-light">4</span>
                    </button>
                    <button type="button" class="btn btn-danger">
                        Jumlah Pakan <span class="badge badge-light">4</span>
                    </button>
                    <a href=""><span class="badge badge-pill badge-info float-right mt-3">Detail</span></a>
                </div>
            </div>
        </div>

    </div>
@endsection
