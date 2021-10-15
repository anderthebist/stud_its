@extends('admin.layouts.admin')

@section('title',"Mister & Miss ITS")

@section('content')
<section class="content">
    <div class="container-fluid">
        <h5>Mister ITS</h5><br>
        <div class="row" >
            @foreach ($misters as $mister)
                <div class="card col-sm-6 col-12 mb-3 mx-sm-3" style="max-width: 540px;position:relative;overflow:hidden">
                    <div class="row g-0">
                    <div class="col-md-4">
                        <img src={{ asset($mister->poster) }} class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$mister->title}}</h5><br>
                            <p class="text-success">{{$mister->special}}</p>
                        </div>
                    </div>
                    </div>
                    <div class="admin_settings">
                        <a href={{route("mister_miss.edit",$mister["id"])}} class="settings_icon text-dark">
                            <i class="far fa-edit"></i>
                        </a>
                        <form action={{route("mister_miss.destroy",$mister["id"])}} method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="delete_btn text-danger" type="submit"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <h5>Miss ITS</h5><br>
        <div class="row">
            @foreach ($misses as $miss)
                <div class="card col-sm-6 col-12 mb-3 mx-md-3" style="max-width: 540px;position:relative;overflow:hidden">
                    <div class="row g-0">
                    <div class="col-md-4">
                        <img src={{ asset($miss->poster) }} class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$miss->title}}</h5><br>
                            <p class="text-success">{{$miss->special}}</p>
                        </div>
                    </div>
                    </div>
                    <div class="admin_settings">
                        <a href={{route("mister_miss.edit",$miss["id"])}} class="settings_icon text-dark">
                            <i class="far fa-edit"></i>
                        </a>
                        <form action={{route("mister_miss.destroy",$miss["id"])}}  method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="delete_btn text-danger" type="submit"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card card-primary">
            <form method="POST" action = {{route("mister_miss.store")}} enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->all()[0]}}
                        </div>
                    @endif
                    <div class="form-group">
                        <select class="form-control" name = "type">
                          <option selected>Mister</option>
                          <option>Miss</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputTitle">Название</label>
                        <input type="text" class="form-control" value = "{{old("title")}}" required name = "title" id="exampleInputTitle" 
                        placeholder="Название">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTheme">Тема (не обезательное)</label>
                        <input type="text" class="form-control" value = "{{old("theme")}}" name = "theme" id="exampleInputTheme" 
                        placeholder="Тема">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Картинка</label>
                        <div class="input-group">
                            <div class="custom-file">
                            <input type="file" name = "image" value = "{{old("image")}}" required class="custom-file-input" id="file_input" multiple>
                            <label class="custom-file-label" for="file_input">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputVideo">Ссылка на promo ролик</label>
                        <input type="text" class="form-control" value = "{{old("promo")}}" required name = "promo" id="exampleInputVideo" 
                        placeholder="Ссылка на promo ролик">
                    </div>
                    <div class="form-group">
                        <label for="FullMovie">Ссылка на полное видео (не обязательное)</label>
                        <input type="text" class="form-control" value = "{{old("full_movie")}}" name = "full_movie" id="FullMovie" 
                        placeholder="Ссылка на полное видео">
                    </div>
                    <div class="form-group">
                        <label for="LinkPhotos">Ссылка на фотографии (не обязательное)</label>
                        <input type="text" class="form-control" value = "{{old("link_photos")}}" name = "link_photos" id="LinkPhotos" 
                        placeholder="Ссылка на фотографии">
                    </div>
                    <div class="form-group">
                        <label for="LinkVideos">Ссылка на другие видео (не обязательное)</label>
                        <input type="text" class="form-control" value = "{{old("link_videos")}}" name = "link_videos" id="LinkVideos" 
                        placeholder="Ссылка на другие видео">
                    </div>
                </div>
    
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
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

  

  
