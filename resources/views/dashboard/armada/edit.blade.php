@extends('layouts.dashboard')

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Silahkan Isi Data Berikut</b></h2>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('armada.update', $armada->id) }}">
                        @csrf
                        @method('PUT')

                        {{-- merk --}}
                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">Merk :</label>
                            <div class="col-sm-10">
                                <input type="number" value="{{ $armada->merk_id }}" name="merk_id" class="form-control" id="nama" autocomplete="off" placeholder="Masukan Merk Armada" required>
                            </div>
                        </div>

                        {{-- Jenis --}}
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Jenis :</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ $armada->jenis }}" name="jenis" class="form-control" id="email"  placeholder="Masukkan Jenis Armada" autocomplete="off" required>
                            </div>
                        </div>

                        {{-- Plat Nomor --}}
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Plat Nomor :</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ $armada->plat_nomor }}" name="plat_nomor" class="form-control" id="email"  placeholder="Masukkan Plat Nomor Armada" autocomplete="off" required>
                            </div>
                        </div>

                        {{-- Transmisi --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Transmisi :</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="transmisi" required>
                                    <option>Pilih Transmisi</option>
                                    <option value="Manual" {{ ($armada->transmisi == 'Manual') ? 'selected' : '' }}>Manual</option>
                                    <option value="Matic" {{ ($armada->transmisi == 'Matic') ? 'selected' : '' }}>Matic</option>
                                </select>
                            </div>
                        </div>

                        {{-- Tanggal Pajak --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Pajak :</label>
                            <div class="col-sm-10">
                                <input type="date" value="{{ $armada->tgl_pajak }}" name="tgl_pajak" class="form-control" id="email"  placeholder="Masukkan Tanggal Pajak" autocomplete="off" required>
                            </div>
                        </div>

                        {{-- Tahun Beli --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tahun Beli :</label>
                            <div class="col-sm-10">
                                <input type="number" value="{{ $armada->thn_beli }}" name="thn_beli" class="form-control" id="email"  placeholder="Masukkan Tahun Beli" autocomplete="off" required>
                            </div>
                        </div>

                        {{-- Harga --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Harga :</label>
                            <div class="col-sm-10">
                                <input type="number" value="{{ $armada->harga_tiga_jam }}" name="harga_tiga_jam" class="form-control" id="email"  placeholder="Masukkan Harga" autocomplete="off" required>
                            </div>
                        </div>

                        {{-- Tersedia --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tersedia :</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="tersedia" required>
                                    <option>Pilih Ketersediaan</option>
                                    <option value="1" {{ ($armada->tersedia == '1') ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ ($armada->tersedia == '0') ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>

                        {{-- Bahan Bakar --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Bahan Bakar :</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="bahan_bakar" required>
                                    <option>Pilih Bahan Bakar</option>
                                    <option value="Bensin" {{ ($armada->bahan_bakar == 'Bensin') ? 'selected' : '' }}>Bensin</option>
                                    <option value="Solar" {{ ($armada->bahan_bakar == 'Solar') ? 'selected' : '' }}>Solar</option>
                                </select>
                            </div>
                        </div>
    
                        
                        <div class="mb-3 row mt-4">
                            <div class="col">
                                <button type="submit" name="aksi" value="tambah" class="btn btn-primary">
                                    Submit
                                </button>
                                <a href="{{ route('armada.index') }}" type="button" class="btn btn-danger">
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