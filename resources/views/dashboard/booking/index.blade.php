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
        <a href="{{ route('booking.create') }}" type="button" class="btn btn-secondary mt-4 shadow-lg">
            Tambahkan Data Booking
        </a>

        <div class="container table-responsive mt-4">
            <table id="dt" class="table table-hover table-striped pt-2 mb-2 order-column ">
                <thead style="font-size: 12px;" class="ungu">
                    <tr class="size">
                        <th>#</th>
                        <th>No Invoice</th>
                        <th>Nama Pelanggan</th>
                        <th>Tgl Transkasi</th>
                        <th>Harga Total</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Selama hasil data ada dari sql  -->
                    @foreach($bookings as $booking)
                    <tr class="size2 align-middle">
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $booking->no_invoice }}</td>
                        <td>{{ $booking->pelanggan->nama }}</td>
                        <td>{{ $booking->tgl_transaksi }}</td>
                        <td>{{ $booking->harga_total}}</td>
                        <td>{{ $booking->status}}</td>
                        <td>{{ $booking->keterangan }}</td>
                        <td>

                            <div class="d-flex justify-content-around">
                                <a href="{{ route('booking.edit', $booking->id) }}" type="button" class="btn btn-primary btn-sm">
                                    <i class="ri-pencil-fill "></i>
                                </a>
                                <a href="{{ route('booking.show', $booking->id) }}" type="button" class="btn btn-info btn-sm">
                                    <i class="ri-eye-line "></i>
                                </a>
                                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST">
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
<!-- Table -->
@endsection


@section('bottom_links')
    @include('partials.datatables_bottom_links')
@endsection