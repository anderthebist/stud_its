@extends('admin.layouts.admin')

@section('title',"Новости")

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/2bfv3kj9xkhl1uhx73clkjxo2chwtgbj1haawkmxfdppyfuf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')

<section class="content">
    <style>
        .admin_settings{
            background: rgba(0,0,0,.3);
            width:auto;
            right:0;
        }

        .news_media{
            width: 100%;
            height: 0;
            padding-top: 60%;
            overflow: hidden;
            position: relative;
        }

        .news_media_content{
            width: 100%;
            height: 100%;
            position: absolute;
            top:0;
            left: 0;
            object-fit: cover;
        }

        .pagin_slide{
            display: flex;
            justify-content: center;
            padding: 10px 0;
        }

        .news_dot{
            margin-right: 10px;
        }

        .card-body{
            font-size: 1vw;
        }

        @media(max-width:992px){
            .card-body{
                font-size: 1.4vw;
            }
        }

        @media(max-width:768px){
            .card-body{
                font-size: 13px;
            }
        }
    </style>

    <div class="container-fluid">
        <div class="card card-primary">
            <form action={{route("news.store")}} method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger" role="alert">
                      {{$errors->all()[0]}}
                  </div>
                @endif

                <div class="form-group">
                  <label for="input_title">Название новости</label>
                  <input type="text" class="form-control" name = "title" id="input_title" value="{{old("title")}}" placeholder="Название новости">
                </div>
                <div class="form-group">
                  <label for="input_description">Текст</label>
                  <textarea id="input_description" name="text">{{old("text")}}</textarea>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Отправить</button>
              </div>
            </form>
        </div>
        @foreach ($news as $keynews => $new)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">{{$new->title}}</h5>
                            <p class="card-text mt-0">
                                {!! $new->text !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="slider swiper-container" id="{{'slider'.$keynews}}">
                            <div class="swiper-wrapper">
                                @foreach ($new->medias as $key=>$media)
                                    <div class="news_media swiper-slide">
                                        @if ($media["type"] === "IMAGE")
                                            <img class="news_media_content swiper-lazy" data-src={{ asset($media["path"]) }} 
                                            alt={{$new->title."_".$key}}>
                                        @endif
                                        @if($media["type"] === "VIDEO")
                                            <iframe class="news_media_content swiper-lazy" data-src={{$media["path"]}}  
                                            title={{$new->title."_".$key}} 
                                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen></iframe>
                                        @endif
                                        <div class="swiper-lazy-preloader swiper-lazy-preloader"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <a href={{ route('news_media.index',[ "news_id" => $new["id"] ]) }}>
                            <button class="col-12 px-2 btn btn-primary rounded-0 col-4">
                                {{ count($new->medias) > 0 ? 'Изменить слайдер' : 'Добавить слайдер'}}
                            </button>
                        </a>
                        @if (count($new->medias) > 1)
                            <div class="pagin_slide" id="{{'pagin_slide'.$keynews}}"></div>
                        @endif
                    </div>
                    <div class="admin_settings">
                        <a href={{route("news.edit",$new["id"])}} class="settings_icon">
                            <i class="far fa-edit"></i>
                        </a>
                        <form action={{route("news.destroy",$new["id"])}} method="POST">
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

    const mediaSlider = document.querySelectorAll(".slider");

    mediaSlider.forEach((elem,index) => {
        new Swiper("#slider"+index,{
            lazy:true,
            speed:500,
            calculateHeight:true,
            watchOverflow: true,
            watchSlidesVisibility: true,
            slidesPerView: 1,
            pagination: {
                el: '#pagin_slide'+index,
                clickable: true,
                renderBullet: function (index, className) {
                    return `<div class="news_dot swiper-pagination-bullet"></div>`;
                },
            },
        })
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

  
