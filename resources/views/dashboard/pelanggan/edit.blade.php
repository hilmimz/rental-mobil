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
                    <form method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}">
                        @csrf
                        @method('PUT')
                        
                        {{-- <input type="hidden" value="{{ $nomor }}" name="nomor"> --}}
                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">NIK :</label>
                            <div class="col-sm-10">
                                <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" autocomplete="off" placeholder="Masukkan NIK" value="{{ old('nik', $pelanggan->nik) }}">
                            </div>
                            @error('nik')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Nama :</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"  placeholder="Masukkan Nama" autocomplete="off" value="{{ old('nama', $pelanggan->nama) }}">
                            </div>
                            @error('nama')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Gender :</label>
                            <div class="col-sm-10">
                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin" aria-label="Default select example">
                                    <option @if(old('status') == "Selesai") selected @endif value="L">L</option>
                                    <option @if(old('status') == "Aktif") selected @endif value="P">P</option>
                                </select>
                            </div>
                            @error('jenis_kelamin')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Tgl Lahir :</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"  placeholder="Masukkan Tanggal Lahir" autocomplete="off" value="{{ old('tgl_lahir', $pelanggan->tgl_lahir) }}">
                            </div>
                            @error('tgl_lahir')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Alamat :</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat"  placeholder="Masukkan Alamat" autocomplete="off" value="{{ old('alamat', $pelanggan->alamat) }}">
                            </div>
                            @error('alamat')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">No Telp :</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon"  placeholder="Masukkan No. Telp" autocomplete="off" value="{{ old('no_telepon', $pelanggan->no_telepon) }}">
                            </div>
                            @error('no_telepon')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
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