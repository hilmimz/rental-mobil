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
                                <select class="form-select  @error('merk_id') is-invalid @enderror" aria-label="Default select example" name="merk_id">
                                    @foreach ($merks as $merk)
                                    <option {{ old('merk_id',$armada->merk_id)==$merk->id ? 'selected' : ''  }} value="{{ $merk->id }}">{{ $merk->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Jenis --}}
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Jenis :</label>
                            <div class="col-sm-10">
                                <input type="text" name="jenis" class="form-control" id="email"  placeholder="Masukkan Jenis Armada" autocomplete="off" value="{{ old('jenis', $armada->jenis) }}">
                            </div>
                            @error('jenis')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Plat Nomor --}}
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Plat Nomor :</label>
                            <div class="col-sm-10">
                                <input type="text" name="plat_nomor" class="form-control  @error('plat_nomor') is-invalid @enderror" id="email"  placeholder="Masukkan Plat Nomor Armada" autocomplete="off" value="{{ old('plat_nomor', $armada->plat_nomor) }}">
                            </div>
                            @error('plat_nomor')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Transmisi --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Transmisi :</label>
                            <div class="col-sm-10">
                                <select class="form-select  @error('transmisi') is-invalid @enderror" aria-label="Default select example" name="transmisi">
                                    <option {{ old('transmisi',$armada->transmisi)=='Manual' ? 'selected' : ''  }} value="Manual">Manual</option>
                                    <option {{ old('transmisi',$armada->transmisi)=='Matic' ? 'selected' : ''  }} value="Matic">Matic</option>
                                </select>
                            </div>
                            @error('transmisi')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Tanggal Pajak --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Pajak :</label>
                            <div class="col-sm-10">
                                <input type="text" name="tgl_pajak" class="form-control  @error('tgl_pajak') is-invalid @enderror" id="email"  
                                    placeholder="Format: TTTT-BB-HH, contoh: 2022-01-02" autocomplete="off" value="{{ old('tgl_pajak', $armada->tgl_pajak) }}">
                            </div>
                            @error('tgl_pajak')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Tahun Beli --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tahun Beli :</label>
                            <div class="col-sm-10">
                                <input type="number" name="thn_beli" class="form-control  @error('thn_beli') is-invalid @enderror" id="email"  placeholder="Masukkan Tahun Beli" autocomplete="off" value="{{ old('thn_beli', $armada->thn_beli) }}">
                            </div>
                            @error('thn_beli')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Harga --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Harga per tiga jam :</label>
                            <div class="col-sm-10">
                                <input type="number" name="harga_tiga_jam" class="form-control  @error('harga_tiga_jam') is-invalid @enderror" id="email"  placeholder="Masukkan Harga" autocomplete="off" value="{{ old('harga_tiga_jam', $armada->harga_tiga_jam) }}">
                            </div>
                            @error('harga_tiga_jam')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Tersedia --}}
                        {{-- <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tersedia :</label>
                            <div class="col-sm-10">
                                <select class="form-select  @error('tersedia') is-invalid @enderror" aria-label="Default select example" name="tersedia">
                                    <option {{ old('tersedia',$armada->tersedia)=='1' ? 'selected' : ''  }} value="1">Ya</option>
                                    <option {{ old('tersedia',$armada->tersedia)=='0' ? 'selected' : ''  }} value="0">Tidak</option>
                                </select>
                            </div>
                            @error('tersedia')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                        {{-- Bahan Bakar --}}
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Bahan Bakar :</label>
                            <div class="col-sm-10">
                                <select class="form-select  @error('bahan_bakar') is-invalid @enderror" aria-label="Default select example" name="bahan_bakar">
                                    <option {{ old('bahan_bakar',$armada->bahan_bakar)=='Bensin' ? 'selected' : ''  }} value="Bensin">Bensin</option>
                                    <option {{ old('bahan_bakar',$armada->bahan_bakar)=='Solar' ? 'selected' : ''  }} value="Solar">Solar</option>
                                </select>
                            </div>
                            @error('bahan_bakar')
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