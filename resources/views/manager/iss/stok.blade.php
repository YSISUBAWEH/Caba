@extends('manager.layout.layout')
    @push('css')
        <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('arsip/admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('arsip/admin/images/favicon.png')}}" />
    @endpush
    @section('content')
      <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex align-items-start">
                <div>
                  <h4 class="card-title">Stok Masuk</h4>
                  <p class="card-description"></p>
                </div>
              </div>
              <div class="table-responsive" id="loadSM">
                <p class="text-center text-secondary my-5">Loading...</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex align-items-start">
                <div>
                  <h4 class="card-title">Stok Keluar</h4>
                  <p class="card-description"></p>
                </div>
              </div>
              <div class="table-responsive" id="loadSK">
                <h5 class="text-center text-secondary my-5">Loading...</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- content-wrapper ends -->
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
  <!-- plugins:js -->
  <script src='https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js'></script>
  <script src="{{asset('arsip/admin/vendors/js/vendor.bundle.base.js')}}"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('arsip/admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('arsip/admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('arsip/admin/js/template.js')}}"></script>
  <script src="{{asset('arsip/admin/js/settings.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script type="text/javascript">
    
    $(function() { 
 
      // tampilkan SMasuk ajax request
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