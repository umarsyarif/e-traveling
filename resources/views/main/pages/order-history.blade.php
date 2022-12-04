@extends('layouts.app')

@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax_window_in" data-parallax="scroll"
        data-image-src="{{ asset('main/images/heshan-perera-aIJa8dPdzRI-unsplash.jpg') }}" data-natural-width="1400"
        data-natural-height="470">
        <div id="sub_content_in">
            <div id="animate_intro">
                <h1>Riwayat Order</h1>
                <p>Semua order travel kamu tercatat disini</p>
            </div>
        </div>
    </section>
    <!-- End section -->
    <!-- End SubHeader ============================================ -->

    <section class="wrapper">
        <div class="divider_border_gray"></div>
        <div id="filters" class="clearfix">
            <div id="view_change">
                <a href="{{ route('travel.list') }}"><strong>PESAN BARU</strong></a>
            </div>
        </div>

        <!-- End filters -->


        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            @foreach ($orders as $order)
                <div class="row strip_list wow fadeIn animated" data-wow-delay="0.2s">
                    <div class="col-md-3" style="padding-top: 20px">
                        <div class="img_wrapper">
                            <div class="price_grid">
                                <sup>Rp. </sup>{{ number_format($order->travel->price, 2, ',', '.') }}
                            </div>
                            <div class="img_container">
                                <a href="{{ route('order.orderDetail', ['order' => $order->id]) }}">
                                    <img src="{{ asset($order->travel->img) }}" width="400" height="150"
                                        style="object-fit: cover" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- End img_wrapper -->
                    </div>
                    <div class="col-md-9">
                        <h3>{{ $order->travel->name }}</h3>
                        <p>{{ $order->travel->description }}</p>
                        </p>
                        @empty(!$order->testimoni)
                            <p><strong>Testimoni anda:</strong> <em>{{ $order->testimoni }}</em></p>
                        @endempty
                        <p><a href="{{ route('order.orderDetail', ['order' => $order->id]) }}"><button class="btn_1">Detail
                                    Order</button></a>
                            @if ($order->testimoni == null && $order->is_accepted == 1)
                                <button class="btn_1" data-toggle="modal" data-target="#testimonialModal"
                                    data-id="{{ $order->id }}">Beri Testimoni</button>
                            @endempty
                    </p>
                </div>
            </div>
        @endforeach

        <nav class="pagination-wrapper">
            <ul class="pagination">
                {{ $orders->links() }}
            </ul>
        </nav>
        <!-- End pagination -->

    </div>
    <!-- End container -->
</section>
<!-- End section -->
{{-- Testimoni Modal --}}
<div class="modal fade" id="testimonialModal" tabindex="-1" role="dialog" aria-labelledby="testimonialModalLabel"
    aria-hidden="true" style="padding-top: 10rem">
    <div class="modal-dialog-centered modal-dialog" style="width: 400px;" role="document">
        <div class="box_style_2 pb-5">
            <form method="POST" action="{{ route('order.testimonialUpdate') }}" autocomplete="off">
                @csrf
                <input type="hidden" name="id">
                <div class="form-group">
                    {{-- <label>Password</label> --}}
                    <textarea class="form-control" style="resize:vertical" id="testimoni" name="testimoni" placeholder="Testimoni anda..."></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn_full" id="testimonial-button">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
<script>
    $('#testimonialModal').on('show.bs.modal', function(e) {

        //get data-id attribute of the clicked element
        var id = $(e.relatedTarget).data('id');

        //populate the textbox
        $(e.currentTarget).find('input[name="id"]').val(id);

    });
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert").alert('close');
        }, 3000);
    });
</script>
@endsection
