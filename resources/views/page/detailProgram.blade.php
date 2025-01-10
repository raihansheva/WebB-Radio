@extends('layout.main')
<base href="{{ url('/') }}/">

@push('meta-seo')
    <meta name="description" content="{{ $program->meta_description }}">
    <meta name="keyword" content="{{ $program->meta_keywords }}">
@endpush

@push('Style.css')
    <link rel="stylesheet" href="{{ asset('css/StyleContent/detailProgram.css?v=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('css/ResponsiveStyle/responsivedetailProgram.css?v=' . time()) }}">
@endpush

@section('title', $program->meta_title)
@section('content')
    {{-- <section class="page-news-1">
        <div class="header-info-news">
            @foreach ($bannerInfo as $bannerInfoList)
                <div class="image-header-info-news">
                    <h2 class="title-header">#{{ $bannerInfoList->title_banner_info }}</h2>
                    <img class="banner-info" src="../storage/{{ $bannerInfoList->banner_info }}" alt=""
                        srcset="">
                </div>
            @endforeach
        </div>
    </section> --}}
    <section class="page-news-2">
        <div class="area-detail-program">
            <div class="content-detail-program">
                <div class="content-IN-kiri" id="style-3">
                    <div class="area-detail-program-kiri">
                        <div class="area-content-DP">
                            <div class="area-title-detail-program">
                                <h2 class="title-detail-program">{{ $program->judul_program }}</h2>
                            </div>
                            <div class="area-url-detail-program">
                                <h2 class="url-detail-program">
                                    <a class="link-url-detail-program" href="{{ url('/') }}">Home</a> >
                                    {{ str_replace('-', ' ', request()->segment(1)) }} >
                                    {{ str_replace('-', ' ', $program->slug) }}
                                </h2>
                            </div>
                            <div class="area-span-detail-program">
                                <p class="text-span-detail-program">Program</p>
                            </div>
                            <div class="area-date-detail-program">
                                <p class="date-detail-program">
                                    Pukul {{ $program->jam_mulai }} - {{ $program->jam_selesai }} Wib.
                                </p>
                            </div>
                            <div class="area-image-detail-program">
                                <img class="image-detail-program" src="../storage/{{ $program->image_program }}"
                                    alt="">
                            </div>
                            <div class="area-desk-detail-program">
                                {!! str($program->deskripsi_program)->sanitizeHtml() !!}
                            </div>
                            {{-- @if ($event->has_ticket)
                                <div class="area-ticket-event">
                                    <div class="header-ticket-event">
                                        <h2 class="text-header-ticket-event">Get Ticket Now</h2>
                                    </div>
                                    <div class="area-text-ticket">
                                        <a class="link-text-ticket" href="{{ $event->ticket_url }}">
                                            <p class="text-ticket">Buy Now</p>
                                        </a>
                                    </div>
                                </div>
                            @endif --}}
                        </div>
                        <div class="line-detail-info"></div>
                    </div>
                    <div class="area-detail-program-kanan">
                        <div class="area-programE">
                            <div class="header-programE">
                                <h2 class="title-programE">Program Ardan</h2>
                            </div>
                            <div class="content-programE">
                                @foreach ($programO as $programList)
                                    <div class="box-programE"
                                        style="background-image: url('./storage/{{ $programList->image_program }}') "
                                        class="box-program" data-title="{{ $programList->judul_program }}"
                                        data-description="{{ $programList->deskripsi_pendek }}"
                                        data-time="{{ $programList->jam_mulai }} - {{ $programList->jam_selesai }}"
                                        data-slugP="{{ $programList->slug }}"
                                        data-deskP="{{ $programList->deskripsi_program }}" onclick="showPopup(this)"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="popup" class="popup" style="display: none;" onclick="closePopupOutside(event)">
                        <div class="popup-content">
                            <span class="close" onclick="closePopup()">&times;</span>
                            <div class="area-info-program">
                                <p class="desk-program">Program Description</p> <!-- Pastikan elemen ini ada -->
                                <h2 class="title-box-program">Program Title</h2> <!-- Pastikan elemen ini ada -->
                                <p class="jam-program">Program Time</p> <!-- Pastikan elemen ini ada -->
                                <a href="#" class="detail-link-program">
                                    <p class="link-program">See detail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <div class="line-info-news"></div>
    <section class="page-news-3">
        <div class="area-stream-info-event">
            <div class="content-IN-kanan">
                <div class="area-kategori-top-news">
                    <div class="area-top-news">
                        <div class="header-top-news">
                            <h1 class="title-top-news">Top News</h1>
                            <a href="/info-news">
                                <h3 class="more-info">More Info</h3>
                            </a>
                        </div>
                        <swiper-container class="content-top-news" loop="true" autoplay-delay="2500"
                            autoplay-disable-on-interaction="false"
                            breakpoints='{
                            "480": { "slidesPerView": 1 },
                            "768": { "slidesPerView": 1 },
                            "1024": { "slidesPerView": 1 },
                            "1280": { "slidesPerView": 3 },
                            "2560": { "slidesPerView" : 3}
                        }'>
                            @foreach ($top_info as $topInfoList)
                                <a class="link-box-top-info" href="/info-detail/{{ $topInfoList->slug }}">
                                    <div class="box-top-info">
                                        <div class="area-top-image">
                                            <img class="image-top-info" src="./storage/{{ $topInfoList->image_info }}"
                                                alt="">
                                        </div>
                                        <div class="area-text-desk-top-info">
                                            <div class="area-date">
                                                <p class="date-top-info">
                                                    {{ \Carbon\Carbon::parse($topInfoList->date_info)->translatedFormat('l, d F Y') }}
                                                </p>
                                            </div>
                                            <div class="area-text">
                                                <p class="desk-top-info">{{ $topInfoList->judul_info }}</p>
                                            </div>
                                            <div class="area-tag">
                                                <h2 class="tag-top-info">{{ $topInfoList->tagInfo->nama_kategori }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </swiper-container>
                    </div>
                    <div class="line-news"></div>
                    <div class="area-news">
                        <div class="area-header-news">
                            <h2 class="header-news">Kategori Info</h2>
                        </div>
                        <div class="area-box-news">
                            @foreach ($kategoriInfo as $kategoriInfoList)
                                <div class="box-news">
                                    <a href="/info-tag/{{ $kategoriInfoList->nama_kategori }}">
                                        <div class="area-tag-news">
                                            <h3 class="tag-news">{{ $kategoriInfoList->nama_kategori }}</h3>
                                        </div>
                                        @if ($kategoriInfoList->info->isNotEmpty())
                                            <img class="image-news"
                                                src="{{ asset('storage/' . $kategoriInfoList->info->first()->image_info) }}"
                                                alt="">
                                        @else
                                            <p>Tidak ada info untuk tag ini.</p>
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="line-streaming"></div>
                <div class="area-streaming">
                    <div class="area-header-streaming">
                        <h2 class="title-streaming">Streaming</h2>
                    </div>
                    <div class="area-thumbnail">
                        <img class="image-streaming" src="./storage/{{ $streamAudio->image_stream }}">
                        <div class="btn-play-streaming" id="BtnStream" data-audio-src="{{ $streamAudio->stream_url }}">
                            <span class="material-symbols-rounded">play_arrow</span>
                        </div>

                        <!-- Ganti dengan MediaElement.js -->
                        {{-- <audio class="audio-streaming" id="audio-streaming" preload="auto" crossorigin="anonymous">
                            <source type="audio/mpeg" src="{{ $stream->stream_audio_url }}" />
                        </audio> --}}
                    </div>
                </div>
            </div>
            <div class="line-info-artis"></div>
        </div>
    </section>
    <script src="{{ asset('js/detailProgram.js?v=' . time()) }}"></script>
@endsection
