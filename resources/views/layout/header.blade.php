@if ($header != null)
    <header class="header">
        <div class="title_contain">
            <h1 class="header_title">{{$header->title}}</h1>
        </div>
        <div class="header_shadow"></div>
        <img class="header_image" src="{{ asset($header->image) }}" alt="">
    </header>
@endif