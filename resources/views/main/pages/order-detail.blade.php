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
                    <div class="fade in active">
                        <h4>Detail Pesanan</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama Wisata</td>
                                    <td>{{ $order->travel->name }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pelaksanaan</td>
                                    <td>{{ "{$order->travel->start_date->format('d F Y')} - {$order->travel->end_date->format('d F Y')}" }}
                                    </td>
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
                                <h4 id="order-id">{{ "#{$order->order_code}" }}</h4><a id="copy-id"
                                    href="javascript:void(0)" class="fs1 tooltip-1" aria-hidden="true" data-icon="i"
                                    data-placement="top" title data-original-title="Copy"></a>
                            </span>
                            @if (!$order->is_accepted)
                                <p>Silahkan bawa dan tunjukkan ID Pemesanan pada saat pembayaran</p>
                            @else
                                <p>Pesanan telah diterima, anda telah terdaftar pada wisata ini</p>
                            @endif
                        </div>
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
                                <a href="{{ route('travel.details', ['travel' => $order->travel_id, 'to' => 'review']) }}"><button
                                        class="btn_full">Beri Testimoni</button></a>
                            @else
                                <a href="{{ route('travel.details', ['travel' => $order->travel_id]) }}"><button
                                        class="btn_full">Lihat Detail Wisata</button></a>
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
