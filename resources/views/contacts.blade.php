@extends('layout/all');

@section('title','Contact us')

@section('styles')
	<link rel="stylesheet" href="/css/header.css">
	<link rel="stylesheet" href="/css/contacts.css">
@endsection

@section('content')
    @include('layout.header')

    <main class="main">
        <article class = "article">
            <div class="article_content">
                <div class="social_net_contact animate_scroll animate_scroll_no_hide">
                    <div class="social_net_contact_block">
                        <a href="https://www.instagram.com/its.kpi/" target="_blank">
                            <button class="social_btn instagram">
                                <img class="social_btn_icon" src={{ asset("/images/insta_icon.png") }} alt="">
                                <span>Instagram</span>
                            </button>
                        </a>
                    </div>
                    <div class="social_net_contact_block">
                        <a href="https://www.youtube.com/channel/UCEzrD9-A-3NaxydbygV_8nQ" target="_blank">
                            <button class="social_btn youtube">
                                <img class="social_btn_icon" src={{ asset("/images/youtube-icon.png") }} alt="">
                                <span>Youtube</span>
                            </button>
                        </a>
                    </div>
                    <div class="social_net_contact_block">
                        <a href="https://t.me/student_its_info" target="_blank">
                            <button class="social_btn telegram">
                                <img class="social_btn_icon" src={{ asset("/images/telegram_icon.png") }} alt="">
                                <span>Telegram</span>
                            </button>
                        </a>
                    </div>
                    <div class="social_net_contact_block">
                        <a href="https://www.linkedin.com/company/studcouncil-its-kpi/" target="_blank">
                            <button class="social_btn linkedin">
                                <img class="social_btn_icon" src={{ asset("/images/linkedin-icon.png") }} alt="">
                                <span>LinkedIn</span>
                            </button>
                        </a>
                    </div>
                    <div class="social_net_contact_block">
                        <a href="https://twitter.com/KostLisov" target="_blank">
                            <button class="social_btn twitter">
                                <img class="social_btn_icon" src={{ asset("/images/twitter_icon.png") }} alt="">
                                <span>Twitter</span>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="contact_block">
                    <div class="contact_info">
                        <p>📍 03056, м. Київ, пров. Індустріальний 2, каб. 308-30</p>
                        <p>
                            ⏰ ПН-СБ 8:30-17:00 ("очно" за домовленістю)
                        </p>  
                        <p>
                            📞 +38 (095) 804-92-19 (8:00-23:00 щоденно, наявний Bip месенджер, автовідповідач)
                        </p> 
                        <p>
                            ✉️ studrada.its@lll.kpi.ua
                        </p>
                    </div>
                    <div class="contact_images">
                        <img class="its_logo" 
                        src={{ asset("/images/9cMbRsZeHqFEnQImI_ByXQ5CTX43-oOwFx2vbRoLiQhozJXLvwIdi967emjoaS0Ggs9TjnJE9-NFxHiVI_P8TxoZ69wRcclb7A3iKHmN7aM=s2048.png") }} >
                        <img class="dia_image" src={{ asset("/images/dia.png") }}>
                    </div>
                </div>

                <div class="covid_look">
                    <div class="look">!</div>
                    <div class="look_text">
                        У зв'язку з пандемією COVID-19, спричинену вірусом SARS-CoV-2, хаб цифрової освіти на базі Студради ІТС не працює. 
                        Актуальна інформацію стосовно роботи можна дізнатись за контактами або на сторінках Студради ІТС в соціальних мережах
                    </div>
                    <div class="look">!</div>
                </div>
                <div class="map animate_scroll animate_scroll_no_hide">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2540.9010355706023!2d30.443762!3d50.442944!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cc21dd987519%3A0x6368379e23fba6ae!2zQWNhZGVtaWMgQnVpbGRpbmcgMzAsINCY0L3QtNGD0YHRgtGA0LjQsNC70YzQvdGL0Lkg0L_QtdGALiwgMiwg0JrQuNC10LIsINCj0LrRgNCw0LjQvdCwLCAwMjAwMA!5e0!3m2!1sru!2sus!4v1622820018587!5m2!1sru!2sus" 
                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </article>
    </main>

@endsection

@section('scripts')
	<script src="/js/header.js"></script>
    <script src="/js/contacts.js"></script>	
@endsection