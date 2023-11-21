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
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex align-items-start">
                <div>
                  <h4 class="card-title">Suplayer</h4>
                  <p class="card-description">Tabel Suplayer</p>
                </div>
              </div>
              <div class="table-responsive" id="loadSU">
                <p class="text-center text-secondary my-5">Loading...</p>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- content-wrapper ends -->
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