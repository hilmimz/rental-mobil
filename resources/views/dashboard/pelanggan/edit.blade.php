@extends('layouts.dashboard')

@section('upper_links')
    @include('partials.datatables_upper_links')
@endsection

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Silahkan Isi Data Berikut</b></h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pelanggan.update', $pelanggans->id) }}">
                        @method('PUT')
                        @csrf
                        {{-- <input type="hidden" value="{{ $nomor }}" name="nomor"> --}}
                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">NIK :</label>
                            <div class="col-sm-10">
                                <input type="text" name="nik" class="form-control" id="nik" autocomplete="off" placeholder="Masukkan NIK" value="{{ $pelanggans->nik }}">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Nama :</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" id="nama"  placeholder="Masukkan Nama" autocomplete="off" value="{{ $pelanggans->nama }}">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Gender :</label>
                            <div class="col-sm-10">
                            <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" aria-label="Default select example">
                                    <option selected >{{ $pelanggans->jenis_kelamin }}</option>
                                    @if($pelanggans->jenis_kelamin=='L')
                                        <option value="P">P</option>
                                    @else
                                        <option value="L">L</option>
                                    @endif

                                    
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Tgl Lahir :</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir"  placeholder="Masukkan Tanggal Lahir" autocomplete="off" value="{{ $pelanggans->tgl_lahir }}">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Alamat :</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat" class="form-control" id="alamat"  placeholder="Masukkan Alamat" autocomplete="off" value="{{ $pelanggans->alamat }}">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">No Telp :</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_telepon" class="form-control" id="no_telepon"  placeholder="Masukkan No. Telp" autocomplete="off" value="{{ $pelanggans->no_telepon }}">
                            </div>
                        </div>
    
                        <div class="mb-3 row mt-4">
                            <div class="col">
                                <button type="submit" name="aksi" value="tambah" class="btn btn-primary">
                                    Submit
                                </button>
                                <a href="{{ route('pelanggan.index') }}" type="button" class="btn btn-danger">
                                    Cancel 
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