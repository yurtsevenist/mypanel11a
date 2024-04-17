@extends('layouts.master')
@section('baslik', 'Blog Detay')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0">@yield('baslik')</h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Anasayfa</a></li>
              <li class="breadcrumb-item"><a href="{{route('blog')}}">Blog Yazıları</a></li>
              <li class="breadcrumb-item"><a href="">@yield('baslik')</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <form  method="POST" action="" enctype="multipart/form-data">
        @csrf
       <div class="row">
         <div class="col-md-6">
          <div class="form-group">
            <label for="title">Blog Başlığı</label>
          <input class="form-control" type="text" name=title" value="{{$blog->title}}"> 
          </div>
          <div class="form-group">
            <label for="title">İçerik Metni</label>
          <textarea id="summernote" class="form-control" rows="5" name=content">{{$blog->content}}</textarea>
          </div>
         </div>
        <div class="col-md-6 text-center">
           <img src="{{$blog->image}}" width="90%" alt="" srcset="">
        </div>
       </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @endsection
 @section('css')
 <link rel="stylesheet" href="{{asset('tema')}}/plugins/summernote/summernote-bs4.min.css">
 @endsection
 @section('js')
 <script src="{{asset('tema')}}/plugins/summernote/summernote-bs4.min.js"></script>
 <script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
 @endsection