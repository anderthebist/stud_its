<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>@yield('title')</title>

	<link rel="stylesheet" href={{ asset("/css/styles.css") }}>
	<link rel="stylesheet" href={{ asset("/css/navbar.css") }}>
    @yield('styles')

</head>
<body id ="body">
	<button class="menu_button">
		<div class="button_bar">
			<i class="humburger"></i>
		</div>
	</button>
	
	@if (\Request::route()->getName() == "index")
		<div class="start_display">
			<img class="start_display_image" src="images/logo.jpg" alt="">
		</div>
	@endif
	
	<nav id="navbar">
	
		<div class="navleft">
			@if (Request::route()->getName() != "index")
				<div class="logo">
					<a href={{route("index")}}>
						<img class="logo_image" src={{asset("images/logo.jpg")}} alt="">
					</a>
				</div>
			@endif
		</div>
	
		<div class="navright">
			<ul class="navlist">
				<li class="navitem {{ Request::is('/') ? 'navitem_active' : '' }}">
					<a class="navlink" href={{route("index")}}>
						Про Студраду
					</a>
				</li>
				<li class="navitem {{ Request::is('news') ? 'navitem_active' : '' }}">
					<a class="navlink" href={{route("news")}}>
						Новини
					</a>
				</li>
				<li class="navitem {{ Request::is('stud') ? 'navitem_active' : '' }}">
					<a class="navlink" href={{route("stud")}}>
						Склад СР ІТС
					</a>
				</li>
				<li class="navitem">
					<a class="navlink {{ Request::is('abit') ? 'navitem_active' : '' }}" href="{{route("abit")}}">
						КПІ AbitFEST
					</a>
				</li>
				<li class="navitem">
					<a class="navlink {{ Request::is('openair') ? 'navitem_active' : '' }}" href={{ route("openair") }}>
						Open Air
					</a>
				</li>
				<li class="navitem">
					<a class="navlink {{ Request::is('miss_its') ? 'navitem_active' : '' }}" href={{ route("miss_its")}}>
						Miss ITS
					</a>
				</li>
				<li class="navitem">
					<a class="navlink {{ Request::is('mr_its') ? 'navitem_active' : '' }}" href={{ route("mr_its")}}>
						Mister ITS
					</a>
				</li>
				<li class="navitem">
					<a class="navlink {{ Request::is('contacts') ? 'navitem_active' : '' }}" href={{ route("contacts") }}>
						Контакти
					</a>
				</li>
			</ul>
		</div>
	</nav>
	
	<aside id="aside" class="aside_hide">
		<ul class="asidelist">
			<li class="asideitem {{ Request::is('/') ? 'asideitem_active' : '' }}">
				<a class="asidelink" href={{route("index")}}>
					Про Студраду
				</a>
			</li>
			<li class="asideitem {{ Request::is('news') ? 'asideitem_active' : '' }}">
				<a class="asidelink" href={{route("news")}}>
					Новини
				</a>
			</li>
			<li class="asideitem {{ Request::is('stud') ? 'asideitem_active' : '' }}">
				<a class="asidelink" href={{route("stud")}}>
					Склад СР ІТС
				</a>
			</li>
			<li class="asideitem {{ Request::is('abit') ? 'asideitem_active' : '' }}">
				<a class="asidelink" href={{route("abit")}}>
					КПІ AbitFEST
				</a>	
			</li>
			<li class="asideitem {{ Request::is('openair') ? 'asideitem_active' : '' }}">
				<a class="asidelink" href={{route("openair")}}>
					Open Air
				</a>
			</li>
			<li class="asideitem {{ Request::is('miss_its') ? 'asideitem_active' : '' }}">
				<a class="asidelink" href={{route("miss_its")}}>
					Miss ITS
				</a>
			</li>
			<li class="asideitem {{ Request::is('mr_its') ? 'asideitem_active' : '' }}">
				<a class="asidelink" href={{route("mr_its")}}>
					Mister ITS
				</a>
			</li>
			<li class="asideitem">
				<a class="asidelink {{ Request::is('contacts') ? 'asideitem_active' : '' }}" href={{route("contacts")}}>
					Контакти
				</a>
			</li>
		</ul>
	</aside>
	
	<div class="model_place modal_hide"></div>
    @yield('content')

	<script src={{ asset("/js/script.js") }}></script>
	<script src={{ asset("/js/navbar.js") }}></script>
    @yield('scripts')
</body>
</html>