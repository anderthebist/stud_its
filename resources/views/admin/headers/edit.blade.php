@extends('admin.layouts.admin')

@section('title',"Редактирование шапки")

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form method="POST" action = {{route("header.update",$header["id"])}} enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                  <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->all()[0]}}
                        </div>
                    @endif
                    <div class="form-group">
                      <label for="exampleInputEmail1">Название шапки</label>
                      
                      <?php 
                        echo '<input type="text" class="form-control" required name = "title" id="exampleInputEmail1" 
                      placeholder="Название шапки" value = "'.$header->title.'">'
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Картинка</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name = "image" class="custom-file-input" id="file_input" multiple>
                          <label class="custom-file-label" for="file_input">{{$header->image}}</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
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
    </script>
@endsection

  
