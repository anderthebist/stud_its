
@extends('admin.layouts.admin')

@section('title',"Склад СР ІТС")

@section('styles')
<script src="https://cdn.tiny.cloud/1/2bfv3kj9xkhl1uhx73clkjxo2chwtgbj1haawkmxfdppyfuf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <form action={{route("stud.update",$student["id"])}} method="POST" enctype="multipart/form-data">
              @csrf
              @method("PUT")

              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger" role="alert">
                      {{$errors->all()[0]}}
                  </div>
                @endif

                <div class="form-group">
                  <label for="input_title">Полное имя</label>
                  <input type="text" class="form-control" name = "fullname" id="input_title" 
                  value="{{$student->fullname}}" placeholder="Полное имя">
                </div>
                <div class="form-group">
                    <label for="input_status">Статус</label>
                    <input type="text" class="form-control" name = "status" value="{{$student->status}}" id="input_status" placeholder="Статус">
                </div>
                <div class="form-group">
                  <label for="file_input">Фото</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name = "image" value="{{old("image")}}" id="file_input">
                      <label class="custom-file-label" for="file_input">{{$student->image}}</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_description">Описание</label>
                  <textarea id="input_description" name="description">{{$student->description}}</textarea>
                </div>
                <div class="form-group">
                  <label for="link_telegram">Ссылка на Telegram (не обезательное)</label>
                  <input type="text" class="form-control" placeholder="Ссылка на Telegram" name = "telegram" value="{{$student->telegram}}" id="link_telegram" >
                </div>
                <div class="form-group">
                  <label for="LinkPhotos">Ссылка на Instagram (не обезательное)</label>
                  <input type="text" class="form-control" placeholder="Ссылка на Instagram" name = "instagram" value="{{$student->instagram}}" id="link_instagram">
                </div>
                <div class="form-group">
                  <label for="LinkVideos">Ссылка на Twitter (не обезательное)</label>
                  <input type="text" class="form-control" name = "twitter" id="link_twitter" value="{{$student->twitter}}"
                  placeholder="Ссылка на Twitter">
                </div>
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

  tinymce.init({
    selector: '#input_description',
    plugins: 'autolink fullscreen link advlist lists emoticons',
    toolbar: 'undo redo | fontselect | bold italic underline strikethrough link casechange | forecolor backcolor | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist |  emoticons removeformat | fullscreen',
    //toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify | numlist bullist checklist  | numlist bullist outdent indent  | removeformat',
    menubar: false,
    a_plugin_option: true,
    a_configuration_option: 400
  });
</script>

@endsection