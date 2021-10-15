@extends('admin.layouts.admin')

@section('title',"KPIAbitFest")

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <form method="POST" action = {{route("abit_fest.update",$abit_video["id"])}} enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->all()[0]}}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="link_video">Ссылка на видео</label>
                        <input type="text" class="form-control" value = "{{$abit_video->video_path}}" required name = "video_path" id="link_video" 
                        placeholder="Ссылка на видео" >
                    </div>
                    <div class="form-group">
                        <label for="file_input">Постер</label>
                        <div class="input-group">
                            <div class="custom-file">
                            <input type="file" name = "poster" class="custom-file-input" id="file_input" multiple>
                            <label class="custom-file-label" for="file_input">{{$abit_video->poster}}</label>
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

  
