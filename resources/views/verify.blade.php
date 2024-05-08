<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Panel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('back')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('back')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('back')}}/dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="{{asset('back')}}/dist/img/logo.png" type="image/x-icon">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
    <p><b>My </b>Panel</p> 
    </div>

    <div class="container h-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">E-Posta Adresinizi Doğrulayın</div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('A fresh verification link has been sent to your email address.') }}
                       </div>
                   @endif
                  
                   {{-- <a href="https://kelebek.ihmtal.com/{{$token}}/reset-password">Şifrenizi değiştirmek için tıklayın</a> --}}
                    <a href="http://127.0.0.1:8000/{{$token}}/reset-password">Şifrenizi Sıfırlamak için Tıklayın</a>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- jQuery -->
<script src="{{asset('back')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('back')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('back')}}/dist/js/adminlte.min.js"></script>
</body>
</html>

