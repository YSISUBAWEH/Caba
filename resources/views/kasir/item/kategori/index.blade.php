@extends('kasir.layout.layout')
    @push('css')
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
                      <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Icons</a></li>
                      <li class="breadcrumb-item active">Remix Icons</li>
                  </ol>
              </div>
              <h4 class="page-title">Items</h4>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div>
                <h4 class="header-title">Data Kategori</h4>
                <p class="text-muted font-14">
                  ..
                </p>
              </div>
              <div>
                <button class="btn btn-outline-primary ps-2 pe-2" data-bs-toggle="modal" data-bs-target="#addKateModal">
                <i class="ri-add-box-line"></i></button>
              </div>
            </div>
            <div class="table-responsive" id="loadK">
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
                <h4 class="header-title">Data Unit</h4>
                <p class="text-muted font-14">
                  ..
                </p>
              </div>
              <div>
                <button class="btn btn-outline-primary ps-2 pe-2" data-bs-toggle="modal" data-bs-target="#addUnitModal">
                <i class="ri-add-box-line"></i></button>
              </div>
            </div>
            <div class="table-responsive" id="loadU">
              <h4 class="header-title text-center">Memuat ... </h4> 
            </div>
          </div> <!-- end card body-->
        </div> <!-- end card -->
      </div><!-- end col-->
    </div><!-- end row -->


        <!-- content-wrapper ends -->
        <!-- partial:-->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
<!--  new menu modal kate -->

<div class="modal fade" id="addKateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_kate_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-2">
          <div class="row">
            <div class="mb-3">
              <label class="fw-semibold mb-1" for="name">Kategori</label>
              <input type="text" name="name" class="form-control" placeholder="Masukkan Kategori Bary" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="add_kate_btn" class="btn btn-primary">Add Kategori</button>
        </div>
      </form>
    </div>
  </div>
</div>
 
{{-- edit menu modal kate --}}
<div class="modal fade" id="editKaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_kate_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="kame_id" id="kame_id">
          <div class="modal-body p-2">
              <div class="mb-3">
                <label for="name">Kategori</label>
                <input type="text" name="name" id="name" class="form-control" required>
              </div>
          </div>
        <div class="modal-footer">
          <button type="submit" id="edit_kate_btn" class="btn btn-success">Update Kategori</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- new menu modal unit--}}

<div class="modal fade" id="addUnitModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Unit baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_unit_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4">
            <div class="mb-3">
              <label class="fw-semibold mb-1" for="name">Unit / Ukuran / Berat</label>
              <input type="text" name="name" class="form-control" placeholder="Masukkan Unit / Ukuran / Berat" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="add_unit_btn" class="btn btn-primary">Add Kategori</button>
        </div>
      </form>
    </div>
  </div>
</div>
 
<div class="modal fade" id="editUnModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Unit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_unit_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="unit_id" id="unit_id">
          <div class="modal-body p-4 bg-light">
            <div class="row">
              <div class="mb-3">
                <label for="name">Unit / Ukuran / Berat</label>
                <input type="text" name="nameU" id="nameU" class="form-control" required>
              </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="submit" id="edit_unit_btn" class="btn btn-success">Update Kategori</button>
        </div>
      </form>
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
  <script>
    //kate
    $(function() {
 
      // add new employee ajax request
      $("#add_kate_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_kate_btn").text('Memproses ...');
        $.ajax({
          url: '{{ route('K.C.kate') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              $('#alert-show').html('<div class="alert alert-success d-flex" role="alert">'+
            '<p class="me-2"><i class="ri-check-line me-2"></i> Kayegori Berhasil Ditambahkan !</p>'+
            '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>'+
          '</div>')
              loadKa();
            }
            $("#add_kate_btn").text('Add Kategori');
            $("#add_kate_form")[0].reset();
            $("#addKateModal").modal('hide');
          }
        });
      });
 
      // edit employee ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('K.E.kate') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#name").val(response.name);
            $("#kame_id").val(response.id);
          }
        });
      });
 
      // update employee ajax request
      $("#edit_kate_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_kate_btn").text('Proses ...');
        $.ajax({
          url: '{{ route('K.U.kate') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              $('#alert-show').html('<div class="alert alert-success d-flex" role="alert">'+
            '<p class="me-2"><i class="ri-check-line me-2"></i> Kategori Berhasil Dirubah !</p>'+
            '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>'+
        '</div>')
              loadKa();
            }
            $("#edit_kate_btn").text('Update Menu');
            $("#edit_kate_form")[0].reset();
            $("#editKaModal").modal('hide');
          }
        });
      });
 
      // delete employee ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('K.D.kate') }}',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                loadKa();
              }
            });
          }
        })
      }); 
 
      // fetch all kate ajax request
      loadKa();
 
      function loadKa() {
        $.ajax({
          url: '{{ route('K.L.kate') }}',
          method: 'get',
          success: function(response) {
            $("#loadK").html(response);
            $("#taka").DataTable({
              order: [0, 'asc']
            });
          }
        });
      }

 
      // add new employee ajax request
      $("#add_unit_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_unit_btn").text('Memproses ...');
        $.ajax({
          url: '{{ route('K.C.unit') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              $('#alert-show').html('<div class="alert alert-success d-flex" role="alert">'+
            '<p class="me-2"><i class="ri-check-line me-2"></i> Unit Berhasil Ditambahkan !</p>'+
            '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>'+
            '</div>')
              loadUn();
            }
            $("#add_unit_btn").text('Add Kategori');
            $("#add_unit_form")[0].reset();
            $("#addUnitModal").modal('hide');
          }
        });
      });
 
      // edit employee ajax request
      $(document).on('click', '.editIconU', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        console.log(id)
        $.ajax({
          url: '{{ route('K.E.unit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#nameU").val(response.name);
            $("#unit_id").val(response.id);
          }
        });
      });
 
      // update employee ajax request
      $("#edit_unit_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_unit_btn").text('Proses ...');
        $.ajax({
          url: '{{ route('K.U.unit') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              $('#alert-show').html('<div class="alert alert-success d-flex" role="alert">'+
            '<p class="me-2"><i class="ri-check-line me-2"></i> Unit Berhasil Dirubah !</p>'+
            '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>'+
            '</div>')
              loadUn();
            }
            $("#edit_unit_btn").text('Update Unit');
            $("#edit_unit_form")[0].reset();
            $("#editUnModal").modal('hide');
          }
        });
      });
 
      // delete employee ajax request
      $(document).on('click', '.deleteIconU', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('K.D.unit') }}',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                loadUn();
              }
            });
          }
        })
      }); 
 
      loadUn();
 
      function loadUn() {
        $.ajax({
          url: '{{ route('K.L.unit') }}',
          method: 'get',
          success: function(response) {
            $("#loadU").html(response);
            $("#taun").DataTable({
              order: [0, 'asc']
            });
          }
        });
      }
    });
  
  </script>
  @endpush