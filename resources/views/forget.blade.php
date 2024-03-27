<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Forgot Password (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('tema')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('tema')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('tema')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page dark-mode">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="#" class="h1"><b>My</b>PANEL</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Şifrenizi hatırlamıyorsanız e-posta adresinizi girerek yeni şifrenizi belirleyebiirsiniz.</p>
      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="E-Posta Adresiniz">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Şifremi Sıfırla</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="{{url('/')}}">Giriş</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('tema')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('tema')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('tema')}}/dist/js/adminlte.min.js"></script>
</body>
</html>
