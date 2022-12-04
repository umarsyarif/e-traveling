@extends('layouts.admin')
<?php
$title = 'Karyawan';
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
                                </div>
                                <div class="card-header-right">
                                    <button type="button"
                                        class="btn btn-primary btn-sm waves-effect waves-light btn-create mr-2"
                                        data-toggle="modal" data-target="#modal-karyawan">+ Karyawan</button>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employees as $employee)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $employee->name }}</td>
                                                    <td>{{ $employee->email }}</td>
                                                    </td>
                                                    <td>{{ $employee->phone_number ? $employee->phone_number : '—' }}
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-warning btn-change-pw px-2" data-id="{{ $employee->id }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ubah Password">
                                                            <i class="feather icon-unlock mx-auto"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger btn-delete px-2"
                                                            data-id="{{ $employee->id }}" data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Hapus Karyawan">
                                                            <i class="feather icon-trash mx-auto"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
                                                <th>Aksi</th>
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

    {{-- Modal Karyawan --}}
    <div class="modal fade" id="modal-karyawan" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="" action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Karyawan</h4>
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
                            <label for="name">Nama Karyawan</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                required>
                        </div>
                        <div class="form-group form-primary">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                required>
                        </div>
                        <div class="form-group form-primary">
                            <label for="phone_number">Telepon</label>
                            <input type="text" id="phone_number" name="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror"
                                value="{{ old('phone_number') }}">
                        </div>
                        <div class="form-group form-primary row">
                            <div class="col-sm-6">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control autonumber @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    value="{{ old('password_confirmation') }}" required>
                            </div>
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

    {{-- Modal Delete Karyawan --}}
    <div class="modal fade" id="modal-delete-karyawan" tabindex="-1" role="dialog"
        style="z-index: 1050; display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="form-delete-karyawan" action="{{ route('employee.index') }}" method="post">
                @method('DELETE')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi Hapus Karyawan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Apakah anda yakin untuk menghapus karyawan ini?</p>
                        <p><strong>Data yang telah dihapus tidak bisa dikembalikan!</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Change Password --}}
    <div class="modal fade" id="modal-change-password" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-change-password" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        @if($errors->any())
                            <div class="alert alert-warning background-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group form-primary">
                            <input type="password" id="password1" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Baru" value="{{ old('password') }}" required>
                            <span class="form-bar"></span>
                        </div>
                        <div class="form-group form-primary">
                            <input type="password" id="password2" name="password2" class="form-control @error('password2') is-invalid @enderror" placeholder="Konfirmasi Password Baru" value="{{ old('password2') }}" required>
                            <span class="form-bar"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- data-table js -->
    <script src="{{ asset('adminty\bower_components\datatables.net\js\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminty\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js') }}"></script>
    <!-- form-mask js -->
    {{-- <script src="{{ asset('adminty/assets/pages/form-masking/autoNumeric.js') }}"></script> --}}
    {{-- <script src="{{ asset('adminty/assets/pages/form-masking/form-mask.js') }}"></script> --}}
    <script>
        const url = '{{ route('employee.index') }}';
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
            if(password != password2){
                event.preventDefault();
                notify('fas fa-check', 'danger', 'Konfirmasi Password harus sama!');
            }
        });

        $('.btn-delete').click(function() {
            $('#modal-delete-karyawan').modal('show');
            const id = $(this).data('id');
            $('#form-delete-karyawan').attr('action', `${url}/${id}`);
        });

        // show modal if any errors
        @if ($errors->any())
            $('#modal-karyawan').modal('show');
        @endif
        // show success notification on success
        @if ($message = session('success'))
            const message = '{{ $message }}'
            notify('fas fa-check', 'success', message);
        @endif
    </script>
@endpush
