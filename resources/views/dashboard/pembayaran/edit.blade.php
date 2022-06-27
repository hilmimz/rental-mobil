@extends('layouts.dashboard')

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Silahkan Isi Data Berikut</b></h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pembayaran.update', $pembayarans->getKey()) }}">
                        @csrf
                        @method('PUT')
                         
                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">Booking :</label>
                            <div class="col-sm-10">
                                <input disabled type="text" name="booking_id" class="form-control"
                                    id="text" autocomplete="off" value="{{ $pembayarans->booking->no_invoice . "; sisa pembayaran: " . $pembayarans->booking->sisa_pembayaran }}">
                            </div>
                        </div>

                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">Tanggal Pembayaran :</label>
                            <div class="col-sm-10">
                                <input type="text" name="tgl_pembayaran" class="form-control mt-3 @error('tgl_pembayaran') is-invalid @enderror" id="tgl_pembayaran" autocomplete="off" 
                                placeholder="Format: TTTT-BB-HH, contoh: 2022-01-02" value="{{ old('tgl_pembayaran', $pembayarans->tgl_pembayaran) }} ">
                            </div>
                            @error('tgl_pembayaran')
                                <div class="col-sm-2"></div> 
                                <div class="text-danger col-sm-10">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Jumlah Bayar :</label>
                            <div class="col-sm-10">
                                <input type="text" name="jumlah_bayar" class="form-control @error('jumlah_bayar') is-invalid @enderror" id="jumlah_bayar"  
                                    placeholder="Masukkan Jumlah Bayar" autocomplete="off" value="{{ old('jumlah_bayar', $pembayarans->jumlah_bayar) }}">
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
                                    <option @if(old('cara_pembayaran', $pembayarans->cara_pembayaran) == "Transfer") selected @endif value="Transfer">Transfer</option>
                                    <option @if(old('cara_pembayaran', $pembayarans->cara_pembayaran) == "Cash") selected @endif value="Cash">Cash</option>
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
                                    <option @if(old('tipe_pembayaran', $pembayarans->tipe_pembayaran) == "DP") selected @endif value="DP">DP</option>
                                    <option @if(old('tipe_pembayaran', $pembayarans->tipe_pembayaran) == "Pelunasan") selected @endif value="Pelunasan">Pelunasan</option>
                                    <option @if(old('tipe_pembayaran', $pembayarans->tipe_pembayaran) == "Denda") selected @endif value="Denda">Denda</option>
                                    <option @if(old('tipe_pembayaran', $pembayarans->tipe_pembayaran) == "Pelunasan dan Denda") selected @endif value="Pelunasan dan Denda">Pelunasan dan Denda</option>


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