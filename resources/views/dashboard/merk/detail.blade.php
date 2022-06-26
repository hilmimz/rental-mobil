@extends('layouts.dashboard')

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Detail Merk </b></h2>
                </div>
                <div class="card-body">

                    <div class="mb-3 mt-3 row">
                        <label for="" class="col-sm-2 col-form-label">Merk ID :</label>
                        <div class="col-sm-10">
                            <input disabled type="number" name="booking_id" class="form-control" 
                                id="booking_id" autocomplete="off" value="{{ $merk->id }}">
                        </div>
                    </div>

                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">Nama Merk :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="armada_id" class="form-control" 
                                id="armada_id" value="{{ $merk->nama }}">
                        </div>

                    </div>

                    <div class="mb-3 mt-4 row">
                        <label for="" class="col-sm-2 col-form-label">Produsen :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="waktu_mulai" class="form-control" 
                                id="email" autocomplete="off"  value="{{ $merk->produsen }}">
                        </div>                    
                    
                    <div class="mb-3 mt-4 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Created At :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="status" class="form-control" 
                                id="pelanggan_id"  autocomplete="off" value="{{ $merk->created_at }}">
                        </div>
                    </div>    
                    <div class="mb-3 mt-4 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Created By :</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="bahan_bakar" class="form-control " value="{{ $merk->created_by }}">
                        </div>
                    </div>
                    
                    {{-- @foreach($armadas as $armada)
                    <div class="mb-3 mt-4 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">MOBIL:</label>
                        <div class="col-sm-10">
                            <input disabled type="text" name="status" class="form-control" 
                                id="pelanggan_id"  autocomplete="off" value="{{ $armada->plat_nomor }}">
                        </div>
                    </div>   
                    @endforeach --}}
                    
                </div>
                <a href="{{ route('merk.index') }}" type="button" class="btn btn-primary">
                    Back 
                </a>
            </div>
            
        </div>
        <!-- End Table -->

        

@endsection