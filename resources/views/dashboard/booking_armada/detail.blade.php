@extends('layouts.dashboard')

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Detail Booking Armada </b></h2>
                </div>
                <div class="card-body">

                    <div class="mb-3 mt-3 row">
                        <label for="" class="col-sm-2 col-form-label">Booking ID :</label>
                        <div class="col-sm-10">
                            <input disabled type="number" name="booking_id" class="form-control" 
                                id="booking_id" autocomplete="off" value="{{ $booking_armada->booking_id }}">
                        </div>
                    </div>

                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">Armada ID :</label>
                        <div class="col-sm-10">
                            <input disabled type="number" name="armada_id" class="form-control" 
                                id="armada_id" value="{{ $booking_armada->armada_id }}">
                        </div>

                    </div>

                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">Waktu Mulai :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="waktu_mulai" class="form-control" 
                                id="email" autocomplete="off"  value="{{ $booking_armada->waktu_mulai }}">
                        </div>

                    </div>
                    
                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">Waktu Selesai :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="waktu_selesai" class="form-control" 
                                id="email"   autocomplete="off" value="{{ $booking_armada->waktu_selesai }}">
                        </div>

                    </div>

                    {{-- TODO: harusnya diitung otomatis --}}
                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">Durasi Jam :</label>
                        <div class="col-sm-10">
                            <input disabled type="number" name="durasi_jam" class="form-control" 
                                id="pelanggan_id"  autocomplete="off" value="{{ $booking_armada->durasi_jam }}">
                        </div>

                    </div>

                    {{-- TODO: harusnya diitung otomatis --}}
                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">Harga :</label>
                        <div class="col-sm-10">
                            <input disabled type="number" name="harga" class="form-control" 
                                id="pelanggan_id"  autocomplete="off" value="{{ $booking_armada->harga }}">
                        </div>

                    </div>

                    <div class="mb-3 mt-4 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Status :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="status" class="form-control" 
                                id="pelanggan_id"  autocomplete="off" value="{{ $booking_armada->harga }}">
                        </div>
                    </div>                        
                    
                    <div class="mb-3 mt-4 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Created At :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="status" class="form-control" 
                                id="pelanggan_id"  autocomplete="off" value="{{ $booking_armada->created_at }}">
                        </div>
                    </div>                        
           
                </div>
            </div>
        </div>
        <!-- End Table -->

@endsection