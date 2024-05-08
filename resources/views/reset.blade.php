<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyPanel | Üye Kayıt</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('tema')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('tema')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('tema')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page dark-mode">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>My</b>PANEL</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">     
          @include('hatakontrol') 
      </p>

      <form action="{{route('updatePassword')}}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
 <div class="input-group mb-3">
   <input type="email" class="form-control" placeholder="E-Posta Adresiniz" required name="email">
   <div class="input-group-append">
     <div class="input-group-text">
       <span class="fas fa-envelope"></span>
     </div>
   </div>
 </div>
 <div class="input-group mb-3">
   <input type="password" class="form-control" placeholder="Şifreniz" required name="password">
   <div class="input-group-append">
     <div class="input-group-text">
       <span class="fas fa-lock"></span>
     </div>
   </div>
 </div>
 <div class="input-group mb-3">
   <input type="password" class="form-control" placeholder="Şifre Tekrar" name="password_confirmation" required>
   <div class="input-group-append">
     <div class="input-group-text">
       <span class="fas fa-lock"></span>
     </div>
   </div>
 </div>
 <div class="row">
 
   <div class="col-12">
     <button type="submit" class="btn btn-primary btn-block">Güncelle</button>
   </div>
   <!-- /.col -->
 </div>
</form>

     
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('tema')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('tema')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('tema')}}/dist/js/adminlte.min.js"></script>
</body>
</html>
