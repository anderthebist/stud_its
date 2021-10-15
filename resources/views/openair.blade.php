@extends('layout/all');

@section('title','OpenAir')

@section('styles')
	<link rel="stylesheet" href={{ asset("/css/header.css") }}>
	<link rel="stylesheet" href={{ asset("/css/openair.css") }}>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection

@section('content')

    @include('layout.header')

    <main class="main">
        <article class = "article">
            <div class="article_content">
                <div class="open_head">
                    <div class="open_air_descript animate_scroll animate_scroll_no_hide">
                        Двічі на рік студенти разом з викладачами та адміністрацією проводять масштабний тімбілдінг на пляжі “Африка” та за містом в лісі, серед природи.
                        Оупен – унікальний захід. Тут панує сімейна атмосфера. Студенти можуть круто провести час: конкурси, неформальне спілкування з викладачами та розіграші.
                        Кожний захід має особливу тематику:
                    </div>
                    <div class="slider_open">
                        <div class="open_galery swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($open_images as $key => $open_image)
                                    <div class="open_galery_item swiper-slide">
                                        <img src={{ asset($open_image->path) }} alt={{"OpenAir ".($key+1)}}>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @if (count($open_images) > 1)
                            <div class="pagin_slide"></div>
                        @endif
                    </div>
                </div>
                <div class="open_videos animate_scroll animate_scroll_no_hide">
                    @foreach ($open_vidoes as $key => $open_vidoe)
                        <div class="open_videos_item">
                            <iframe jsname="L5Fo6c" class="YMEQtf" sandbox="allow-scripts allow-popups allow-forms allow-same-origin allow-popups-to-escape-sandbox allow-downloads" frameborder="0" 
                            aria-label={{"OpenAir video ".($key+1)}} src={{$open_vidoe->path}} allowfullscreen=""></iframe>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>
    </main>
@endsection

@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script src={{ asset("/js/header.js") }}></script>
    <script src={{ asset("/js/openair.js") }}></script>	
@endsection