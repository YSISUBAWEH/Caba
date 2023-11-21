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
    @endpush
    @section('content')
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-start">
                  <div>
                    <h4 class="card-title card-title-dash">Data Item</h4>
                    <p class="card-subtitle card-subtitle-dash">Tabel Informasi Item</p>
                  </div>
                  <div>
                    <button href="javascript:void(0)" class="btn btn-primary text-white btn-rounded mb-0 me-0" data-bs-toggle="modal" data-bs-target="#addItemModal" type="button"><i class="mdi mdi-plus"></i></button>
                  </div>
                </div>
                <div class="table-responsive" id="loadI">
                  <h5 class="text-center text-secondary my-5">Loading...</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:-->
        
        <!-- partial -->
        {{-- new menu modal kate--}}

<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_item_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4">
          <div class="row">
            <div class="my-2">
              <label class="fw-semibold mb-1" for="name">name</label>
              <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="my-2">
              <label class="fw-semibold mb-1" for="harga">harga</label>
              <input type="text" name="harga" class="form-control" placeholder="Name" required>
            </div>
            <div class="my-2">
              <label for="kategori_menu">Kategori</label>
                <select class="form-control" name="kategori" required>
                  <option selected="Select">----Pilih Kategori----</option>
                  @foreach ($kategori as $k)
                    <option value="{{ $k->kode_kate }}">{{ $k->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="my-2">
              <label for="unit">Unit/Size</label>
                <select class="form-control" name="unit" required>
                  <option selected="Select">----Pilih Unit----</option>
                  @foreach ($unit as $k)
                    <option value="{{ $k->kode_uk }}">{{ $k->name }}</option>
                  @endforeach
                </select>
            </div>

            <div class="my-2">
              <label for="foto">Select Image</label>
              <input type="file" name="img" class="form-control" required>
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_item_btn" class="btn btn-primary">Selesai</button>
        </div>
      </form>
    </div>
  </div>
</div>
 
{{-- edit menu modal kate --}}
<div class="modal fade" id="editItModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_item_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="me_id" id="me_id">
        <input type="hidden" name="me_img" id="me_img">
          <div class="modal-body p-4 bg-light">
            <div class="row">
              <div class="my-2">
                <label for="name">name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
              </div>
              <div class="my-2">
                <label for="name">name</label>
                <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga" required>
              </div>
              <div class="my-2">
              <label for="kategori_menu">Kategori</label>
              <select class="form-control" name="kategori" id="kategori" required>
                  <option selected="Select">----Pilih Kategori----</option>
               @foreach ($kategori as $k)
                  <option value="{{ $k->kode_kate}}" {{ $k->kode_kate == 1 ? 'selected' : '' }}>{{ $k->name }}</option>
               @endforeach
            </select>
            </div>
            <div class="my-2">
              <label for="kategori_menu">Unit</label>
              <select class="form-control" name="unit" id="unit" required>
                  <option selected="Select">----Pilih Unit----</option>
               @foreach ($unit as $k)
                  <option value="{{ $k->kode_uk }}" {{ $k->kode_uk == 1 ? 'selected' : '' }}>{{ $k->name }}</option>
               @endforeach
              </select>
            </div>
            <div class="my-2">
              <label for="foto">Select Foto</label>
              <input type="file" name="img" class="form-control" required>
            </div>
              <div class="mt-2" id="img"></div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_item_btn" class="btn btn-success">Update Kategori</button>
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
  <script type="text/javascript">
    
    //item
    $(function() {
 
      // add new employee ajax request
      $("#add_item_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_item_btn").text('Memproses ...');
        $.ajax({
          url: '{{ route('K.C.item') }}',
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
                'Item berhasil ditambah !',
                'success'
              )
              loadItem();
            }
            $("#add_item_btn").text('Add Kategori');
            $("#add_item_form")[0].reset();
            $("#addItemModal").modal('hide');
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
          url: '{{ route('K.E.item') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
             $("#name").val(response.name);
            $("#harga").val(response.harga);
            $("#kategori").val(response.kode_kate);
            $("#unit").val(response.kode_uk);
            $("#img").html(
              `<img src="/arsip/data/img/${response.img}" width="180" class="img-fluid img-thumbnail">`);
            $("#me_id").val(response.id);
            $("#me_img").val(response.img);
          }
        });
      });
 
      // update employee ajax request
      $("#edit_item_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_item_btn").text('Proses ...');
        $.ajax({
          url: '{{ route('K.U.item') }}',
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
                'Item Berhasil diubah!',
                'success'
              )
              loadItem();
            }
            $("#edit_item_btn").text('Update Menu');
            $("#edit_item_form")[0].reset();
            $("#editItModal").modal('hide');
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
              url: '{{ route('K.D.item') }}',
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
                loadItem();
              }
            });
          }
        })
      }); 
 
      // fetch all kate ajax request
      loadItem();
 
      function loadItem() {
        $.ajax({
          url: '{{ route('K.L.item') }}',
          method: 'get',
          success: function(response) {
            $("#loadI").html(response);
            $("#tait").DataTable({
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
