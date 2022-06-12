@extends('layouts.dashboard')

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Silahkan Isi Data Berikut</b></h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pembayaran.store') }}">
                        @csrf
                        
                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">Nomor Invoice :</label>
                            <div class="col-sm-10">
                                <select class="form-select  @error('booking_id') is-invalid @enderror" aria-label="Default select example" name="booking_id">
                                    <option @if(!old('booking_id')) selected @endif value="">Pilih Nomor Invoice</option>
                                    @foreach ($bookings as $booking)
                                        <option @if(old('booking_id') == $booking->id) selected @endif value="{{ $booking->id }}">{{ $booking->no_invoice }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('booking_id')
                                <div class="col-sm-2"></div>
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">Tanggal Pembayaran :</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_pembayaran" class="form-control mt-3 @error('tgl_pembayaran') is-invalid @enderror" id="tgl_pembayaran" autocomplete="off" placeholder="Masukan Tanggal Pembayaran" value="{{ old('tgl_pembayaran') }}">
                            </div>
                            @error('tgl_pembayaran')
                                <div class="col-sm-2"></div> {{-- dummy --}}
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Jumlah Bayar :</label>
                            <div class="col-sm-10">
                                <input type="text" name="jumlah_bayar" class="form-control @error('jumlah_bayar') is-invalid @enderror" id="jumlah_bayar"  placeholder="Masukkan Jumlah Bayar" autocomplete="off" value="{{ old('tgl_pembayaran') }}">
                            </div>
                            @error('jumlah_bayar')
                                <div class="col-sm-2"></div> {{-- dummy --}}
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Cara Pembayaran :</label>
                            <div class="col-sm-10">
                                <select class="form-select mt-3 @error('cara_pembayaran') is-invalid @enderror" aria-label="Default select example" name="cara_pembayaran" class="form-control" id="cara_pembayaran">
                                    <option @if(!old('cara_pembayaran')) selected @endif value="">Pilih Opsi Pembayaran</option>
                                    <option @if(old('cara_pembayaran') == "Transfer") selected @endif value="Transfer">Transfer</option>
                                    <option @if(old('cara_pembayaran') == "Cash") selected @endif value="Cash">Cash</option>
                                </select>
                            </div>
                            @error('cara_pembayaran')
                                <div class="col-sm-2"></div> {{-- dummy --}}
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Tipe Pembayaran :</label>
                            <div class="col-sm-10">
                                <select class="form-select mt-3 @error('tipe_pembayaran') is-invalid @enderror" aria-label="Default select example" name="tipe_pembayaran" class="form-control" id="tipe_pembayaran">
                                    <option @if(!old('tipe_pembayaran')) selected @endif value="">Pilih Tipe Pembayaran</option>
                                    <option @if(old('tipe_pembayaran') == "DP") selected @endif value="DP">DP</option>
                                    <option @if(old('tipe_pembayaran') == "Pelunasan") selected @endif value="Pelunasan">Pelunasan</option>
                                </select>
                            </div>
                            @error('tipe_pembayaran')
                                <div class="col-sm-2"></div> {{-- dummy --}}
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
                                <a href="{{ route('pembayaran.index') }}" type="button" class="btn btn-danger">
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