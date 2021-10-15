@extends('admin.layouts.admin')

@section('title',"KPIAbitFest")

@section('content')
<section class="content">
    <div class="container-fluid">
        
        <div class="row">
            @foreach ($abit_videos as $abit_video)
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="abit_card">
                        <div class="admin_settings">
                            <a href={{route("abit_fest.edit",$abit_video["id"])}} class="settings_icon">
                                <i class="far fa-edit"></i>
                            </a>
                            <form action={{route("abit_fest.destroy",$abit_video["id"])}} method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="delete_btn text-danger" type="submit"><i class="fas fa-times"></i></button>
                            </form>
                        </div>
                        <img src={{ asset($abit_video->poster) }} class = "abit_card_image" alt="">
                    </div>
                </div>
            @endforeach
        </div>
        @if (count($abit_videos) < 4)
            <div class="card card-primary">
                <form method="POST" action = {{route("abit_fest.store")}} enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{$errors->all()[0]}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="link_video">Ссылка на видео</label>
                            <input type="text" class="form-control" value = "{{old("video_path")}}"  name = "video_path" id="link_video" 
                            placeholder="Ссылка на видео" >
                        </div>
                        <div class="form-group">
                            <label for="file_input">Постер</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" name = "poster" class="custom-file-input" id="file_input" multiple>
                                <label class="custom-file-label" for="file_input">Выберите файл</label>
                                </div>
                                <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </form>
            </div>
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

  
