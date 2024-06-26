 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Tüm hakları saklıdır &copy; 2023-.... <a href="{{route('dashboard')}}">MyPanel</a>.</strong>

    <div class="float-right d-none d-sm-inline-block">
      <b>Versiyon</b> 1.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('tema')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('tema')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('tema')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('tema')}}/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('tema')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('tema')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('tema')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('tema')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('tema')}}/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('tema')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('tema')}}/dist/js/pages/dashboard2.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

{{-- dark light mode change --}}
<script>

  $('.switchmode').change(function() {
 opmode=window.matchMedia('(prefers-color-scheme: dark)').matches;//işletim sisteminin dark mode veya light mode olup olmadığına bakıyoruz
 console.log(opmode) //true ise dark mode false ise light mode olduğunu anlıyoruz 
 mode = $(this)[0].getAttribute('mode');
 statu=$(this).prop('checked');
 $.get("{{route('modeswitch')}}", {mode:mode,statu:statu}, function(data,status){
   //  console.log(data);
 });
 if(statu==false)
 {
  $(document.body).removeClass('dark-mode');
  $(document.body).addClass('light-mode');
  $("nav").removeClass('navbar-dark');
  $("nav").addClass('navbar-light');
  $("aside").removeClass('sidebar-dark-primary');
  $("aside").addClass('sidebar-light-info');
 }
 else
 {
  $(document.body).removeClass('ligth-mode');
  $(document.body).addClass('dark-mode');
  $("nav").removeClass('navbar-light');
  $("nav").addClass('navbar-dark');
  $("aside").removeClass('sidebar-light-info');
  $("aside").addClass('sidebar-dark-primary');
 }
})
</script>
{{-- dark light mode change end --}}
@yield('js')
</body>
</html>

