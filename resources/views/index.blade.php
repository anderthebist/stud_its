@extends('layout/all');

@section('title','Про Студраду')

@section('styles')
	<link rel="stylesheet" href={{ asset("/css/header.css") }}>
	<link rel="stylesheet" href={{ asset("/css/index.css") }}>
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection

@section('content')
	@include('layout.header')

	<main class="main">
		<article class = "article">
			<div class="article_content">
				<div class="article_title">
					<h3>
						Вас вітає Студентська Рада Навчально-наукового Інституту телекомунікаційних систем НТУУ «КПІ ім. Ігоря Сікорського»
					</h3>
				</div>
				<div class="social_group">
					<div class="social_btn_group social_btn_group_item animate_scroll animate_scroll_no_hide">
						<div class="social_btn_block">
							<a href="https://twitter.com/KostLisov" target="_blank">
								<button class="social_btn twitter">
									<img class="social_btn_icon" src={{ asset("images/twitter_icon.png") }} alt="">
									<span>Twitter</span>
								</button>
							</a>
						</div>
						<div class="social_btn_block">
							<a href="https://teletype.in/@its_student_council" target="_blank">
								<button class="social_btn teletype">
									<img class="social_btn_icon" src={{ asset("images/teletype_icon.png") }} alt="">
									<span>Teletype</span>
								</button>
							</a>
						</div>
					</div>
	
					<div class="social_btn_group_item watch animate_scroll animate_scroll_no_hide"> <!--animate_scroll-active-->
						<iframe src="https://www.youtube.com/embed/9fqKtMS4POA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
		
					<div class="social_btn_group_item social_btn_group animate_scroll animate_scroll_no_hide">
						<div class="social_btn_block">
							<a href="https://www.instagram.com/its.kpi/" target="_blank">
								<button class="social_btn instagram">
									<img class="social_btn_icon" src={{ asset("images/insta_icon.png") }} alt="">
									<span>Instagram</span>
								</button>
							</a>
						</div>
						<div class="social_btn_block">
							<a href="https://t.me/student_its_info" target="_blank">
								<button class="social_btn telegram">
									<img class="social_btn_icon" src={{ asset("images/telegram_icon.png") }} alt="">
									<span>Telegram</span>
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</article>

		@if (count($stud_curators) > 0)
			<article class = "article" id = "stud_kur">
				<div class="article_content">
					<div class="article_title">
						<h3>
							Студкуратори
						</h3>
					</div>
					
					<div class="slider_of_stud animate_scroll animate_scroll_no_hide">
						<div class="stud_curators swiper-container">
							<div class="swiper-wrapper">
								@foreach ($stud_curators as $stud_curator)
									<div class="stud_curators_item swiper-slide" data-id = {{$stud_curator->id}}>
										<img data-src="{{ asset($stud_curator->image) }}" class="swiper-lazy" alt="">
										<div class="swiper-lazy-preloader swiper-lazy-preloader"></div>
									</div>
								@endforeach
							</div>
						</div>
						<div class="arrows left">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
							</svg>
						</div>
						<div class="arrows right">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
							</svg>
						</div>
					</div>
				</div>
			</article>
		@endif
	</main>

@endsection

@section('scripts')
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script src={{ asset("/js/header.js") }}></script>
	<script src={{ asset("/js/index.js") }}></script>
@endsection