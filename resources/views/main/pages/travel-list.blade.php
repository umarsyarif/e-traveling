@extends('layouts.app')

@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax_window_in" data-parallax="scroll" data-image-src="{{ asset('main/images/bg-2.jpg') }}"
        data-natural-width="1400" data-natural-height="470">
        <div id="sub_content_in">
            <div id="animate_intro">
                <h1>Pilihan Wisata</h1>
                <p>Pilihan wisata terbaik untuk kenangan pengalaman terindah</p>
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
            <div class="row">

                @foreach ($travels as $row)
                    <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                        <div class="img_wrapper">
                            <div class="ribbon">
                                <span>Popular</span>
                            </div>
                            <div class="price_grid">
                                <sup>Rp</sup>{{ $row->price }}
                            </div>
                            <div class="img_container">
                                <a href="{{ route('travel.details', ['travel' => $row->id]) }}">
                                    <img src="{{ asset($row->img) }}" width="800" height="200"
                                        style="object-fit: cover">
                                    <div class="short_info">
                                        <h3>{{ $row->name }}</h3>
                                        <em>Duration {{ $row->duration }} days</em>
                                        <p>
                                            {!! Str::limit($row->description, 120, ' ...') !!}
                                        </p>
                                        <div class="score_wp">Kuota
                                            <div class="score">{{ $row->quota }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- End img_wrapper -->
                    </div>
                    <!-- End col -->
                @endforeach

                <nav class="pagination-wrapper">
                    <ul class="pagination">
                        {{ $travels->links() }}
                        {{-- <li><a href="#">1</a>
						</li>
						<li><a href="#">2</a>
						</li>
						<li><a href="#">3</a>
						</li>
						<li><a href="#">4</a>
						</li>
						<li><a href="#">5</a>
						</li>
						<li>
							<a href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li> --}}
                    </ul>
                </nav>
                <!-- End pagination -->

            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </section>
    <!-- End section -->
@endsection
