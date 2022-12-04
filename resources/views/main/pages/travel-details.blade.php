@extends('layouts.app')

@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax_window_in" data-parallax="scroll" data-image-src="{{ asset($travel->img) }}"
        data-natural-width="1400" data-natural-height="470">
        <div id="sub_content_in">
            <div id="animate_intro">
                <h1>{{ $travel->name }}</h1>
                <p>{{ "{$travel->start_date->format('d F Y')} - {$travel->end_date->format('d F Y')}" }}</p>
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
                        <div class="item"><img src="{{ asset('main/img/carousel/carousel_in_1.jpg') }}" alt="">
                        </div>
                        <div class="item"><img src="{{ asset('main/img/carousel/carousel_in_2.jpg') }}" alt="">
                        </div>
                        <div class="item"><img src="{{ asset('main/img/carousel/carousel_in_3.jpg') }}" alt="">
                        </div>
                    </div>

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Overview</a>
                        </li>
                        <li><a href="#tab_2" data-toggle="tab">Reviews</a>
                        </li>
                        <li><a href="#tab_3" data-toggle="tab">Map</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab_1">

                            <p>
                                {!! $travel->description !!}
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="feature-box">
                                        <div class="feature-box-icon">
                                            <i class="icon-ok-4"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4>Invenire voluptatum</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, ei per elitr persecuti adipiscing, ne discere
                                                temporibus nam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="feature-box">
                                        <div class="feature-box-icon">
                                            <i class="icon-ok-4"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4>Nec ludus repudiare</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, ei per elitr persecuti adipiscing, ne discere
                                                temporibus nam.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End col -->

                                <div class="col-md-6">
                                    <div class="feature-box">
                                        <div class="feature-box-icon">
                                            <i class="icon-ok-4"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4>Vix agam fabellas</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, ei per elitr persecuti adipiscing, ne discere
                                                temporibus nam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="feature-box">
                                        <div class="feature-box-icon">
                                            <i class="icon-ok-4"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4>Sea laoreet pericula</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, ei per elitr persecuti adipiscing, ne discere
                                                temporibus nam.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End col -->
                            </div>
                            <!-- End row -->

                            <hr>

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
                                @foreach ($reviews as $item)
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
                                                {{$item->user->name == Auth::user()->name ? 'You' : $item->user->name}} – {{$item->updated_at->format('d F Y H:i')}}
                                            </div>
                                            <div class="rev-text">
                                                <p>
                                                    {{$item->testimoni}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End review-box -->
                                @endforeach
                                @if (!$reviews->count())
                                    <span>Belum ada review</span>
                                @endif
                            </div>
                            <!-- End review-container -->

                            <hr>
                            @if ($isOrdered && !$reviews->pluck('user.name')->contains(Auth::user()->name))
                                <div class="add-review">
                                    <h4>Leave a Review</h4>
                                    <div id="message-review"></div>
                                    <form method="post" action="assets/review.php" id="review" autocomplete="off">
                                        <input type="hidden" id="tour_name_review" name="tour_name_review"
                                            value="General Louvre Tour">
                                        <div class="row">
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
                            @endif

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
                            <strong>{{ $travel->price_str }}</strong><small>per person</small>
                        </div>
                        <ul class="list_ok">
                            <li>Tiket Pesawat</li>
                            <li>Penginapan</li>
                            <li>Akomodasi</li>
                            <li>Tour Guide</li>
                        </ul>
                    </div>
                    <div class="box_style_2">
                        <h3>Book Your Tour<span>Free service - Confirmed immediately</span></h3>
                        <div id="message-booking"></div>
                        @auth
                            @if ($isOrdered)
                                <a href="{{ route('order.orderDetail', ['order' => $order->id]) }}"><button class="btn_full">Detail Order</button></a>
                            @else
                                <form method="post" action="{{ route('order.store', ['travel' => $travel->id]) }}">
                                    @csrf
                                    <input type="hidden" id="travel_id" name="travel_id" value="{{ $travel->id }}">
                                    <div class="form-group">
                                        <input type="submit" value="Book now" class="btn_full" id="submit-booking"
                                            {{ $isOrdered ? 'disabled' : '' }}>
                                    </div>

                                </form>
                            @endif
                        @endauth
                        @guest
                            <button type="button" class="btn_full login-button">Login to book</button>
                        @endguest
                        <hr>
                        <a href="#0" class="btn_outline"> or Contact us</a>
                        <a href="tel://004542344599" id="phone_2"><i class="icon_set_1_icon-91"></i>+45 423 445 99</a>

                    </div>
                </aside>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </section>
    <!-- End section -->
@endsection
