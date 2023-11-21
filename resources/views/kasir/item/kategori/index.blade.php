@extends('kasir.layout.layout')
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
  <style type="text/css">
    .dataTables_wrapper {
    font-size: 10px;
    position: relative;
    clear: both;
    *zoom: 1;
    zoom: 1;
}
.dataTables_length label{
  font-size: 0;
  }
  </style>
    @endpush
    @section('content')
          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title">Data Kategori</h4>
                            <p class="card-description">
                                Tabel Kategori
                            </p>
                        </div>
                        <div>
                            <button href="javascript:void(0)" class="btn btn-primary text-white btn-rounded mb-0 me-0" data-bs-toggle="modal" data-bs-target="#addKateModal">
                                <i class="mdi mdi-plus"></i></button>
                        </div>
                    </div>
                  <div class="table-responsive" id="loadK">
                    <h5 class="text-center text-secondary my-5">Loading...</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title">Data Units</h4>
                            <p class="card-description">
                                Tabel unit
                            </p>
                        </div>
                        <div>
                            <button href="javascript:void(0)" class="btn btn-primary text-white btn-rounded mb-0 me-0" data-bs-toggle="modal" data-bs-target="#addUnitModal">
                                <i class="mdi mdi-plus"></i></button>
                        </div>
                    </div>
                  <div class="table-responsive" id="loadU">
                    <h5 class="text-center text-secondary my-5">Loading...</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>


        <!-- content-wrapper ends -->
        <!-- partial:-->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
{{-- new menu modal kate--}}

<div class="modal fade" id="addKateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_kate_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4">
          <div class="row">
            <div class="my-2">
              <label class="fw-semibold mb-1" for="name">name</label>
              <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_kate_btn" class="btn btn-primary">Add Kategori</button>
        </div>
      </form>
    </div>
  </div>
</div>
 
{{-- edit menu modal kate --}}
<div class="modal fade" id="editKaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_kate_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="kame_id" id="kame_id">
          <div class="modal-body p-4 bg-light">
            <div class="row">
              <div class="my-2">
                <label for="name">name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
              </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_kate_btn" class="btn btn-success">Update Kategori</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- new menu modal unit--}}

<div class="modal fade" id="addUnitModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Unit baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_unit_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4">
          <div class="row">
            <div class="my-2">
              <label class="fw-semibold mb-1" for="name">name</label>
              <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_unit_btn" class="btn btn-primary">Add Kategori</button>
        </div>
      </form>
    </div>
  </div>
</div>
 
{{-- edit menu modal kate --}}
<div class="modal fade" id="editUnModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_unit_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="unit_id" id="unit_id">
          <div class="modal-body p-4 bg-light">
            <div class="row">
              <div class="my-2">
                <label for="name">name</label>
                <input type="text" name="nameU" id="nameU" class="form-control" placeholder="Name" required>
              </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_unit_btn" class="btn btn-success">Update Kategori</button>
        </div>
      </form>
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
              Swal.fire(
                'Added!',
                'Kategori berhasil ditambah !',
                'success'
              )
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
              Swal.fire(
                'Updated!',
                'Kategori Berhasil diubah!',
                'success'
              )
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
              Swal.fire(
                'Added!',
                'Kategori berhasil ditambah !',
                'success'
              )
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
              Swal.fire(
                'Updated!',
                'Kategori Berhasil diubah!',
                'success'
              )
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