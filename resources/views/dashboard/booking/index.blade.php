@extends('layouts.dashboard')

@section('upper_links')
    @include('partials.datatables_upper_links')
@endsection


@section('content')

@if(session()->has('success_create'))
    <div class="alert alert-success mt-3" role="alert">{{ session('success_create') }}</div>
@elseif(session()->has('success_edit'))
    <div class="alert alert-success mt-3" role="alert">{{ session('success_edit') }}</div>
@elseif(session()->has('success_remove'))
    <div class="alert alert-success mt-3" role="alert">{{ session('success_remove') }}</div>
@endif

<!-- Table  -->
<div>
    <!-- Typography -->
    <h2 class="mt-3"><center>Data Booking Rental Mobil<center></h2>
    <figure class="text-center"> 
        <a href="{{ route('booking.create') }}" type="button" class="btn btn-secondary mt-4 shadow-lg mb-3">
            Tambahkan Data Booking
        </a>

        

        
        <div class="d-flex flex-column justify-content-center">
            <p class="mx-2 mt-4">Lihat berdasarkan rentang waktu: </p> 
            <form action="booking" method="GET">
                {{-- @csrf --}}
                {{-- @method('POST') --}}
                <div class="d-flex justify-content-center">
                    <label class="col-form-label" for="from_date">Dari (YYYY-MM-DD):</label>
                    <input type="text" class="form-control me-3 ms-2 align-content-lg-center " name="from_date" placeholder="e.g. 2001-01-01" style="width:140px"
                        value="{{ $from_date }}">
                        {{-- @dd($request); --}}
                    <label class="col-form-label"  for="to_date">Sampai (YYYY-MM-DD):</label>
                    <input type="text" class="form-control  me-3 ms-2" name="to_date" placeholder="e.g. 2010-02-03" style="width:140px"
                        value="{{ $to_date }}">
                        <div>
                            <button type="submit" class="btn btn-primary col-form-label">Cari</button>
                        </div>
                        
                </div>
                
            </form>
        </div>
        <div class="mb-2">
            <a href="/exportpdf" type="button" class="btn btn-danger mt-4 shadow-lg">
                Export PDF
            </a>
            <a href="/exportexcel" type="button" class="btn btn-success mt-4 shadow-lg">
                Export Excel
            </a>
        </div>


        <div class="container table-responsive mt-4">
            <table id="dt" class="table table-hover pt-2 mb-2 order-column ">
                <thead style="font-size: 12px;" class="ungu">
                    <tr class="size">
                        <th>#</th>
                        <th>No Invoice</th>
                        <th>Nama Pelanggan</th>
                        <th>Tgl Transaksi</th>
                        {{-- <th>Armada</th> --}}
                        <th>Harga Total</th>
                        <th>Sisa pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Status Pengembalian</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($bookings as $booking)
                        <tr class="size2 align-middle">
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $booking->no_invoice }}</td>
                            <td>{{ $booking->pelanggan->nama }}</td>
                            <td>{{ $booking->tgl_transaksi }}</td>
                            <td>{{ $booking->harga_total}}</td>
                            <td>{{ $booking->sisa_pembayaran}}</td>
                            <td>{{ $booking->status_pembayaran}}</td>
                            <td>{{ $booking->status_pengembalian}}</td>
                            <td>{{ $booking->status}}</td>
                            <td>{{ $booking->keterangan }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    @can('superadmin')
                                        <a href="{{ route('booking.edit', $booking->id) }}" type="button" class="btn btn-primary btn-sm">
                                            <i class="ri-pencil-fill "></i>
                                        </a>
                                    @endcan
                                        <a href="{{ route('booking.show', $booking->id) }}" type="button" class="btn btn-info btn-sm">
                                            <i class="ri-eye-line "></i>
                                        </a>
                                    @can('superadmin')
                                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                onClick="return confirm('Deleting this item possibily will also delete related Pembayaran, BookingArmada, and Pengembalian item. Are you sure you want to delete this item? ')">
                                            <i class="ri-delete-bin-fill"></i>
                                        </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach 

                </tbody>
            </table>
    </figure>
<!-- Table -->
@endsection


@section('bottom_links')
    @include('partials.datatables_bottom_links')
@endsection