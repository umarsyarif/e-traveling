@extends('layouts.admin')
<?php
$title = 'Laporan Transaksi';
?>
@section('title', $title)

@push('styles')
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminty\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('daterangepicker\daterangepicker.css') }}">
@endpush

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
                                <div class="row pl-3">
                                    <div class="col-5">
                                        <div class="row">
                                            <span>Tgl. Disetujui: &nbsp;</span>
                                            <div id="acceptedDate"
                                                style="background: #fff; cursor: pointer; padding: 0px 5px 5px 5px; border: 1px solid #ccc;">
                                                <span class="acceptedDateText">Semua</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <span>Tgl. Dibuat: &nbsp;</span>
                                            <div id="createdDate"
                                                style="background: #fff; cursor: pointer; padding: 0px 5px 5px 5px; border: 1px solid #ccc;">
                                                <span class="createdDateText">Semua</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="row">
                                            <form action="{{ route('report.index') }}" method="get">
                                                <input type="hidden" name="acceptedDateStart" class="acceptedDateStart">
                                                <input type="hidden" name="acceptedDateEnd" class="acceptedDateEnd">
                                                <input type="hidden" name="createdDateStart" class="createdDateStart">
                                                <input type="hidden" name="createdDateEnd" class="createdDateEnd">
                                                <button type="submit"
                                                    class="btn btn-primary btn-sm waves-effect waves-light btn-create mr-2">Filter</button>

                                            </form>
                                            <button id="filterReset"
                                                class="btn btn-warning btn-sm waves-effect waves-light btn-create mr-2">Reset</button>
                                            <form action="{{ route('report.orderPDF') }}" method="get">
                                                <input type="hidden" name="acceptedDateStart" class="acceptedDateStart">
                                                <input type="hidden" name="acceptedDateEnd" class="acceptedDateEnd">
                                                <input type="hidden" name="createdDateStart" class="createdDateStart">
                                                <input type="hidden" name="createdDateEnd" class="createdDateEnd">
                                                <button type="submit"
                                                    class="btn btn-success btn-sm waves-effect waves-light btn-create mr-2">Export
                                                    PDF</button>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Wisata</th>
                                                <th>Kustomer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $order->travel->name }}</td>
                                                    <td>{{ $order->user->name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Wisata</th>
                                                <th>Kustomer</th>
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

@push('scripts')
    <!-- data-table js -->
    <script src="{{ asset('adminty\bower_components\datatables.net\js\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminty\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js') }}"></script>
    <!-- form-mask js -->
    <script src="{{ asset('adminty/assets/pages/form-masking/autoNumeric.js') }}"></script>
    <script src="{{ asset('adminty/assets/pages/form-masking/form-mask.js') }}"></script>

    <script src="{{ asset('daterangepicker\moment.min.js') }}"></script>
    <script src="{{ asset('daterangepicker\daterangepicker.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#simpletable').DataTable();
        });

        $(function() {

            var start = '{{ request()->get('acceptedDateStart') ? request()->get('acceptedDateStart') : '' }}';
            var end = '{{ request()->get('acceptedDateEnd') ? request()->get('acceptedDateEnd') : '' }}';

            function cb(start, end) {
                if (start != '' && end != '') {
                    start = moment(start, 'YYYY-MM-DD');
                    end = moment(end, 'YYYY-MM-DD');
                    $('#acceptedDate .acceptedDateText').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'));
                    $('.acceptedDateStart').val(start.format('YYYY-MM-DD'));
                    $('.acceptedDateEnd').val(end.format('YYYY-MM-DD'));
                }
            }

            $('#acceptedDate').daterangepicker({

                ranges: {
                    'Hari ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
                    '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
                    'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

            $('#filterReset').click(() => {
                start = '';
                end = '';
                $('#acceptedDate .acceptedDateText').html('Semua');
                $('.acceptedDateStart').val('');
                $('.acceptedDateEnd').val('');
            })


        });
        $(function() {

            var start = '{{ request()->get('createdDateStart') ? request()->get('createdDateStart') : '' }}';
            var end = '{{ request()->get('createdDateEnd') ? request()->get('createdDateEnd') : '' }}';

            function cb(start, end) {
                if (start != '' && end != '') {
                    start = moment(start, 'YYYY-MM-DD');
                    end = moment(end, 'YYYY-MM-DD');
                    $('#createdDate .createdDateText').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'));
                    $('.createdDateStart').val(start.format('YYYY-MM-DD'));
                    $('.createdDateEnd').val(end.format('YYYY-MM-DD'));
                }
            }

            $('#createdDate').daterangepicker({

                ranges: {
                    'Hari ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
                    '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
                    'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

            $('#filterReset').click(() => {
                start = '';
                end = '';
                $('#createdDate .createdDateText').html('Semua');
                $('.createdDateStart').val('');
                $('.createdDateEnd').val('');
            })


        });
    </script>
@endpush
