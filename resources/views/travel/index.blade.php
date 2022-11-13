@extends('layouts.admin')
<?php
$title = 'Wisata';
?>
@section('title', $title)

@section('content')
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>{{ $title }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="#"> <i class="feather icon-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="btn-group" role="group">
                                <a href="{{ route('travel.index') }}" class="btn btn-warning {{ Request::get('filter') != "" ? "btn-outline-warning" : "" }} btn-sm waves-effect waves-light">Semua</a>
                                <a href="{{ route('travel.index', ['filter' => 'available']) }}" class="btn btn-success {{ Request::get('filter') != "available" ? "btn-outline-success" : "" }} btn-sm waves-effect waves-light">Available</a>
                                <a href="{{ route('travel.index', ['filter' => 'closed']) }}" class="btn btn-inverse {{ Request::get('filter') != "closed" ? "btn-outline-inverse" : "" }} btn-sm waves-effect waves-light">Closed</a>
                            </div>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Harga</th>
                                            <th>Kuota</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($travels as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ "{$row->start_date->format('d F Y')} - {$row->end_date->format('d F Y')}" }}</td>
                                                <td>{{ $row->price }}</td>
                                                <td>{{ "{$row->fullfiled_quota}/{$row->quota}" }}</td>
                                                {{-- <td>{!! Str::limit($row->description, 60, ' ...') !!}</td> --}}
                                                <td>
                                                    <span class="badge bg-success">{{ $row->status }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('travel.show', $row->id) }}" class="btn btn-sm btn-inverse px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Check Orders">
                                                        <i class="feather icon-info mx-auto"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Harga</th>
                                            <th>Kuota</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
