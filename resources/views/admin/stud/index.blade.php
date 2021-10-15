@extends('admin.layouts.admin')

@section('title',"Склад СР ІТС")

@section('content')
<style>
    .card-text{
        font-size:15px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .admin_settings{
        background: inherit;
        width:auto;
        right:0;
    }

    .settings_icon,.settings_icon:hover{
        color: gray;
    }

    @media(max-width:768px){
        .admin_settings{
            background: rgba(0,0,0,.3);
            width:100%;
        }

        .settings_icon{
            color: white;
        }
    }
</style>

<section class="content">
    <div class="container-fluid">
        @foreach ($students as $student)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src={{ asset($student->image) }} class="img-fluid rounded-start" alt="..." style="width:100%;object-fit:cover;max-height:30vh">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h5 class="card-title">{{$student->fullname}}</h5>
                            <p class="card-text text-success">{{$student->status}}</p>
                            <p class="card-text mt-0">
                                {!! $student->description !!}
                            </p>
                            <div class="social_net row">
                                @if ($student->telegram != null)
                                    <a class="btn btn-primary mx-1" style="background-color: #0082ca;" href={{$student->telegram}} target="_blank" role="button">
                                        <i class="fab fa-telegram"></i>
                                    </a>                              
                                @endif
                                @if ($student->instagram != null)
                                    <a class="btn btn-primary mx-1" style="background-color: #ac2bac;" href={{$student->instagram}} target="_blank" role="button">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif
                                @if ($student->twitter != null)
                                    <a class="btn btn-primary mx-1" style="background-color: #55acee;" href={{$student->twitter}} target="_blank" role="button">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="admin_settings">
                        <a href={{route("stud.edit",$student["id"])}} class="settings_icon">
                            <i class="far fa-edit"></i>
                        </a>
                        <form action={{route("stud.destroy",$student["id"])}} method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="delete_btn text-danger" type="submit"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<script>
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

  
