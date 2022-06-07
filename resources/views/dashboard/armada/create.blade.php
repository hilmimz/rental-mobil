@extends('layouts.dashboard')

@section('content')
        <!-- Table -->
        <div class="container mt-3 d-flex justify-content-center">
            <div class="card rounded-3" style="width: 1100px;">
                <div class="card-header mw-100 h-100 text-center btn-secondary rounded-3 shadow-lg">
                    <h2 class="mt-0 mb-0" style="color: #fff; font-size: 22px;"><b>Silahkan Isi Data Berikut</b></h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="proses.php">
                        {{-- <input type="hidden" value="{{ $nomor }}" name="nomor"> --}}
                        <div class="mb-3 mt-3 row">
                            <label for="" class="col-sm-2 col-form-label">Merk :</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_tamu" class="form-control" id="nama" autocomplete="off" placeholder="Masukan Merk Armada">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Jenis :</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="email"  placeholder="Masukkan Jenis Armada" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="" class="col-sm-2 col-form-label">Plat Nomor :</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="email"  placeholder="Masukkan Plat Nomor Armada" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Transmisi :</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Transmisi</option>
                                    <option value="1">Manual</option>
                                    <option value="2">Matic</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Pajak :</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="email"  placeholder="Masukkan Tanggal Pajak" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tahun Beli :</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="email"  placeholder="Masukkan Tahun Beli" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Harga :</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="email"  placeholder="Masukkan Harga" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tersedia :</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Ketersediaan</option>
                                    <option value="1">Ya</option>
                                    <option value="2">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 mt-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Bahan Bakar :</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Bahan Bakar</option>
                                    <option value="1">Bensin</option>
                                    <option value="2">Solar</option>
                                </select>
                            </div>
                        </div>
    
    
                        <div class="mb-3 row mt-4">
                            <div class="col">
                                <button type="submit" name="aksi" value="tambah" class="btn btn-primary">
                                    Submit
                                </button>
                                <a href="table_armada.html" type="button" class="btn btn-danger">
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