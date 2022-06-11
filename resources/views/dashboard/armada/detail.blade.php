@extends('layouts.dashboard')

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Silahkan Isi Data Berikut</b></h2>
                </div>
                <div class="card-body">

                        {{-- merk --}}
                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">Merk :</label>
                            <div class=" col-sm-10">
                                <input disabled type="text" name="merk_id" class="form-control " value="{{ $armada->merk->nama }}">
                            </div>
                        </div>

                        {{-- Jenis --}}
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Jenis :</label>
                            <div class=" col-sm-10">
                                <input disabled type="text" name="jenis" class="form-control " value="{{ $armada->jenis }}">
                            </div>
                        </div>

                        {{-- Plat Nomor --}}
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Plat Nomor :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" name="plat_nomor" class="form-control " value="{{ $armada->plat_nomor }}">
                            </div>
                        </div>

                        {{-- Transmisi --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Transmisi :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" name="transmisi" class="form-control " value="{{ $armada->transmisi }}">
                            </div>
                        </div>

                        {{-- Tanggal Pajak --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Pajak :</label>
                            <div class="col-sm-10">
                                <input disabled type="date" name="tgl_pajak" class="form-control " value="{{ $armada->tgl_pajak }}">
                            </div>
                        </div>

                        {{-- Tahun Beli --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tahun Beli :</label>
                            <div class="col-sm-10">
                                <input disabled type="number" name="thn_beli" class="form-control " value="{{ $armada->thn_beli }}">
                            </div>
                        </div>

                        {{-- Harga --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Harga :</label>
                            <div class="col-sm-10">
                                <input disabled type="nnumber" name="harga_tiga_jam" class="form-control " value="{{ $armada->harga_tiga_jam }}">
                            </div>
                        </div>

                        {{-- Tersedia --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tersedia :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" name="tersedia" class="form-control " value="{{ $armada->tersedia }}">
                            </div>
                        </div>

                        {{-- Bahan Bakar --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Bahan Bakar :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" name="bahan_bakar" class="form-control " value="{{ $armada->bahan_bakar }}">
                            </div>
                        </div>

                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Created At :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" name="bahan_bakar" class="form-control " value="{{ $armada->created_at }}">
                            </div>
                        </div>
    
                        
                        <div class="mb-3 row mt-4">
                            <div class="col">
                                <a href="{{ route('armada.index') }}" type="button" class="btn btn-primary">
                                    Back 
                                </a>
                            </div>
                        </div>           
                </div>
            </div>
        </div>
        <!-- End Table -->

@endsection