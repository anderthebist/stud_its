@extends('admin.layouts.admin')

@section('title',"Шапки")

@section('styles')
    <link rel="stylesheet" href={{ asset("/css/header.css") }}>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @foreach ($headers as $header)
            <header class="header mb-3">
                <div class="title_contain">
                    <h1 class="header_title">{{$header->title}}</h1>
                </div>
                <div class="header_shadow">
                    <div class="admin_settings">
                        <a href={{route("header.edit",$header["id"])}}>
                            <i class="far fa-edit"></i>
                        </a>
                    </div>
                </div>
                <img class="header_image" src="{{ asset($header->image) }}" alt="">
            </header>
        @endforeach
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.control-sidebar -->
@endsection

  
