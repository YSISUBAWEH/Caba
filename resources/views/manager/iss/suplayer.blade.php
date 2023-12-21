@extends('manager.layout.layout')
    @push('css')
  <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('arsip/template/assets/images/favicon.ico')}}">
   <!-- Datatables css -->
    <link href="{{asset('arsip/template/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('arsip/template/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('arsip/template/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('arsip/template/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('arsip/template/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('arsip/template/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
   <!-- Theme Config Js -->
    <script src="{{asset('arsip/template/assets/js/hyper-config.js')}}"></script>
   <!-- App css -->
    <link href="{{asset('arsip/template/assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
   <!-- Icons css -->
        <link href="{{asset('arsip/template/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    @endpush
    @section('content')
    <div class="row">
      <div class="col-12">
          <div class="page-title-box">
              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <!-- <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Icons</a></li>
                      <li class="breadcrumb-item active">Remix Icons</li> -->
                  </ol>
              </div>
              <h4 class="page-title">Suplayer</h4>
          </div>
      </div>
    </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div>
                  <h4 class="header-title">Data Suplayer</h4>
                    <p class="text-muted font-14">
                      ..
                    </p>
                </div>
                <div>
                  <!-- <button class="btn btn-outline-primary ps-2 pe-2" data-bs-toggle="modal" data-bs-target="#addSuplaModal">
                      <i class="ri-add-box-line"></i></button> -->
                </div>
              </div>
              <div class="table-responsive" id="loadSU">
                <h4 class="header-title text-center">Memuat ... </h4> 
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- modal -->
        <div class="modal fade" id="DetailModalSU" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Suplayer</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body p-4 bg-light" id="bodySU">
                  <!-- isi -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
  @endsection
  @push('script')
  
        <!-- Vendor js -->
        <script src="{{asset('arsip/template/assets/js/vendor.min.js')}}"></script>

        <!-- Code Highlight js -->
        <script src="{{asset('arsip/template/assets/vendor/highlightjs/highlight.pack.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/clipboard/clipboard.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/js/hyper-syntax.js')}}"></script>

        <!-- Datatables js -->
        <script src="{{asset('arsip/template/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>
        <!-- Datatable Demo Aapp js -->
        <script src="{{asset('arsip/template/assets/js/pages/demo.datatable-init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('arsip/template/assets/js/app.min.js')}}"></script>
<!-- Custom js for this page-->
  <script type="text/javascript">
    
    $(function() { 
 
      // tampilkan SMasuk ajax request
      loadSuplay();
 
      function loadSuplay() {
        $.ajax({
          url: '{{ route('M.L.suplay') }}',
          method: 'get',
          success: function(response) {
            $("#loadSU").html(response);
            $("#tasu").DataTable({
              order: [0, 'asc']
            });
            $(document).on('click', '.detail-button-su', function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var tel = $(this).data('tel');
                var al = $(this).data('al');
                var des = $(this).data('des');

                $('#bodySU').html('<div class="row">' +
                    '<div class="my-2 d-flex justify-content-between"><p>No</p><p>' + id + '</p></div>' +
                    '<div class="my-2 d-flex justify-content-between"><p>Item</p><p>' + name + '</p></div>' +
                    '<div class="my-2 d-flex justify-content-between"><p>Jumlah Barang Masuk</p><p>' + tel + '</p></div>' +
                    '<div class="my-2 d-flex justify-content-between"><p>Dari Suplayer</p><p>' + al + '</p></div>' +
                    '<div class="my-2 d-flex justify-content-between"><p>Deskripsi</p><p>' + des + '</p></div>' +
                    '</div>');
            });
          },
          error: function(data){
            var errors = data.responseJSON;
            console.log(errors);
          }
        });
      }

    });
  
  </script>
  @endpush