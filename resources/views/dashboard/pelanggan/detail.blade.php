@extends('layouts.dashboard')

@section('upper_links')
    @include('partials.datatables_upper_links')
@endsection

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Detail Pelanggan</b></h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pelanggan.store') }}">
                        @csrf
                        {{-- <input type="hidden" value="{{ $nomor }}" name="nomor"> --}}
                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">NIK :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" name="nik" class="form-control" id="nik" autocomplete="off" value="{{ $pelanggan->nik }}">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Nama :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" name="nama" class="form-control" id="nama"  autocomplete="off" value="{{ $pelanggan->nama }}">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Gender :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" autocomplete="off" value="{{ $pelanggan->jenis_kelamin }}">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Tgl Lahir :</label>
                            <div class="col-sm-10">
                                <input disabled type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" autocomplete="off" value="{{ $pelanggan->tgl_lahir }}">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Alamat :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" name="alamat" class="form-control" id="alamat" autocomplete="off" value="{{ $pelanggan->alamat }}">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">No Telp :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" name="no_telepon" class="form-control" id="no_telepon" autocomplete="off" value="{{ $pelanggan->no_telepon }}">
                            </div>
                        </div>
    
                        <div class="mb-3 row mt-4">
                            <div class="col">
                                <a href="{{ route('pelanggan.index') }}" type="button" class="btn btn-primary">
                                    Back 
                                </a>
                            </div>
                        </div>
                    </form>                
                </div>
            </div>
        </div>
        <!-- End Table -->

@endsection

@section('bottom_links')
    @include('partials.datatables_bottom_links')
@endsection