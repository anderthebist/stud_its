@extends('admin.layouts.admin')

@section('title',"Mister & Miss ITS")

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <form method="POST" action = {{route("mister_miss.update",$item["id"])}} enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->all()[0]}}
                        </div>
                    @endif
                    <div class="form-group">
                        <select class="form-control" name = "type">
                            @foreach (["Mister","Miss"] as $elem)
                                <option {{$elem === $item->type ? 'selected' : ''}}>{{$elem}}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputTitle">Название</label>
                        <input type="text" class="form-control" value = "{{$item->title}}"  name = "title" id="exampleInputTitle" 
                        placeholder="Название">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTheme">Тема (не обезательное)</label>
                        <input type="text" class="form-control" value ="{{$item->special}}" name = "theme" id="exampleInputTheme" 
                        placeholder="Тема">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Картинка</label>
                        <div class="input-group">
                            <div class="custom-file">
                            <input type="file" name = "image" value = "{{old("image")}}" class="custom-file-input" id="file_input" multiple>
                            <label class="custom-file-label" for="file_input">{{$item->poster}}</label>
                            </div>
                            <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputVideo">Ссылка на promo ролик</label>
                        <input type="text" class="form-control" value = "{{$item->video}}" name = "promo" id="exampleInputVideo" 
                        placeholder="Ссылка на promo ролик">
                    </div>
                    <div class="form-group">
                        <label for="FullMovie">Ссылка на полное видео (не обезательное)</label>
                        <input type="text" class="form-control" value = "{{$item->full_movie}}"  name = "full_movie" id="FullMovie" 
                        placeholder="Ссылка на полное видео">
                    </div>
                    <div class="form-group">
                        <label for="LinkPhotos">Ссылка на фотографии (не обезательное)</label>
                        <input type="text" class="form-control" value = "{{$item->photos}}" name = "link_photos" id="LinkPhotos" 
                        placeholder="Ссылка на фотографии">
                    </div>
                    <div class="form-group">
                        <label for="LinkVideos">Ссылка на другие видео (не обезательное)</label>
                        <input type="text" class="form-control" value = "{{$item->videos}}" name = "link_videos" id="LinkVideos" 
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
</script>
@endsection

  

  
