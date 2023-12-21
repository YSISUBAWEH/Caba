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
                     <!--  <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Icons</a></li>
                      <li class="breadcrumb-item active">Remix Icons</li> -->
                  </ol>
              </div>
              <h4 class="page-title">Inventory Stok</h4>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div>
                <h4 class="header-title">Data Stok Masuk</h4>
                <p class="text-muted font-14">
                  Digunakan untuk menambah stok pada suatu item
                </p>
              </div>
              <div>
                <!-- <button class="btn btn-outline-primary ps-2 pe-2" data-bs-toggle="modal" data-bs-target="#addSmModal">
                <i class="ri-add-box-line"></i></button> -->
              </div>
            </div>
            <div class="table-responsive" id="loadSM">
              <h4 class="header-title text-center">Memuat ... </h4>  
            </div>
          </div> <!-- end card body-->
        </div> <!-- end card -->
      </div><!-- end col-->
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div>
                <h4 class="header-title">Data Stok Keluar</h4>
                <p class="text-muted font-14">
                  Data Diperoleh dari input kasir apabila barang rusak, kadaluarsa , dll.
                  Data Juga diperoleh dari setiap penjualan yang terjadi.
                </p>
              </div>
              <div>
                <!-- <button class="btn btn-outline-primary ps-2 pe-2" data-bs-toggle="modal" data-bs-target="#addSkModal">
                <i class="ri-add-box-line"></i></button> -->
              </div>
            </div>
            <div class="table-responsive" id="loadSK">
              <h4 class="header-title text-center">Memuat ... </h4> 
            </div>
          </div> <!-- end card body-->
        </div> <!-- end card -->
      </div><!-- end col-->
    </div><!-- end row -->

      <!-- modal -->
        <div class="modal fade" id="DetailModalSM" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Stok Barang Masuk</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body p-4 bg-light" id="bodySM">
                  <!-- isi -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="DetailModalSK" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Stok Barang Keluar</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body p-4 bg-light" id="bodySK">
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

      // fetch all kate ajax request
      loadSMasuk();
 
      function loadSMasuk() {
        $.ajax({
          url: '{{ route('M.L.stokM') }}',
          method: 'get',
          success: function(response) {
            $("#loadSM").html(response);
            $("#tasm").DataTable({
              order: [0, 'asc']
            });
            $(document).on('click', '.detail-button-sm', function () {
                var id = $(this).data('id');
                var item = $(this).data('item');
                var stok = $(this).data('stok');
                var sup = $(this).data('sup');
                var des = $(this).data('des');

                $('#bodySM').html('<div class="row">' +
                    '<div class="my-2 d-flex justify-content-between"><p>No</p><p>' + id + '</p></div>' +
                    '<div class="my-2 d-flex justify-content-between"><p>Item</p><p>' + item + '</p></div>' +
                    '<div class="my-2 d-flex justify-content-between"><p>Jumlah Barang Masuk</p><p>' + stok + '</p></div>' +
                    '<div class="my-2 d-flex justify-content-between"><p>Dari Suplayer</p><p>' + sup + '</p></div>' +
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
 
      // fetch all kate ajax request
      loadKeluar();
 
      function loadKeluar() {
        $.ajax({
          url: '{{ route('M.L.stokK') }}',
          method: 'get',
          success: function(response) {
            $("#loadSK").html(response);
            $("#task").DataTable({
              order: [0, 'asc']
            });
            $(document).on('click', '.detail-button-sk', function () {
                var id = $(this).data('id');
                var item = $(this).data('item');
                var stok = $(this).data('stok');
                var us = $(this).data('us');
                var des = $(this).data('des');

                $('#bodySK').html('<div class="row">' +
                    '<div class="my-2 d-flex justify-content-between"><p>No</p><p>' + id + '</p></div>' +
                    '<div class="my-2 d-flex justify-content-between"><p>Item</p><p>' + item + '</p></div>' +
                    '<div class="my-2 d-flex justify-content-between"><p>Jumlah Barang Masuk</p><p>' + stok + '</p></div>' +
                    '<div class="my-2 d-flex justify-content-between"><p>Ditangani Oleh</p><p>' + us + '</p></div>' +
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