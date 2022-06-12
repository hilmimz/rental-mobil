@extends('layouts.dashboard')

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Detail Booking Rental Mobil </b></h2>
                </div>
                <div class="card-body">

                    <div class="mb-3 mt-3 row">
                        <label for="" class="col-sm-2 col-form-label">Pelanggan ID :</label>
                        <div class="col-sm-10">
                            <input disabled type="number" name="pelanggan_id" class="form-control" 
                                id="pelanggan_id" autocomplete="off" value="{{ $booking->pelanggan_id }}">
                        </div>
                    </div>

                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">Tanggal Transaksi :</label>
                        <div class="col-sm-10">
                            <input disabled type="number" name="tgl_transaksi" class="form-control" 
                                id="tgl_transaksi" value="{{ $booking->tgl_transaksi }}">
                        </div>

                    </div>

                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">Harga Total :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="harga_total" class="form-control" 
                                id="harga_total" autocomplete="off"  value="{{ $booking->harga_total }}">
                        </div>

                    </div>
                    
                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">Status :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="status" class="form-control" 
                                id="status"   autocomplete="off" value="{{ $booking->status}}">
                        </div>

                    </div>

                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">No Invoice:</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="no_invoice" class="form-control" 
                                id="no_invoice"   autocomplete="off" value="{{ $booking->no_invoce}}">
                        </div>

                    </div>

                    
                    <div class="mb-3 mt-4 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Created At :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="created_at" class="form-control" 
                                id="pelanggan_id"  autocomplete="off" value="{{ $booking->created_at }}">
                        </div>
                    </div>
                    
                    <div class="mb-3 row mt-4">
                        <div class="col">
                            <a href="{{ route('booking.index') }}" type="button" class="btn btn-primary">
                                Back 
                            </a>
                        </di>
                    </div>           
                </div>
            </div>
        </div>
        <!-- End Table -->

@endsection