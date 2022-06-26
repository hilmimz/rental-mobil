@extends('layouts.dashboard')

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Detail Pembayaran</b></h2>
                </div>
                <div class="card-body">
                    <div class="mb-3 mt-3 row">
                        <label for="" class="col-sm-2 col-form-label">No Invoice :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="booking_id" class="form-control" id="booking_id" autocomplete="off" 
                                value="{{ $pembayaran->booking->no_invoice }}">
                        </div>
                    </div>
                    <div class="mb-3 mt-3 row">
                        <label for="" class="col-sm-2 col-form-label">Tanggal Pembayaran :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="tgl_pembayaran" class="form-control mt-3" id="tgl_pembayaran" autocomplete="off" value="{{ $pembayaran->tgl_pembayaran }}">
                        </div>
                    </div>
                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">Jumlah Bayar :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="jumlah_bayar" class="form-control" id="jumlah_bayar" autocomplete="off" value="{{ $pembayaran->jumlah_bayar }}">
                        </div>
                    </div>
                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">Cara Pembayaran :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="cara_pembayaran" class="form-control mt-3" id="cara_pembayaran" autocomplete="off" value="{{ $pembayaran->cara_pembayaran }}">
                        </div>
                    </div>
                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">Tipe Pembayaran :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="tipe_pembayaran" class="form-control mt-3" id="tipe_pembayaran" autocomplete="off" value="{{ $pembayaran->tipe_pembayaran }}">
                        </div>
                    </div>     

                    <div class="mb-3 mt-4 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Created At :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="bahan_bakar" class="form-control " value="{{ $pembayaran->created_at }}">
                        </div>
                    </div><div class="mb-3 mt-4 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Created By :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="bahan_bakar" class="form-control " value="{{ $pembayaran->created_by }}">
                        </div>
                    </div>
                    <div class="mb-3 row mt-4">
                            <div class="col">
                                <a href="{{ route('pembayaran.index') }}" type="button" class="btn btn-primary">
                                    Back 
                                </a>
                            </div>
                        </div>          
                </div>
            </div>
        </div>
        <!-- End Table -->

@endsection 