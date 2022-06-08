@extends('layouts.dashboard')

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Silahkan Isi Data Berikut</b></h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('merk.store') }}">
                        @csrf
                        {{-- <input type="hidden" value="{{ $nomor }}" name="nomor"> --}}
                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">Merk :</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" id="nama" autocomplete="off" placeholder="Masukan Merk Armada">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Produsen :</label>
                            <div class="col-sm-10">
                                <input type="text" name="produsen" class="form-control" id="email"  placeholder="Masukkan Nama Produsen" autocomplete="off">
                            </div>
                        </div>
    
                        <div class="mb-3 row mt-4">
                            <div class="col">
                                <button type="submit" name="aksi" value="tambah" class="btn btn-primary">
                                    Submit
                                </button>
                                <a href="{{ route('merk.index') }}" type="button" class="btn btn-danger">
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