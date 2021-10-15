
@extends('admin.layouts.admin')

@section('title',"Новости")

@section('styles')
    <script src="https://cdn.tiny.cloud/1/2bfv3kj9xkhl1uhx73clkjxo2chwtgbj1haawkmxfdppyfuf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <form action={{route("news.update",$news["id"])}} method="POST" enctype="multipart/form-data">
              @csrf
              @method("PUT")

              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger" role="alert">
                      {{$errors->all()[0]}}
                  </div>
                @endif

                <div class="form-group">
                  <label for="input_title">Название новости</label>
                  <input type="text" class="form-control" name = "title" id="input_title" value="{{$news->title}}" placeholder="Название новости">
                </div>
                <div class="form-group">
                  <label for="input_description">Текст</label>
                  <textarea id="input_description" name="text">{{$news->text}}</textarea>
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