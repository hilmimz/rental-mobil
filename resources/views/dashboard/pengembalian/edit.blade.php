@extends('layouts.dashboard')

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Silahkan Isi Data Berikut</b></h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pengembalian.update', $pengembalian->getKey()) }}">
                        @csrf
                        {{-- <input type="hidden" value="{{ $nomor }}" name="nomor"> --}}
                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">BookingArmada :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control"
                                    id="text" autocomplete="off" 
                                    value="{{ $pengembalian->booking_armada->booking->no_invoice . " & " . $pengembalian->booking_armada->armada->plat_nomor }}">
                            </div>
                        </div>

                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Waktu Pengembalian :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" name="waktu_pengembalian" class="form-control" id="waktu_pengembalian"   
                                    autocomplete="off" value="{{ old('waktu_pengembalian', $pengembalian->waktu_pengembalian) }}">
                            </div>
                            @error('waktu_pengembalian')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Kondisi :</label>
                            <div class="col-sm-10">
                                <select class="form-select  @error('kondisi') is-invalid @enderror" aria-label="Default select example" name="kondisi">
                                    <option @if(old('kondisi', $pengembalian->kondisi) == "Bagus") selected @endif value="Bagus">Bagus</option>
                                    <option @if(old('kondisi', $pengembalian->kondisi) == "Kurang Bagus") selected @endif value="Kurang Bagus">Kurang Bagus</option>
                                    <option @if(old('kondisi', $pengembalian->kondisi) == "Rusak") selected @endif value="Rusak">Rusak</option>
                                </select>
                            </div>
                            @error('kondisi')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Durasi Telat :</label>
                            <div class="col-sm-10">
                                <input disabled type="number" name="durasi_telat" class="form-control @error('durasi_telat') is-invalid @enderror" 
                                    id="durasi_telat"  placeholder="Terisi Otomatis" autocomplete="off" value="{{ $pengembalian->durasi_telat }}">
                            </div>
                            @error('durasi_telat')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Denda :</label>
                            <div class="col-sm-10">
                                <input type="number" name="denda" class="form-control @error('denda') is-invalid @enderror" id="denda"  
                                    placeholder="Masukkan Denda" autocomplete="off"  value="{{ old('denda', $pengembalian->denda) }}">
                            </div>
                            @error('denda')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Keterangan :</label>
                            <div class="col-sm-10">
                                <input type="string" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"  
                                    placeholder="Masukkan keterangan" autocomplete="off"  value="{{ old('keterangan', $pengembalian->keterangan) }}">
                            </div>
                            @error('keterangan')
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
                                <a href="{{ route('pengembalian.index') }}" type="button" class="btn btn-danger">
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