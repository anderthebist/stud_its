@extends('admin.layouts.admin')

@section('title',"Студкуратори")

@section('content')
<section class="content">
    <div class="container-fluid">
        @if (count($stud_curators) < 6)
            <div class="card card-primary">
                <form method="POST" action = {{route("stud_curators.store")}} enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{$errors->all()[0]}}
                            </div>
                        @endif
                        <div class="form-group">
                        <label for="exampleInputFile">Картинка</label>
                        <div class="input-group">
                            <div class="custom-file">
                            <input type="file" name = "image" required class="custom-file-input" id="file_input" multiple>
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
        
        <div class="row">
            @foreach ($stud_curators as $stud_curator)
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="stud_cur">
                        <div class="admin_settings">
                            <a href={{route("stud_curators.edit",$stud_curator["id"])}} class="settings_icon">
                                <i class="far fa-edit"></i>
                            </a>
                            <form action={{route("stud_curators.destroy",$stud_curator["id"])}} method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="delete_btn text-danger" type="submit"><i class="fas fa-times"></i></button>
                            </form>
                        </div>
                        <img src={{ asset($stud_curator->image) }} class = "stud_curator_image" alt="">
                    </div>
                </div>
            @endforeach
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

  
