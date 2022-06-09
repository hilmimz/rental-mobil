@extends('layouts.dashboard')

@section('upper_links')
    @include('partials.datatables_upper_links')
@endsection

@section('content')
    
<!-- Begin Page Content -->
<div>
    <!-- Typography -->
    <h2 class="mt-3"><center>Data Armada Rental Mobil<center></h2>
    <figure class="text-center"> 
        <a href="{{ route('pelanggan.create') }}" type="button" class="btn btn-secondary mt-4 shadow-lg">
            Tambahkan Data Pelanggan
        </a>

        <div class="container table-responsive mt-4">
            <table id="dt" class="table table-hover table-striped pt-2 mb-2 order-column ">
                <thead style="font-size: 12px;" class="ungu">
                    <tr class="size">
                        <th>ID</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th style="width:11%;">Gender</th>
                        <th style="width:14%;">Tgl Lahir</th>
                        <th style="width:15%;">Alamat</th>
                        <th>No Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Selama hasil data ada dari sql  -->
                    
                    @foreach($pelanggans as $pelanggan)
                    <tr class="size2 align-middle">
                        <td>{{ $pelanggan->id }}</td>
                        <td>{{ $pelanggan->nik }}</td>
                        <td>{{ $pelanggan->nama }}</td>
                        <td>{{ $pelanggan->jenis_kelamin }}</td>
                        <td>{{ $pelanggan->tgl_lahir }}</td>
                        <td>{{ $pelanggan->alamat }}</td>
                        <td>{{ $pelanggan->no_telepon }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" type="button" class="btn btn-primary btn-sm">
                                    <i class="ri-pencil-fill "></i>
                                </a>
                                <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onClick="return confirm('Are You Sure Want to Delete this List?')">
                                        <i class="ri-delete-bin-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
    </figure>
<!-- /.container-fluid -->

@endsection

@section('bottom_links')
    @include('partials.datatables_bottom_links')
@endsection