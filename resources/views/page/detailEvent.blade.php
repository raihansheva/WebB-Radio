@extends('layout.main')
<base href="{{ url('/') }}/">

@push('meta-seo')
    <meta name="description" content="{{ $event->meta_description }}">
    <meta name="keyword" content="{{ $event->meta_keywords }}">
@endpush

@push('Style.css')
    <link rel="stylesheet" href="{{ asset('css/StyleContent/detailEvent.css?v=' . time()) }}">
    <link rel="stylesheet" href="{{ asset('css/ResponsiveStyle/responsivedetailEvent.css?v=' . time()) }}">
@endpush

@section('title', $event->meta_title)
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
        <div class="area-detail-event">
            <div class="content-detail-event">
                <div class="content-IN-kiri" id="style-3">
                    <div class="area-detail-kiri-event">
                        <div class="area-content-DE">
                            <div class="area-title-detail-event">
                                <h2 class="title-detail-event">{{ $event->nama_event }}</h2>
                            </div>
                            <div class="area-url-detail-event">
                                <h2 class="url-detail-event">
                                    <a class="link-url-detail-event" href="{{ url('/') }}">Home</a> >
                                    {{ str_replace('-', ' ', request()->segment(1)) }} >
                                    {{ str_replace('-', ' ', $event->slug) }}
                                </h2>
                            </div>
                            <div class="area-span-detail-event">
                                <p class="text-span-detail-event">Event</p>
                            </div>
                            <div class="area-date-detail-event">
                                <p class="date-detail-event">
                                    {{ \Carbon\Carbon::parse($event->date_event)->translatedFormat('l, d F Y') }}
                                </p>
                            </div>
                            <div class="area-image-detail-event">
                                <img class="image-detail-event" src="../storage/{{ $event->image_event }}" alt="">
                            </div>
                            <div class="area-desk-detail-event">
                                {!! str($event->deskripsi_event)->sanitizeHtml() !!}
                            </div>
                            @if ($event->has_ticket)
                                <div class="area-ticket-event">
                                    <div class="header-ticket-event">
                                        <h2 class="text-header-ticket-event">Get Ticket Now</h2>
                                    </div>
                                    <a class="link-text-ticket" href="{{ $event->ticket_url }}">
                                        <div class="area-text-ticket">
                                            <p class="text-ticket">Buy Now</p>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="line-detail-event"></div>
                    </div>
                    <div class="area-detail-kanan-event">
                        <div class="area-event">
                            <div class="area-header-event">
                                <h2 class="title-event">Other Event</h2>
                                <a href="/event">
                                    <h2 class="see-more">See More</h2>
                                </a>
                            </div>
                            <div class="area-event-bottom">
                                @foreach ($event_upcoming as $eventUpcomingList)
                                    <div class="box-event"
                                        style="background-image: url('./storage/{{ $eventUpcomingList->image_event }}')"
                                        onclick="showPopupEvent(this)"
                                        data-description="{{ $eventUpcomingList->deskripsi_pendek }}"
                                        data-date="{{ \Carbon\Carbon::parse($eventUpcomingList->date_event)->format('d F Y') }}"
                                        data-slug="{{ $eventUpcomingList->slug }}"
                                        data-deskShort="{{ $eventUpcomingList->deskripsi_event }}">
                                        <div class="area-days-date-right">
                                            <div class="content-days-date-right">
                                                <div class="box-days-date-right">
                                                    <h3 class="date-month-right">
                                                        {{ \Carbon\Carbon::parse($eventUpcomingList->date_event)->format('d F Y') }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div id="popupEvent" class="popup-event" onclick="closePopupOutsideEvent(event)">
                                <div class="popup-content-event">
                                    <div class="area-info-event">
                                        <p class="desk-event"></p>
                                        <h2 class="title-box-event"></h2>
                                        <a href="#" class="detail-link">
                                            <p class="link-event">See detail</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="line-info-news"></div>
    <section class="page-news-3">
        <div class="area-info-artis">
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
    <script src="{{ asset('js/detailEvent.js?v=' . time()) }}"></script>
@endsection
