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
            <div id="sort_filters">
                <select id="orderBy" name="orderby" class="selectbox">
                    <option value="terbaru" {{ $filter == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                    <option value="terlama" {{ $filter == 'terlama' ? 'selected' : '' }}>Terlama
                    </option>
                </select>
            </div>
            <div id="view_change">
                <a href="{{ route('travel.list') }}"><strong>PESAN BARU</strong></a>
            </div>
        </div>

        <!-- End filters -->


        <div class="container">
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
                        <p><a href="{{ route('order.orderDetail', ['order' => $order->id]) }}"><button class="btn_1">Detail
                                    Order</button></a>
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
@endsection

@section('custom-js')
    <script>
        const url = '{{ route('order.history') }}';

        $('#orderBy').change(function() {
            var filter = this.value;
            if (filter != undefined && filter != null) {
                console.log(filter);
                window.location = `${url}?filter=${filter}`;
            }
        });
    </script>
@endsection
