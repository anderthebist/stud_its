@extends('layout/all');

@section('title','KPI AbitFEST')

@section('styles')
	<link rel="stylesheet" href={{ asset("/css/header.css") }}>
	<link rel="stylesheet" href={{ asset("/css/abit.css") }}>
@endsection

@section('content')
    @include('layout.header')

    <main class="main">
        <article class = "article">
            <div class="article_content">
                <h2 class="abit_title">
                    Студентська Рада ІТС щорічно приймає участь у заходах, присвячених вступу до КПІ, зокрема залученням студентів на навчання до ІТС.
                    Також організовує профорієнтаційну роботу в школах м. Києва та по Україні. 
                </h2>
                @if (count($abit_videos) > 0)
                    <div class="abit_videos animate_scroll animate_scroll_no_hide"> 
                        <div class="left_abit_videos">
                            <iframe jsname="L5Fo6c" class="YMEQtf play_video" 
                            sandbox="allow-scripts allow-popups allow-forms allow-same-origin allow-popups-to-escape-sandbox allow-downloads" 
                            frameborder="0" aria-label="KPI AbitFEST Video" src="{{$abit_videos[0]["video_path"]}}" allowfullscreen=""></iframe>
                        </div>   
                        <div class="right_abit_videos">
                            @foreach ($abit_videos as $key => $abit_video)
                                <div class="abit_video_item {{$key == 0 ? 'abit_video_item-active' : ''}}" data-video = {{$abit_video->video_path}}>
                                    <img src={{ asset($abit_video->poster) }} alt="">
                                    <div class="abit_video_play">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div> 
                            @endforeach
                        </div>      
                    </div>
                @endif 
            </div>
        </article>
    </main>
@endsection

@section('scripts')
	<script src={{ asset("/js/header.js") }}></script>
    <script src={{ asset("/js/abit.js") }}></script>	
@endsection