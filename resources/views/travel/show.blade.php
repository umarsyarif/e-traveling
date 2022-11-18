@extends('layouts.admin')
<?php
$title = $travel->name;
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
                                <li class="breadcrumb-item">
                                    <a href="{{ route('travel.index') }}"> Wisata</i> </a>
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
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Detail Wisata</h5>
                                <span>Detail informasi wisata dan pesanan</span>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="feather icon-maximize full-card"></i></li>
                                        <li><i class="feather icon-minus minimize-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="form-group form-primary">
                                    <label for="name">Nama Wisata</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ $travel->name }}"
                                        required>
                                </div>
                                <div class="form-group form-primary row">
                                    <div class="col-sm-6">
                                        <label for="name">Tanggal Mulai</label>
                                        <input type="date" id="start_date" name="start_date"
                                            class="form-control @error('start_date') is-invalid @enderror"
                                            value="{{ $travel->start_date }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name">Tanggal Selesai</label>
                                        <input type="date" id="end_date" name="end_date"
                                            class="form-control @error('end_date') is-invalid @enderror"
                                            value="{{ $travel->end_date }}" required>
                                    </div>
                                </div>
                                <div class="form-group form-primary row">
                                    <div class="col-sm-6">
                                        <label for="name">Harga</label>
                                        <input type="text" data-a-sign="Rp. " id="price" name="price"
                                            class="form-control autonumber @error('price') is-invalid @enderror"
                                            value="{{ $travel->price }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name">Kuota</label>
                                        <input type="number" min="1" id="quota" name="quota"
                                            class="form-control @error('quota') is-invalid @enderror" value="{{ $travel->quota }}"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <label for="name">Gambar</label>
                                    <input type="file" id="img" name="img"
                                        class="form-control @error('img') is-invalid @enderror" value="{{ $travel->img }}">
                                </div>
                                <div class="form-group form-primary">
                                    <label for="name">Deskripsi</label>
                                    <textarea id="description" name="description"
                                        class="form-control @error('description') is-invalid @enderror" required>{{ $travel->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Pesanan</h5>
                                <span>Detail informasi wisata dan pesanan</span>
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
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $row->user->name }}</td>
                                                    <td>{{ $row->created_at->format('d F Y') }}</td>
                                                    <td>
                                                        <span
                                                            class="badge bg-{{ !$row->is_accepted ? 'warning' : 'success' }}">{{ $row->status }}</span>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-inverse btn-update-order px-2"
                                                            data-id="{{ $row->id }}"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            data-original-title="Accept Order">
                                                            <i class="feather icon-info mx-auto"></i>
                                                    </button>
                                                        {{-- <button class="btn btn-sm btn-warning btn-edit px-2" data-id="{{ $row->id }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="feather icon-unlock mx-auto"></i>
                                                        </button> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
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

    {{-- Modal Update Order --}}
    <div class="modal fade" id="modal-update-order" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="form-update-order" action="{{ route('order.index') }}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi Pesanan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin untuk mengkonfirmasi pesanan ini?</p>
                        <input type="hidden" name="is_accepted" value="1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Confirm</button>
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
        const urlTravel = '{{ route('travel.index') }}';
        const urlOrder = '{{ route('order.index') }}';
        const csrf = '{{ csrf_token() }}';

        $(document).ready(function() {
            $('#simpletable').DataTable();
        });

        $('.btn-update-order').click(function () {
            $('#modal-update-order').modal('show');
            const id = $(this).data('id');
            $('#form-update-order').attr('action', `${urlOrder}/${id}`);
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
