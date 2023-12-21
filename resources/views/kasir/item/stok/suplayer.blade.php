@extends('kasir.layout.layout')
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
                  <button class="btn btn-outline-primary ps-2 pe-2" data-bs-toggle="modal" data-bs-target="#addSuplaModal">
                      <i class="ri-add-box-line"></i></button>
                </div>
              </div>
              <div class="table-responsive" id="loadS">
                <h4 class="header-title text-center">Memuat ... </h4> 
              </div>
            </div>
          </div>
        </div>
      </div>

<div class="modal fade" id="addSuplaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menambah Suplayer Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_supla_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-2">
            <div class="mb-3">
              <label class="fw-semibold mb-1" for="name">Nama Suplayer</label>
              <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Suplayer" required>
            </div>
              <div class="mb-3">
                <label for="name">Nomor Telepon</label>
                <input type="text" name="telepon" class="form-control" placeholder="Masukkan Nomor Telepon">
              </div>
            <div class="mb-3">
              <label class="fw-semibold mb-1" for="harga">Alamat</label>
              <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
            </div>
            <div class="mb-3">
              <label class="fw-semibold mb-1" for="harga">Deskripsi</label>
              <input type="text-area" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="add_supla_btn" class="btn btn-primary">Selesai</button>
        </div>
      </form>
    </div>
  </div>
</div>
 
{{-- edit menu modal kate --}}
<div class="modal fade" id="editSuModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mengedit Data Suplayer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_supla_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="me_id" id="me_id">
          <div class="modal-body p-2">
              <div class="mb-3">
                <label for="name">Nama Suplayer</label>
                <input type="text" name="name" id="name" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="name">Nomor Telepon</label>
                <input type="text" name="telepon" id="telepon" class="form-control">
              </div>
              <div class="mb-3">
                <label for="name">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control">
              </div>
              <div class="mb-3">
                <label for="name">Deskripsi</label>
                <input type="text-area" name="deskripsi" id="deskripsi" class="form-control">
              </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="submit" id="edit_supla_btn" class="btn btn-success">Update Kategori</button>
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
  <!-- Custom js for this page-->
  <script type="text/javascript">
    
    //item
    $(function() {
 
      // add new employee ajax request
      $("#add_supla_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_supla_btn").text('Memproses ...');
        $.ajax({
          url: '{{ route('K.C.suplay') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
             $('#alert-show').html('<div class="alert alert-success d-flex" role="alert">'+
            '<p class="me-2"><i class="ri-check-line me-2"></i> Data Suplayer Berhasil Ditambahkan !</p>'+
            '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>'+
            '</div>')
              loadSuplay();
            }
            $("#add_supla_btn").text('Add Kategori');
            $("#add_supla_form")[0].reset();
            $("#addSuplaModal").modal('hide');
          },error: function(data){
       var errors = data.responseJSON;
       console.log(errors);
   }
        });
      });
 
      // edit employee ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('K.E.suplay') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
             $("#name").val(response.name);
            $("#telepon").val(response.telepon);
            $("#alamat").val(response.alamat);
            $("#deskripsi").val(response.deskripsi);
            $("#me_id").val(response.id);
          }
        });
      });
 
      // update employee ajax request
      $("#edit_supla_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_supla_btn").text('Proses ...');
        $.ajax({
          url: '{{ route('K.U.suplay') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              $('#alert-show').html('<div class="alert alert-success d-flex" role="alert">'+
            '<p class="me-2"><i class="ri-check-line me-2"></i> Data Suplayer Berhasil Dirubah !</p>'+
            '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>'+
            '</div>')
              loadSuplay();
            }
            $("#edit_supla_btn").text('Update Menu');
            $("#edit_supla_form")[0].reset();
            $("#editSuModal").modal('hide');
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
              url: '{{ route('K.D.suplay') }}',
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
                loadSuplay();
              }
            });
          }
        })
      }); 
 
      // fetch all kate ajax request
      loadSuplay();
 
      function loadSuplay() {
        $.ajax({
          url: '{{ route('K.L.suplay') }}',
          method: 'get',
          success: function(response) {
            $("#loadS").html(response);
            $("#tasu").DataTable({
              order: [0, 'asc']
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
