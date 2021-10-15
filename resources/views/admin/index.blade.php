@extends('admin.layouts.admin')

@section('title',"Главная")

@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Главная</h3>
              </div>
              <div class="icon">
                <i class="fas fa-home"></i>
              </div>
              <a href={{route("admin")}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Новости</h3>
              </div>
              <div class="icon">
                <i class="far fa-newspaper"></i>
              </div>
              <a href={{route("news.index")}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Шапки</h3>
              </div>
              <div class="icon">
                <i class="fas fa-th"></i>
              </div>
              <a href={{route("header.index")}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Склад СР ІТС</h3>
              </div>
              <div class="icon">
                <i class="fas fa-university"></i>
              </div>
              <a href={{route("stud.index")}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>Студкураторы</h3>
              </div>
              <div class="icon">
                <i class="fas fa-user-friends"></i>
              </div>
              <a href={{route("stud_curators.index")}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>Mister & Miss ITS</h3>
              </div>
              <div class="icon">
                <i class="fas fa-venus-mars"></i>
              </div>
              <a href={{route("mister_miss.index")}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3>KPIAbitFest</h3>
              </div>
              <div class="icon">
                <i class="fas fas fa-map-marked-alt"></i>
              </div>
              <a href={{route("abit_fest.index")}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>OpenAir</h3>
              </div>
              <div class="icon">
                <i class="fas fa-paper-plane"></i>
              </div>
              <a href={{route("open_air.index")}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.control-sidebar -->
@endsection

  
