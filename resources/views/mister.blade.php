@extends('layout/all');

@section('title','Mister ITS')

@section('styles')
	<link rel="stylesheet" href="/css/header.css">
	<link rel="stylesheet" href="/css/mistermiss.css">
@endsection

@section('content')

    @include('layout.header')

    <main class="main">
        <article class = "article">
            <div class="article_content">
                <h1 class="title__stud">Коротко про конкурс</h1>
                <div class="about_mistermiss">
                    Щорічно ми проводимо конкурс краси “Містер ІТС”. Це дуже яскравий та цікавий івент, який об’єднує всіх – і студентів, і адміністрацію. 
                    <br/><br/>
                    Це гігабайти фото- і відеоконтенту, модні та епатажні образи кожного учасника. 
                </div>
                @foreach ($items as $item)
                    <div class="mistermiss_item animate_scroll animate_scroll_no_hide">
                        <div class="mistermiss_picture">
                            <img src={{ asset($item->poster) }} alt="">
                        </div>
                        <div class="mistermiss_video">
                            <iframe jsname="L5Fo6c" class="YMEQtf" sandbox="allow-scripts allow-popups allow-forms allow-same-origin 
                            allow-popups-to-escape-sandbox allow-downloads" frameborder="0" aria-label="MisterITS video"
                            src={{$item->video}} allowfullscreen=""></iframe>
                        </div>
                        <div class="mistermiss_info">
                            <h4 class="mistermiss_title">{{$item->title}}</h4>
                            <div class="mistermiss_special">
                                {{$item->special ? "«".$item->special."»" : ''}}
                            </div>
                            <div class="mistermiss_group_btn">
                                @if ($item->full_movie)
                                    <a href={{$item->full_movie}} target = "_blank">
                                        <button class="mistermiss_btn">
                                            Full movie
                                        </button>
                                    </a> 
                                @else
                                    <button class="mistermiss_btn mistermiss_btn_red">
                                        Full movie(-)
                                    </button>
                                @endif
                                @if ($item->photos)
                                    <a href={{$item->photos}} target = "_blank">
                                        <button class="mistermiss_btn">
                                            Photos
                                        </button>
                                    </a> 
                                @else
                                    <button class="mistermiss_btn mistermiss_btn_red">
                                        Photos(-)
                                    </button>
                                @endif
                                @if ($item->videos)
                                <a href={{$item->videos}} target = "_blank">
                                    <button class="mistermiss_btn">
                                        Videos
                                    </button>
                                </a> 
                                @else
                                    <button class="mistermiss_btn mistermiss_btn_red">
                                        Videos(-)
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </main>
@endsection

@section('scripts')
	<script src="/js/header.js"></script>
<!--
    <script src="/js/openair.js"></script>	-->
@endsection