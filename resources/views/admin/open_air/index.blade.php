@extends('admin.layouts.admin')

@section('title',"OpenAir")

@section('content')
<section class="content">
    <div class="container-fluid">
        <h5>OpenAir слайды</h5>
        <div class="row">
            @foreach ($open_images as $open_image)
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="abit_card">
                        <div class="admin_settings">
                            <a href={{route("open_air.edit",["id" => $open_image["id"], "type" => "IMAGE"])}} class="settings_icon">
                                <i class="far fa-edit"></i>
                            </a>
                            <form action={{route("open_air.destroy",$open_image["id"])}} method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="delete_btn text-danger" type="submit"><i class="fas fa-times"></i></button>
                            </form>
                        </div>
                        <img src={{ asset($open_image->path) }} class = "abit_card_image" alt="">
                    </div>
                </div>
            @endforeach
        </div>
        @if (count($open_images) < 8)
            <a href = {{route("open_air.create",["type" => "IMAGE"])}}>
                <button class="btn btn-primary col-12 mb-3">Добавить слайд</button>
            </a>
        @endif

        <h5>OpenAir видео</h5>
        <div class="row">
            @foreach ($open_vidoes as $key => $open_vidoe)
                <div class="col-sm-6 col-12">
                    <div class="abit_card" style="padding-top:0">
                        <div class="admin_settings">
                            <a href={{route("open_air.edit",["id" => $open_vidoe["id"], "type" => "VIDEO"])}} class="settings_icon">
                                <i class="far fa-edit"></i>
                            </a>
                            <form action={{route("open_air.destroy",$open_vidoe["id"])}} method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="delete_btn text-danger" type="submit"><i class="fas fa-times"></i></button>
                            </form>
                        </div>
                        <div class="admin_video_block">
                            <iframe jsname="L5Fo6c" class="YMEQtf admin_video" sandbox="allow-scripts allow-popups allow-forms allow-same-origin allow-popups-to-escape-sandbox allow-downloads" frameborder="0" 
                            aria-label={{"OpenAir video ".($key+1)}} src={{$open_vidoe->path}} allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if (count($open_vidoes) < 2)
            <a href = {{route("open_air.create",["type" => "VIDEO"])}}>
                <button class="btn btn-primary col-12 mb-3">Добавить видео</button>
            </a>
        @endif
    </div>
</section>

<script>
    const fileInput = document.querySelector("#file_input");
    if(fileInput){
        fileInput.addEventListener("change",(event) => {
            fileInput.nextElementSibling.innerHTML = event.target.files[0].name;
        })
    }

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

  
