@extends('layout/all');

@section('title','Склад СР ІТС')

@section('styles')
	<link rel="stylesheet" href={{ asset("/css/stud.css") }}>
@endsection

@section('content')
    <main class="main">
        <article class="stud_contain">
            <h1 class="title__stud">ITS active squad</h1>

            <div class="stud_list">
                @foreach ($students as $key => $student)
                    <div class="stud_item animate_scroll animate_scroll_no_hide" data-delay-scroll = "500">
                        <div class="stud_photo_block">
                            <img class="stud_photo" src="{{ asset($student->image) }}" alt="">
                        </div>
                        <div class="stud_info">
                            <div class="stud_head">
                                <div class="stud_name collapse_control" data-collapse={{".stud_info_content_".($key+1)}} data-collapse-target = {{".stud_name_icon_".($key+1)}}>
                                    <h2>{{$student->fullname}}</h2> 
                                    <div class="icons_stud_block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stud_name_icon {{"stud_name_icon_".($key+1)}}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="stud_status">
                                    {{$student->status}}
                                </div>
                            </div>
                            <div class = "stud_info_content collapse_show {{"stud_info_content_".($key+1)}}">
                                <div class="stud_description">
                                    {!! $student->description !!}
                                </div>
                                <div class="social_net_stud">
                                    @if ($student->telegram != null)
                                        <div class = "social_net_stud_icon telegram">
                                            <a href={{$student->telegram}} target = "_blank">
                                                <img src={{ asset("/images/telegram_icon.png") }} alt="">
                                            </a>
                                        </div>
                                    @endif
                                    @if ($student->instagram != null)
                                        <div class = "social_net_stud_icon instagram">
                                            <a href={{$student->instagram}} target = "_blank">
                                                <img src={{ asset("/images/insta_icon.png") }} alt="">
                                            </a>    
                                        </div>
                                    @endif
                                    @if ($student->twitter != null)
                                        <div class = "social_net_stud_icon twitter">
                                            <a href={{$student->twitter}} target = "_blank">
                                                <img src={{ asset("/images/twitter_icon.png") }} alt="">
                                            </a>    
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </main>
@endsection

@section('scripts')
    <script src={{ asset("/js/stud.js") }}></script>	
@endsection