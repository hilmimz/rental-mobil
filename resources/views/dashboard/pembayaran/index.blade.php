@extends('layouts.dashboard')

@section('upper_links')
    @include('partials.datatables_upper_links')
@endsection

@section('content')
<!-- Table  -->
<div>
    <!-- Typography -->
    <h2 class="mt-3"><center>Data Pembayaran Rental Mobil<center></h2>
    <figure class="text-center"> 
        <a href="{{ route('pembayaran.create') }}" type="button" class="btn btn-secondary mt-4 shadow-lg">
            Tambahkan Data Pembayaran
        </a>

        <div class="container table-responsive mt-4">
            <table id="dt" class="table table-hover table-striped pt-2 mb-2 order-column ">
                <thead style="font-size: 12px;" class="ungu">
                    <tr class="size">
                        <th>ID</th>
                        <th>Booking ID</th>
                        <th>Tgl Pembayaran</th>
                        <th>Jumlah Bayar</th>
                        <th>Cara Pembayaran</th>
                        <th>Tipe Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Selama hasil data ada dari sql  -->
                    
                    @foreach($pembayarans as $pembayaran)
                    <tr class="size2 align-middle">
                        <td>{{ $pembayaran->id }}</td>
                        <td>{{ $pembayaran->booking_id }}</td>
                        <td>{{ $pembayaran->tgl_pembayaran }}</td>
                        <td>{{ $pembayaran->jumlah_bayar }}</td>
                        <td>{{ $pembayaran->cara_pembayaran }}</td>
                        <td>{{ $pembayaran->tipe_pembayaran }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('pembayaran.edit', $pembayaran->id) }}" type="button" class="btn btn-primary btn-sm">
                                    <i class="ri-pencil-fill "></i>
                                </a>
                                <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST">
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
