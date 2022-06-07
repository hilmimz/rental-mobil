@extends('layouts.dashboard')

@section('upper_links')
    @include('partials.datatables_upper_links')
@endsection


@section('content')
<!-- Table  -->
<div>
    <!-- Typography -->
    <h2 class="mt-3"><center>Data Armada Rental Mobil<center></h2>
    <figure class="text-center"> 
        <a href="create_armada.html" type="button" class="btn btn-secondary mt-4 shadow-lg">
            Tambahkan Data Armada
        </a>

        <div class="container table-responsive mt-4">
            <table id="dt" class="table table-hover table-striped pt-2 mb-2 order-column ">
                <thead style="font-size: 12px;" class="ungu">
                    <tr class="size">
                        <th>ID</th>
                        <th style="width: 7%;">Merk</th>
                        <th style="width: 7%;">Jenis</th>
                        <th>Plat Nomor</th>
                        <th style="width: 10%;">Transmisi</th>
                        <th style="width: 12%;">Tgl Pajak</th>
                        <th>Thn Beli</th>
                        <th style="width: 10%;">Harga</th>
                        <th style="width: 9%;">Tersedia</th>
                        <th style="width: 11%;">Bahan Bakar</th>
                        <th style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Selama hasil data ada dari sql  -->

                    <tr class="size2 align-middle">
                        <td>1</td>
                        <td>Suzuki</td>
                        <td>Ertiga</td>
                        <td>AD 11 BH</td>
                        <td>Matic</td>
                        <td>12-12-2020</td>
                        <td>2020</td>
                        <td>Rp.100.000</td>
                        <td>Ya</td>
                        <td>Bensin</td>
                        <td>
                            {{-- <a href="add.php?ubah=<?php echo $hasil['nomor']; ?>" type="button" class="btn btn-primary btn-sm">
                                <i class="ri-pencil-fill"></i>
                            </a>
                            
                            <a href="proses.php?hapus=<?php echo $hasil['nomor']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Are You Sure Want to Delete this List?')">
                                <i class="ri-delete-bin-fill"></i>
                            </a> --}}
                        </td>
                    </tr>

                </tbody>
            </table>
    </figure>
<!-- Table -->
@endsection


@section('bottom_links')
    @include('partials.datatables_bottom_links')
@endsection
