@extends('admin.layouts.admin')

@section('title',"OpenAir")

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form method="POST" action = {{route("open_air.store")}} enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{$errors->all()[0]}}
                            </div>
                        @endif
                        <input type="hidden" name="type" value={{$type}} readonly>
                        @if ($type === "IMAGE")
                            <div class="form-group">
                                <label for="exampleInputFile">Слайд</label>
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name = "path" class="custom-file-input" id="file_input" multiple>
                                    <label class="custom-file-label" for="file_input">Выберите файл</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                </div>
                            </div>

                        @elseif($type === "VIDEO")
                            <div class="form-group">
                                <label for="link_video">Ссылка на видео</label>
                                <input type="text" class="form-control" name = "path" value="{{old("path")}}" id="link_video" 
                                placeholder="Ссылка на видео" >
                            </div>
                        @endif
                    </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                  </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        const fileInput = document.querySelector("#file_input");
        fileInput.addEventListener("change",(event) => {
            fileInput.nextElementSibling.innerHTML = event.target.files[0].name;
        })
    </script>
@endsection

  
