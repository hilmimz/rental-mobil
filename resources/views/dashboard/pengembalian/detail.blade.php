@extends('layouts.dashboard')

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-body">
                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">ID Booking Armada :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control " value="{{ $pengembalian->booking_armada_id }}">
                            </div>
                            @error('booking_armada_id')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Waktu Pengembalian :</label>
                            <div class="col-sm-10">
                                <input disabled type="datetime-local" name="waktu_pengembalian" class="form-control @error('waktu_pengembalian') is-invalid @enderror" id="waktu_pengembalian"  placeholder="Masukkan Waktu Pengembalian" autocomplete="off"  value="{{ old('waktu_pengembalian', date('Y-m-d\TH:i', strtotime($pengembalian->waktu_pengembalian))) }}">
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
                                <input disabled type="text" class="form-control " value="{{ $pengembalian->kondisi }}">
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
                                <input disabled type="number" name="durasi_telat" class="form-control @error('durasi_telat') is-invalid @enderror" id="durasi_telat"  placeholder="Masukkan Durasi Telat" autocomplete="off"  value="{{ old('durasi_telat', $pengembalian->durasi_telat) }}">
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
                                <input disabled type="number" name="denda" class="form-control @error('denda') is-invalid @enderror" id="denda"  placeholder="Masukkan Denda" autocomplete="off"  value="{{ old('denda', $pengembalian->denda) }}">
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
                                <input disabled type="string" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"  placeholder="Masukkan keterangan" autocomplete="off"  value="{{ old('keterangan', $pengembalian->keterangan) }}">
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
                                <a href="{{ route('pengembalian.index') }}" type="button" class="btn btn-primary">
                                    Back 
                                </a>
                            </div>
                        </div>              
                </div>
            </div>
        </div>
        <!-- End Table -->

        

@endsection