@extends('layout/all');

@section('title','News')

@section('styles')
	<link rel="stylesheet" href={{ asset("/css/header.css") }}>
	<link rel="stylesheet" href={{ asset("/css/news.css") }}>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection

@section('content')
    @include('layout.header')

    <main class="main">
        @foreach ($news as $keynews=>$new)
            <article class = "article">
                <div class="article_content">
                    <div class="news_item animate_scroll_stack animate_scroll animate_scroll_no_hide" >
                        <div class="news_about">
                            <div class="news_title">
                                <span class="new_date">{{$new->date()}}</span>
                                | {{$new->title}}
                            </div>
                            <div class="news_text">
                                {!! $new->text !!}
                            </div>
                        </div>
                        @if (count($new->medias) > 0)
                            <div class="news_right news_slider">
                                <div class="media_slider swiper-container" id="{{'media_slider'.$keynews}}">
                                    <div class="swiper-wrapper">
                                        @foreach ($new->medias as $key=>$media)
                                            <div class="news_media swiper-slide">
                                                @if ($media["type"] === "IMAGE")
                                                    <img class="news_media_content swiper-lazy" data-src="{{ asset($media["path"]) }}" 
                                                    alt={{$new->title."_".$key}}>
                                                @endif
                                                @if($media["type"] === "VIDEO")
                                                    <iframe class="news_media_content swiper-lazy" data-src={{$media["path"]}}  
                                                    title={{$new->title."_".$key}} 
                                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                    allowfullscreen></iframe>
                                                @endif
                                                <div class="swiper-lazy-preloader swiper-lazy-preloader"></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @if (count($new->medias) > 1)
                                    <div class="pagin_slide" id="{{'pagin_slide'.$keynews}}"></div>
                                @endif
                            </div>
                        @endif
                </div>
            </article>
        @endforeach
    </main>

@endsection

@section('scripts')
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script src={{ asset("/js/header.js") }}></script>
    <script src={{ asset("/js/news.js") }}></script>	
@endsection