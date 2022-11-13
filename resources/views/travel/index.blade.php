@extends('layouts.admin')
<?php
$title = 'Wisata';
?>
@section('title', $title)

@push('styles')
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminty\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css') }}">
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
                                <div class="btn-group" role="group">
                                    <a href="{{ route('travel.index') }}"
                                        class="btn btn-warning {{ Request::get('filter') != '' ? 'btn-outline-warning' : '' }} btn-sm waves-effect waves-light">Semua</a>
                                    <a href="{{ route('travel.index', ['filter' => 'available']) }}"
                                        class="btn btn-success {{ Request::get('filter') != 'available' ? 'btn-outline-success' : '' }} btn-sm waves-effect waves-light">Available</a>
                                    <a href="{{ route('travel.index', ['filter' => 'closed']) }}"
                                        class="btn btn-inverse {{ Request::get('filter') != 'closed' ? 'btn-outline-inverse' : '' }} btn-sm waves-effect waves-light">Closed</a>
                                </div>
                                <div class="card-header-right">
                                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light mr-2"
                                        data-toggle="modal" data-target="#modal-create">+ Wisata</button>
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
                                                    <td>{{ "{$row->start_date->format('d F Y')} - {$row->end_date->format('d F Y')}" }}
                                                    </td>
                                                    <td>{{ $row->price }}</td>
                                                    <td>{{ "{$row->fullfiled_quota}/{$row->quota}" }}</td>
                                                    {{-- <td>{!! Str::limit($row->description, 60, ' ...') !!}</td> --}}
                                                    <td>
                                                        <span class="badge bg-success">{{ $row->status }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('travel.show', $row->id) }}"
                                                            class="btn btn-sm btn-inverse px-2" data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Check Orders">
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

    {{-- Modal Create --}}
    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('travel.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Wisata</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-warning background-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group form-primary">
                            <label for="name">Nama Wisata</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                required>
                        </div>
                        <div class="form-group form-primary row">
                            <div class="col-sm-6">
                                <label for="name">Tanggal Mulai</label>
                                <input type="date" id="start_date" name="start_date"
                                    class="form-control @error('start_date') is-invalid @enderror"
                                    value="{{ old('start_date') }}" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Tanggal Selesai</label>
                                <input type="date" id="end_date" name="end_date"
                                    class="form-control @error('end_date') is-invalid @enderror"
                                    value="{{ old('end_date') }}" required>
                            </div>
                        </div>
                        <div class="form-group form-primary row">
                            <div class="col-sm-6">
                                <label for="name">Harga</label>
                                <input type="text" data-a-sign="Rp. " id="price" name="price"
                                    class="form-control autonumber @error('price') is-invalid @enderror"
                                    value="{{ old('price') }}" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Kuota</label>
                                <input type="number" min="1" id="quota" name="quota"
                                    class="form-control @error('quota') is-invalid @enderror" value="{{ old('quota') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group form-primary">
                            <label for="name">Gambar</label>
                            <input type="file" id="img" name="img"
                                class="form-control @error('img') is-invalid @enderror" value="{{ old('img') }}">
                        </div>
                        <div class="form-group form-primary">
                            <label for="name">Deskripsi</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                value="{{ old('description') }}" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                    </div>
                </div>
            </form>
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
    <script>
        const url = '{{ route('travel.index') }}';
        const csrf = '{{ csrf_token() }}';

        $(document).ready(function() {
            $('#simpletable').DataTable();
        });

        // on change passwd
        $('.btn-change-pw').click(function() {
            $('#modal-change-password').modal('show');
            const id = $(this).data('id');
            $('#form-change-password').attr('action', `${url}/${id}`);
        });
        $('#form-change-password').submit(function(event) {
            const password = $('#password1').val();
            const password2 = $('#password2').val();
            if (password != password2) {
                event.preventDefault();
                notify('fas fa-check', 'danger', 'Konfirmasi Password harus sama!');
            }
        });

        // show modal if any errors
        @if ($errors->any())
            $('#modal-create').modal('show');
        @endif
        // show success notification on success
        @if ($message = session('success'))
            const message = '{{ $message }}'
            notify('fas fa-check', 'success', message);
        @endif
    </script>
@endpush
