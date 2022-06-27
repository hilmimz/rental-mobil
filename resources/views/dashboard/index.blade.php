@extends('layouts.dashboard')

@section('upper_links')
    @include('partials.datatables_upper_links')
@endsection


@section('content')
    
<!-- Begin Page Content -->
<div class="container-fluid">

    {{-- <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div> --}}

    <!-- Content Row -->
    <div class="row">

        <!-- Data Mobil -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Mobil (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countArmada }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-car fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Mobil Teresdia -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Data Mobil (Tersedia)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countArmadaTersedia }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Booking -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Data Booking</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countBooking }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Pelanggan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Data Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countPelanggan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

</div>

        <!-- Chart transaksi -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Transaksi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="bookingChart"></div> 
                </div>
            </div>
        </div>

    {{-- Status Booking --}}
    <div class="row flex-wrap">

        <!-- Booking aktif -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header-->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">Booking Aktif</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($bookings_aktif as $b)
                            <li class="list-group-item">
                                <a href="{{ route('booking.show', $b->getKey()) }}">
                                    {{ $b->no_invoice}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Booking telat -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header-->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger">Booking Telat</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($bookings_telat as $b)
                            <li class="list-group-item">
                                <a href="{{ route('booking.show', $b->getKey()) }}">
                                    {{ $b->no_invoice}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Booking tidak aktif -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header-->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger">Booking Tidak Aktif</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($bookings_tidak_aktif as $b)
                            <li class="list-group-item">
                                <a href="{{ route('booking.show', $b->getKey()) }}">
                                    {{ $b->no_invoice}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        
    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        {{-- <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Server Migration <span
                            class="float-right">20%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Sales Tracking <span
                            class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Customer Database <span
                            class="float-right">60%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%"
                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Payout Details <span
                            class="float-right">80%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Account Setup <span
                            class="float-right">Complete!</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>


        </div> --}}

        {{-- <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a
                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                        constantly updated collection of beautiful svg images that you can use
                        completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                        unDraw &rarr;</a>
                </div>
            </div>

        </div> --}}
    </div>
</div>
<!-- /.container-fluid -->


@endsection

@section('bottom_links')
    {{-- highcharts --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
    Highcharts.chart('bookingChart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Transaksi Bulanan Rental Mobil'
    },
    subtitle: {
        text: 'Tahun 2022'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        title: {
            text: 'Jumlah Booking'
        }
    },
    series: [{
        name: 'Jumlah Booking',
        data: [
                <?php
                    for ($i = 1; $i <= 12; $i++) {
                        echo "$bookingArr[$i],";
                    }
                ?>
            ]
        }]
    });
    </script>
    //END-Highchart

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- start: JS -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
    <!-- end: JS -->

    {{-- @include('partials.datatables_bottom_links') --}}
@endsection