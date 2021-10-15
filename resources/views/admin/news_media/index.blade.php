
@extends('admin.layouts.admin')

@section('title',"Новости")

@section('content')
<section class="content">
    <div class="container-fluid">
        
        <div class="row">
            @foreach ($news_medias as $news_media)
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="abit_card">
                        <div class="admin_settings">
                            <a href={{route("news_media.edit",["id" => $news_media["id"],"type" => $news_media->type ])}} class="settings_icon">
                                <i class="far fa-edit"></i>
                            </a>
                            <form action={{route("news_media.destroy",$news_media["id"])}} method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="delete_btn text-danger" type="submit"><i class="fas fa-times"></i></button>
                            </form>
                        </div>
                        @if ($news_media["type"] === "IMAGE")
                            <img src={{ asset($news_media->path) }} class = "abit_card_image" alt="">
                        @endif
                        @if($news_media["type"] === "VIDEO")
                            <iframe class="abit_card_image" src={{$news_media->path}}  
                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen></iframe>
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="border d-flex align-center col-md-3 col-sm-6 col-12">
                <div class="col-12 my-auto">
                    <a href={{route("news_media.create",["news_id" => $news_id, "type" => "IMAGE"] )}}>
                        <button type="button" class="col-12 mb-2 btn btn-outline-primary">Добавить фото</button>
                    </a>
                    <a href={{route("news_media.create",["news_id" => $news_id, "type" => "VIDEO"])}}>
                        <button type="button" class="col-12 btn btn-outline-primary">Добавить видео</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const deleteBtn = document.querySelectorAll(".delete_btn");

    deleteBtn.forEach((elem) => {
        elem.addEventListener("click",(event) => {
            if(!confirm("Подтвердите действие")){
                event.preventDefault();
            }
        })
    })
</script>
@endsection

  
