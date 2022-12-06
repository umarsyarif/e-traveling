@extends('layouts.app')

@section('import-css')
    <link href="{{ asset('main/layerslider/css/layerslider.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Slider -->
    <div id="full-slider-wrapper">
        <div id="layerslider" style="width:100%;height:600px;">
            <!-- first slide -->
            <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:85;">
                <img src="{{ asset('main/images/1600_667/1.png') }}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top: 45%; left: 50%;"
                    data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                    Lebih dari {{ $travelCount - 1 }} travel tersedia</h3>
                <p class="ls-l slide_typo_2" style="top:55%; left:50%;"
                    data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                    Wisata Alam - Taman Rekreasi - Museum dan Sejarah
                </p>
                <a class="ls-l button_intro_2 outline" style="top:65%; left:50%;white-space: nowrap;"
                    data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href='{{ route('travel.list') }}'>Lihat
                    semua</a>
            </div>
            <!-- second slide -->
            <div class="ls-slide" data-ls="slidedelay:5000; transition2d:103;">
                <img src="{{ asset('main/images/1600_667/2.png') }}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top: 45%; left: 50%;"
                    data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                    Temukan tempat yang fantastis</h3>
                <p class="ls-l slide_typo_2" style="top:55%; left:50%;"
                    data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                    Kami menawarkan berbagai pilihan dan layanan
                </p>
                <a class="ls-l button_intro_2 outline" style="top:65%; left:50%;white-space: nowrap;"
                    data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href='{{ route('travel.list') }}'>Lihat
                    semua</a>
            </div>
            <!-- third slide -->
            <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
                <img src="{{ asset('main/images/1600_667/3.png') }}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top:45%; left: 50%;"
                    data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                    Dapatkan pengalaman yang indah</h3>
                <p class="ls-l slide_typo_2" style="top:55%; left:50%;"
                    data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                    Nikmati berbagai objek wisata dan rekreasi
                </p>
                <a class="ls-l button_intro_2" style="top:65%; left:50%;"
                    data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href='{{ route('travel.list') }}'>lihat
                    semua</a>
            </div>
        </div>
    </div>
    <!-- End layerslider -->

    <section class="wrapper">
        <div class="divider_border"></div>

        <div class="container">
            <div class="main_title">
                <h2>Tur <span>Baru</span> Kami</h2>
                <p>Jelajahi dunia baru. Dapatkan pengalaman dan temukan keindahan tanpa batas. </p>
            </div>

            <div class="row">
                @foreach ($travels as $travel)
                    <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                        <div class="img_wrapper">
                            <div class="ribbon">
                                <span>Popular</span>
                            </div>
                            <div class="price_grid">
                                <sup>Rp. </sup>{{ number_format($travel->price, 2, ',', '.') }}
                            </div>
                            <div class="img_container">
                                <a href="{{ route('travel.details', ['travel' => $travel->id]) }}">
                                    <img src="{{ asset($travel->img) }}" width="800" height="250"
                                        style="object-fit: cover" alt="">
                                    <div class="short_info">
                                        <h3>{{ $travel->name }}</h3>
                                        <em>Duration {{ $travel->duration }} days</em>
                                        <p>
                                            {!! Str::limit($travel->description, 120, ' ...') !!}
                                        </p>
                                        <div class="score_wp">Sisa Kuota
                                            <div class="score">{{ $travel->quota - $travel->fulfilled_quota }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- End img_wrapper -->
                    </div>
                @endforeach
            </div>
            <!-- End row -->

            {{-- <div class="main_title_2">
				<h3>View other <span>popular</span> tours</h3>
				<p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
			</div>
			<div class="row list_tours">
				<div class="col-sm-6">
					<h3>New Tours</h3>
					<ul>
						<li>
							<div>
								<a href="detail-page.html">
									<figure><img src="{{ asset('main/img/thumb_tabs_1.jpg') }}" alt="thumb" class="img-rounded" width="60" height="60">
									</figure>
									<h4>Adipisci voluptatum ea</h4>
									<small>Duration 1hr 20 minutes</small>
									<span class="price_list">$23</span>
								</a>
							</div>
						</li>
						<li>
							<div>
								<a href="detail-page.html">
									<figure><img src="{{ asset('main/img/thumb_tabs_2.jpg') }}" alt="thumb" class="img-rounded" width="60" height="60">
									</figure>
									<h4>Splendide suscipiantur</h4>
									<small>Duration 1hr 20 minutes</small>
									<span class="price_list">$23</span>
								</a>
							</div>
						</li>
						<li>
							<div>
								<a href="detail-page.html">
									<figure><img src="{{ asset('main/img/thumb_tabs_3.jpg') }}" alt="thumb" class="img-rounded" width="60" height="60">
									</figure>
									<h4>Vide omnium perpetua</h4>
									<small>Duration 1hr 20 minutes</small>
									<span class="price_list">$23</span>
								</a>
							</div>
						</li>
					</ul>
				</div>

				<div class="col-sm-6">
					<h3>Special offers</h3>
					<ul>
						<li>
							<div>
								<a href="detail-page.html">
									<figure><img src="{{ asset('main/img/thumb_tabs_4.jpg') }}" alt="thumb" class="img-rounded" width="60" height="60">
									</figure>
									<h4>Quo quidam vidisse</h4>
									<small>Duration 1hr 20 minutes</small>
									<span class="price_list"><em>$23</em>$19</span>
								</a>
							</div>
						</li>
						<li>
							<div>
								<a href="detail-page.html">
									<figure><img src="{{ asset('main/img/thumb_tabs_5.jpg') }}" alt="thumb" class="img-rounded" width="60" height="60">
									</figure>
									<h4>Integre alterum</h4>
									<small>Duration 1hr 20 minutes</small>
									<span class="price_list"><em>$23</em>$19</span>
								</a>
							</div>
						</li>
						<li>
							<div>
								<a href="detail-page.html">
									<figure><img src="{{ asset('main/img/thumb_tabs_6.jpg') }}" alt="thumb" class="img-rounded" width="60" height="60">
									</figure>
									<h4>Tation mollis appetere</h4>
									<small>Duration 1hr 20 minutes</small>
									<span class="price_list"><em>$23</em>$19</span>
								</a>
							</div>
						</li>
					</ul>
				</div>

			</div>
			<!-- End row --> --}}
            @if ($travelCount > 0)
                <p class="text-center add_bottom_45">
                    <a href="{{ route('travel.list') }}"><button class="btn_1">Lihat semua
                            ({{ $travelCount }})</button></a>
                </p>
            @endif

        </div>
    </section>
    <!-- End section -->

    <section class="container margin_60">
        <div class="main_title">
            <h3>Mengapa BesTours</h3>
            {{-- <p></p> --}}
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="box_how">
                    <div class="icon_how"><span class="icon_set_1_icon-81"></span>
                    </div>

                    <h4>Layanan Terbaik</h4>
                    <p>BesTours merupakan salah satu agen travel terbaik yang memberikan pelayanan terbaik serta pengalaman
                        tak terlupakan.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box_how">
                    <div class="icon_how"><span class="icon_set_1_icon-94"></span>
                    </div>
                    <h4>Staf Tur Profesional</h4>
                    <p>Kami memiliki staf yang berpengalaman dan siap melayani anda mulai dari
                        rekomendasi perjalanan, informasi destinasi hingga reservasi.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box_how">
                    <div class="icon_how"><span class="icon_set_1_icon-92"></span>
                    </div>
                    <h4>Penawaran Terbaik</h4>
                    <p>Dapatkan penawaran terbaik untuk paket liburan ke berbagai tempat impian Anda. Perjalanan yang indah
                        dan hemat!</p>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </section>
    <!-- End Container -->

    <section class="promo_full">
        <div class="promo_full_wp">
            <div>
                <h3>Testimoni<span>Dari mereka yang telah mempercayai kami.</span></h3>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="owl-carousel owl-theme carousel_testimonials">
                                @foreach ($reviews as $review)
                                    <div>
                                        <div class="box_overlay" style="min-height: 128px">
                                            <div class="pic">
                                                <figure><img src="{{ asset('main/img/testimonial_1.jpg') }}" alt=""
                                                        class="img-circle">
                                                </figure>
                                                <h4>{{ $review->user->name }}<small>12 October 2015</small></h4>
                                            </div>
                                            <div class="comment"
                                                style="margin: 0;
											position: absolute;
											top: 50%;
											-ms-transform: translateY(-50%);
											transform: translateY(-50%);">
                                                "{{ $review->testimoni }}"
                                            </div>
                                        </div>
                                        <!-- End box_overlay -->
                                    </div>
                                @endforeach

                            </div>
                            <!-- End carousel_testimonials -->
                        </div>
                        <!-- End col-md-8 -->
                    </div>
                    <!-- End row -->
                </div>
                <!-- End container -->
            </div>
            <!-- End promo_full_wp -->
        </div>
        <!-- End promo_full -->
    </section>
    <!-- End section -->
@endsection

@section('custom-js')
    <script src="{{ asset('main/layerslider/js/greensock.js') }}"></script>
    <script src="{{ asset('main/layerslider/js/layerslider.transitions.js') }}"></script>
    <script src="{{ asset('main/layerslider/js/layerslider.kreaturamedia.jquery.js') }}"></script>

    <script type="text/javascript">
        'use strict';

        $('#layerslider').layerSlider({
            autoStart: true,
            navButtons: false,
            navStartStop: false,
            showCircleTimer: false,
            responsive: true,
            responsiveUnder: 1280,
            layersContainer: 1200,
            skinsPath: 'main/layerslider/skins/'
            // Please make sure that you didn't forget to add a comma to the line endings
            // except the last line!
        });
    </script>
@endsection
