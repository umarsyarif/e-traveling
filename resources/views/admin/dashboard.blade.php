@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">

                <!-- statustic-card start -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-c-yellow text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col">
                                    <p class="m-b-5">{{ $statistic[0]['title'] }}</p>
                                    <h4 class="m-b-0">{{ $statistic[0]['count'] }}</h4>
                                </div>
                                <div class="col col-auto text-right">
                                    <i class="feather icon-user f-50 text-c-yellow"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-c-green text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col">
                                    <p class="m-b-5">{{ $statistic[1]['title'] }}</p>
                                    <h4 class="m-b-0">{{ $statistic[1]['count'] }}</h4>
                                </div>
                                <div class="col col-auto text-right">
                                    <i class="feather icon-map f-50 text-c-green"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-c-pink text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col">
                                    <p class="m-b-5">{{ $statistic[2]['title'] }}</p>
                                    <h4 class="m-b-0">{{ $statistic[2]['count'] }}</h4>
                                </div>
                                <div class="col col-auto text-right">
                                    <i class="feather icon-book f-50 text-c-pink"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-c-blue text-white">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col">
                                    <p class="m-b-5">{{ $statistic[3]['title'] }}</p>
                                    <h4 class="m-b-0">{{ $statistic[3]['count'] }}</h4>
                                </div>
                                <div class="col col-auto text-right">
                                    <i class="feather icon-shopping-cart f-50 text-c-blue"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- statustic-card start -->

                <!-- ticket and update start -->
                <div class="col-xl-6 col-md-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>Wisata Mendatang</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                    <li><i class="fa fa-trash close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Nama Wisata</th>
                                            <th>Kuota</th>
                                            <th>Pelaksanaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($incomingTravels as $item)
                                            <tr>
                                                <td>
                                                    <label class="label label-{{ $item->status == 'Full' ? 'warning' : ($item->status == 'Available' ? 'success' : 'inverse') }}">{{ $item->status }}</label>
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ "{$item->fulfilled_quota}/{$item->quota}" }}</td>
                                                <td>{{ $item->start_date->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-right m-r-20">
                                    <a href="{{ route('travel.index') }}" class=" b-b-primary text-primary">Lihat semua wisata</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="card feed-card">
                        <div class="card-header">
                            <h5>Pesanan Baru</h5>
                        </div>
                        <div class="card-block">
                            @foreach ($newOrders as $item)
                                <div class="row m-b-30">
                                    <div class="col-auto p-r-0">
                                        <i class="feather icon-shopping-cart bg-simple-c-blue feed-icon"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="m-b-5">{{ $item->user->name }} memesan wisata {{ $item->travel->name }} <span class="text-muted f-right f-13">{{ $item->created_at->diffForHumans() }}</span></h6>
                                    </div>
                                </div>
                            @endforeach
                            @if (!$newOrders->count())
                                <span class="text-muted f-13">Tidak ada pesanan baru</span>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- statustic-card start -->
        </div>
    </div>
</div>

@endsection
