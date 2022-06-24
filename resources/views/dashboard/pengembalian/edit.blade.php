@extends('layouts.dashboard')

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Silahkan Isi Data Berikut</b></h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pengembalian.update', $pengembalian->id) }}">
                        @method('PUT')
                        @csrf
                        {{-- <input type="hidden" value="{{ $nomor }}" name="nomor"> --}}
                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">ID Booking Armada :</label>
                            <div class="col-sm-10"> 
                                <select class="form-select  @error('booking_armada_id') is-invalid @enderror" aria-label="Default select example" name="booking_armada_id">
                                    @foreach ($bookingIDs as $bookingID)
                                    <option {{ old('booking_armada_id',$pengembalian->booking_armada_id)==$bookingID->id ? 'selected' : ''  }} value="{{ $bookingID->id }}">{{ $bookingID->id }}</option>
                                    @endforeach
                                </select>
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
                                <input type="datetime-local" name="waktu_pengembalian" class="form-control @error('waktu_pengembalian') is-invalid @enderror" id="waktu_pengembalian"  placeholder="Masukkan Waktu Pengembalian" autocomplete="off"  value="{{ old('waktu_pengembalian', date('Y-m-d\TH:i', strtotime($pengembalian->waktu_pengembalian))) }}">
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
                                    <option {{ old('kondisi',$pengembalian->kondisi)=='Bagus' ? 'selected' : ''  }} value="Bagus">Bagus</option>
                                    <option {{ old('kondisi',$pengembalian->kondisi)=='Kurang Bagus' ? 'selected' : ''  }} value="Kurang Bagus">Kurang Bagus</option>
                                    <option {{ old('kondisi',$pengembalian->kondisi)=='Rusak' ? 'selected' : ''  }} value="Rusak">Rusak</option>
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
                                <input disabled type="number" name="durasi_telat" class="form-control @error('durasi_telat') is-invalid @enderror" id="durasi_telat"  placeholder="Terisi Otomatis" autocomplete="off"  {{-- value="{{ old('durasi_telat', $pengembalian->durasi_telat) }}" --}}>
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
                                <input type="number" name="denda" class="form-control @error('denda') is-invalid @enderror" id="denda"  placeholder="Masukkan Denda" autocomplete="off"  value="{{ old('denda', $pengembalian->denda) }}">
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
                                <input type="string" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"  placeholder="Masukkan keterangan" autocomplete="off"  value="{{ old('keterangan', $pengembalian->keterangan) }}">
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