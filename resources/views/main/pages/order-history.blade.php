@extends('layouts.app')

@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax_window_in" data-parallax="scroll"
        data-image-src="{{ asset('main/img/sub_header_list_museum.jpg') }}" data-natural-width="1400"
        data-natural-height="470">
        <div id="sub_content_in">
            <div id="animate_intro">
                <h1>Travel Tours</h1>
                <p>"Usu habeo equidem sanctus no ex melius labitur conceptam eos"</p>
            </div>
        </div>
    </section>
    <!-- End section -->
    <!-- End SubHeader ============================================ -->

    <section class="wrapper">
        <div class="divider_border_gray"></div>
        <div id="filters" class="clearfix">
            <div id="sort_filters">
                <select name="orderby" class="selectbox">
                    <option value="popularity">Sort by Popularity</option>
                    <option value="rating">Sort by Average Rating</option>
                    <option value="date" selected='selected'>Sort by Newness</option>
                    <option value="price">Sort by Price: Low to High</option>
                    <option value="price-desc">Sort by Price: High to Low</option>
                </select>
            </div>
            <div id="view_change">
                <a href="grid.html" class="grid_bt"></a>
                <a href="list.html" class="list_bt"></a>
            </div>
        </div>
        <!-- End filters -->


        <div class="container">
            @foreach ($orders as $order)
                <div class="row strip_list wow fadeIn animated" data-wow-delay="0.2s">
                    <div class="col-md-3">
                        <div class="img_wrapper">
                            <div class="price_grid">
                                <sup>Rp. </sup>{{ number_format($order->travel->price, 2, ',', '.') }}
                            </div>
                            <div class="img_container">
                                <a href="detail-page.html">
                                    <img src="{{ asset($order->travel->img) }}" width="400" class="img-responsive"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <!-- End img_wrapper -->
                    </div>
                    <div class="col-md-9">
                        <h3>{{ $order->travel->name }}</h3>
                        <p>{{ $order->travel->description }}</p>
                        </p>
                        <p><a href="detail-page.html" class="btn_1">Detail Order</a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- End container -->
    </section>
    <!-- End section -->
@endsection
