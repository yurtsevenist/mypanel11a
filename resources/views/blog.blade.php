@extends('layouts.master')
@section('baslik', 'Blog Yazıları')
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
              <li class="breadcrumb-item"><a href="{{route('blog')}}">@yield('baslik')</a></li>
           
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Resim</th>
            <th>Başlık</th>
        
            <th>Yazar</th>
            <th>Tarih</th>
            <th>Okunma</th>
            <th>Like</th>
            <th>Dislike</th>
            <th>İşlemler</th>
          </tr>
          </thead>
          <tbody>
            @php($sayac=1)
            @foreach ($blogs as $blog )
              <tr>
                <td>{{$sayac++}}</td>
                <td><img src="{{$blog->image}}" width="50px" alt="" srcset=""></td>
                <td>{{$blog->title}}</td>             
                <td>{{$blog->author}}</td>
                <td>{{Carbon\Carbon::parse($blog->created_at)->format('d.m.Y')}}</td>
                <td>{{$blog->hit}}</td>
                <td>{{$blog->like}}</td>
                <td>{{$blog->dislike}}</td>
                <td>
                    {{-- <a class="btn btn-sm btn-primary ml-1 mb-1" title="Görüntüle" href=""><i class="fas fa-eye"></i></a> --}}
                    <a class="btn btn-sm btn-secondary ml-1 mb-1" title="Düzenle" href="{{route('blogdetail',$blog->id)}}"><i class="fas fa-pen"></i></a>
                    <a class="btn btn-sm btn-danger ml-1 mb-1 delete-click" id="{{$blog->id}}" yazar="{{$blog->author}}" title="Sil"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
         
        </table>
      </div>
    </section>
    {{-- Delete Modal Start --}}
    <div class="modal" id="deleteModal">
      <div class="modal-dialog modal-md modal-dialog-scrollable">
          <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                  <h5 class="modal-title">Blog Yazısı Sil</h5>
                  <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" id="body">
                  <p id="bilgi"></p>
              </div>
              <div class="modal-footer">
                  <form method="POST" action="{{route('blogDelete')}}">
                      @csrf
                      <input type="hidden" name="id" id="delete_id" />
                      <button id="deleteBtn" type="submit" class="btn btn-primary">Sil</button>
                  </form>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
              </div>
          </div>
        </div>
  </div>

    {{-- delete modal end --}}
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @endsection
 @section('css')
     <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('tema')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('tema')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('tema')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">  
 @endsection
 @section('js')
 <!-- DataTables  & Plugins -->
<script src="{{asset('tema')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('tema')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('tema')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('tema')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('tema')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('tema')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('tema')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('tema')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('tema')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('tema')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('tema')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('tema')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "lengthMenu": [ [25, 50,100, -1], [25, 50,100, "All"] ],
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      language: {
            info: "_TOTAL_ kayıttan _START_ ile _END_ arasındaki kayıtlar gösteriliyor.",
            infoEmpty: "Gösterilecek hiç kayıt yok.",
            loadingRecords: "Kayıtlar yükleniyor.",
            zeroRecords: "Tablo boş",
            lengthMenu: "Her sayfada _MENU_ kayıt göster",
            search: "Arama:",
            infoFiltered: "(toplam _MAX_ kayıttan filtrelenenler)",
            buttons: {
                copyTitle: "Panoya kopyalandı.",
                copySuccess: "Panoya %d satır kopyalandı",
                copy: "Kopyala",
                print: "Yazdır",
            },

            paginate: {
                first: "İlk",
                previous: "Önceki",
                next: "Sonraki",
                last: "Son"
            },
        }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
 
  });
</script>
<script>
  $(function() {
      $('.delete-click').click(function() {
          id = $(this)[0].getAttribute('id');
          yazar = $(this)[0].getAttribute('yazar');
          $('#delete_id').val(id);
          $('#bilgi').text(yazar+" tarafından yazılan blog yazısı silinecektir, onaylıyormusunuz?")
          $('#deleteModal').modal('show');
      });
  });
</script>
     
 @endsection