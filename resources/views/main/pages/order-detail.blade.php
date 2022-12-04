@extends('layouts.app')

@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax_window_in" data-parallax="scroll" data-image-src="{{ asset($order->travel->img) }}"
        data-natural-width="1400" data-natural-height="470">
        <div id="sub_content_in">
            <div id="animate_intro">
                <h1>{{ $order->travel->name }}</h1>
                <p>{{ "{$order->travel->start_date->format('d F Y')} - {$order->travel->end_date->format('d F Y')}" }}</p>
            </div>
        </div>
    </section>
    <!-- End section -->
    <!-- End SubHeader ============================================ -->

    <section class="wrapper mb-5">
        <div class="divider_border"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="owl-carousel owl-theme carousel_detail add_bottom_15">
                        {{-- <div class="item"><img src="{{ asset($order->travel->img) }}" style="object-fit: cover"
                                alt="">
                        </div> --}}
                        {{-- <div class="item"><img src="{{ asset('main/img/carousel/carousel_in_2.jpg') }}" alt="">
                        </div>
                        <div class="item"><img src="{{ asset('main/img/carousel/carousel_in_3.jpg') }}" alt="">
                        </div> --}}
                    </div>

                    {{-- <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Overview</a>
                        </li>
                        <li><a href="#tab_2" data-toggle="tab">Reviews</a>
                        </li>
                        <li><a href="#tab_3" data-toggle="tab">Map</a>
                        </li>
                    </ul> --}}

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab_1">
                            <table class="table">
								<tbody>
									<tr>
										<td>Nama Wisata</td>
										<td>{{ $order->travel->name }}</td>
									</tr>
									<tr>
										<td>Tanggal Pelaksanaan</td>
										<td>{{ "{$order->travel->start_date->format('d F Y')} - {$order->travel->end_date->format('d F Y')}" }}</td>
									</tr>
									<tr>
										<td>Tanggal Pemesanan</td>
										<td>{{ $order->created_at->format('d F Y H:i:s') }}</td>
									</tr>
									<tr>
                                        <td>Harga</td>
										<td>{{ $order->travel->price_str }}</td>
									</tr>
                                    <tr>
                                        <td>Status Pemesanan</td>
                                        <td>{{ $order->status }}</td>
                                    </tr>
								</tbody>
							</table>
                            <!-- End row -->

                            <hr>

                            <div class="card text-center">
                                <h5>ID PEMESANAN</h5>
                                <span style="display: flex;justify-content: center;align-items: center; gap: 2px">
                                    <h4 id="order-id">{{ "#{$order->order_code}" }}</h4><a id="copy-id" href="javascript:void(0)" class="fs1 tooltip-1" aria-hidden="true" data-icon="i" data-placement="top" title data-original-title="Copy"></a>
                                </span>
                                @if (!$order->is_accepted)
                                    <p>Silahkan bawa dan tunjukkan ID Pemesanan pada saat pembayaran</p>
                                @else
                                    <p>Pesanan telah diterima, anda telah terdaftar pada wisata ini</p>
                                @endif
                            </div>

                        </div>
                        <!-- End tab_1 -->

                        <div class="tab-pane fade" id="tab_2">

                            {{-- <div id="summary_review">
                                <div class="review_score"><span>8,9</span>
                                </div>
                                <div class="review_score_2">
                                    <h4>Fabulous  <span>(Based on 34 reviews)</span></h4>
                                    <p>
                                        Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam vivendo ne.
                                    </p>
                                </div>
                            </div> --}}
                            <!-- End review summary -->

                            <div class="reviews-container">

                                <div class="review-box clearfix">
                                    <figure class="rev-thumb"><img src="{{ asset('main/img/avatar1.jpg') }}" alt="">
                                    </figure>
                                    <div class="rev-content">
                                        <div class="rating">
                                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                                class="icon-star voted"></i><i class="icon-star voted"></i><i
                                                class="icon-star-empty"></i>
                                        </div>
                                        <div class="rev-info">
                                            Admin – April 03, 2016:
                                        </div>
                                        <div class="rev-text">
                                            <p>
                                                Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar
                                                hendrerit. Cum sociis natoque penatibus et magnis dis
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End review-box -->

                                <div class="review-box clearfix">
                                    <figure class="rev-thumb"><img src="{{ asset('main/img/avatar2.jpg') }}" alt="">
                                    </figure>
                                    <div class="rev-content">
                                        <div class="rating">
                                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                                class="icon-star voted"></i><i class="icon-star voted"></i><i
                                                class="icon-star-empty"></i>
                                        </div>
                                        <div class="rev-info">
                                            Ahsan – April 01, 2016:
                                        </div>
                                        <div class="rev-text">
                                            <p>
                                                Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar
                                                hendrerit. Cum sociis natoque penatibus et magnis dis
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End review-box -->

                                <div class="review-box clearfix">
                                    <figure class="rev-thumb"><img src="{{ asset('main/img/avatar3.jpg') }}" alt="">
                                    </figure>
                                    <div class="rev-content">
                                        <div class="rating">
                                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                                class="icon-star voted"></i><i class="icon-star voted"></i><i
                                                class="icon-star-empty"></i>
                                        </div>
                                        <div class="rev-info">
                                            Sara – March 31, 2016:
                                        </div>
                                        <div class="rev-text">
                                            <p>
                                                Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar
                                                hendrerit. Cum sociis natoque penatibus et magnis dis
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End review-box -->

                            </div>
                            <!-- End review-container -->

                            <hr>

                            <div class="add-review">
                                <h4>Leave a Review</h4>
                                <div id="message-review"></div>
                                <form method="post" action="assets/review.php" id="review" autocomplete="off">
                                    <input type="hidden" id="tour_name_review" name="tour_name_review"
                                        value="General Louvre Tour">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Name *</label>
                                            <input type="text" name="name_review" id="name_review" placeholder=""
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Lastname *</label>
                                            <input type="text" name="lastname_review" id="lastname_review"
                                                placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email *</label>
                                            <input type="email" name="email_review" id="email_review"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Rating </label>
                                            <select name="rating_review" id="rating_review" class="form-control">
                                                <option value="">Select</option>
                                                <option value="1">1 (lowest)</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5 (medium)</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10 (highest)</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Your Review</label>
                                            <textarea name="review_text" id="review_text" class="form-control" style="height:130px;"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Are you human? 3 + 1 =</label>
                                            <input type="text" id="verify_review" class=" form-control"
                                                placeholder="Are you human? 3 + 1 =">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="submit" value="Submit" class="btn_1" id="submit-review">
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- End tab_2 -->

                        <div class="tab-pane fade" id="tab_3">
                            <div id="map"></div>
                            <!-- end map-->

                            <div class="box_map">
                                <i class="icon_set_1_icon-25"></i>
                                <h4>By Train/tube</h4>
                                <p>Per cu esse assentior delicatissimi, qui adipiscing dissentiunt mediocritatem in, dicat
                                    voluptaria no eam. No est alia eloquentiam. Has rebum vulputate adversarium no. Pro cibo
                                    delenit scripserit id.</p>
                            </div>


                            <div class="box_map">
                                <i class="icon_set_1_icon-26"></i>
                                <h4>By bus</h4>
                                <p>Per cu esse assentior delicatissimi, qui adipiscing dissentiunt mediocritatem in, dicat
                                    voluptaria no eam. No est alia eloquentiam. Has rebum vulputate adversarium no. Pro cibo
                                    delenit scripserit id.</p>
                            </div>

                            <div class="box_map">
                                <i class="icon_set_1_icon-21"></i>
                                <h4>By Taxi/cabs</h4>
                                <p>Per cu esse assentior delicatissimi, qui adipiscing dissentiunt mediocritatem in, dicat
                                    voluptaria no eam. No est alia eloquentiam. Has rebum vulputate adversarium no. Pro cibo
                                    delenit scripserit id.</p>
                            </div>

                        </div>
                        <!-- End tab_3 -->
                    </div>
                    <!-- End tabs -->
                </div>
                <!-- End Col -->

                <aside class="col-md-4">
                    <div class="box_style_1">
                        <div class="price">
                            <strong style="font-size: 3rem">{{ $order->travel->price_str }}</strong><br><small>per
                                person</small>
                        </div>
                        <ul class="list_ok">
                            <li>Tiket Pesawat</li>
                            <li>Penginapan</li>
                            <li>Akomodasi</li>
                            <li>Tour Guide</li>
                        </ul>
                    </div>
                    <div class="box_style_2">
                        @auth
                            @if (!$order->travel->is_available && !$order->testimoni)
                                <a href="{{ route('travel.details', ['travel' => $order->travel_id]) }}"><button class="btn_full">Beri Testimoni</button></a>
                            @else
                                <a href="{{ route('travel.details', ['travel' => $order->travel_id]) }}"><button class="btn_full">Lihat Detail Wisata</button></a>
                            @endif
                        @endauth
                        @guest
                            <button type="button" class="btn_full login-button">Login to book</button>
                        @endguest

                    </div>
                </aside>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </section>
    <!-- End section -->
@endsection
@section('import-js')
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('main/js/sidebar_carousel_detail_page_func.js') }}"></script>
    <script>
        $('#copy-id').click(function() {
            // Get the text field
            var copyText = $("#order-id").text();

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.text);
        })
    </script>
@endsection
