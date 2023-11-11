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
                <div class="d-sm-flex justify-content-between align-items-start">
                  <div>
                    <h4 class="card-title">Stok Masuk</h4>
                    <p class="card-description">
                      
                    </p>
                  </div>
                  <div>
                    <button href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSmModal">
                      <i class="ti-plus p-2"></i>Tambah</button>
                  </div>
                </div>
                <div class="table-responsive" id="loadSM">
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
                    <h4 class="card-title">Stok Keluar</h4>
                    <p class="card-description">
                      
                    </p>
                  </div>
                  <div>
                    <button href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSkModal">
                      <i class="ti-plus p-2"></i>Tambah</button>
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
        <!-- partial:-->
        
        <!-- partial -->
        
        <!-- modal stok masuk -->

<div class="modal fade" id="addSmModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-light">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Stok Masuk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_sm_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4">
          <div class="row">
            <div class="my-2">
              <label for="items">Pilih Items</label>
                <select class="form-control" name="item" required>
                  <option selected="Select">----Pilih Items----</option>
                  @foreach ($item as $i)
                    <option value="{{ $i->id }}" class="p-2" style="padding: 0; display: flex; justify-content: space-between; align-items: center;">
    <span style="margin: 0;">{{ $i->name }}</span>
    <span style="margin: 0;">{{ $i->stok }}</span>
</option>


                  @endforeach
                </select>
            </div>
            <div class="my-2">
              <label for="items">Pilih Suplayer</label>
                <select class="form-control" name="suplayer">
                  <option selected="Select">----Pilih Suplayer---</option>
                  @foreach ($suplayer as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="my-2">
               <label for="name">stok</label>
               <input type="text" name="stok" class="form-control" placeholder="stok">
            </div>
            <div class="my-2">
              <label class="fw-semibold mb-1" for="harga">Deskripsi</label>
              <input type="text-area" name="deskripsi" class="form-control" placeholder="Deskripsi" required>
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_sm_btn" class="btn btn-primary">Selesai</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal stok keluar -->

<div class="modal fade" id="addSkModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_sk_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4">
          <div class="row">
            <div class="my-2">
              <label for="items">Pilih Items</label>
                <select class="form-control" name="item" required>
                  <option selected="Select">----Pilih Items----</option>
                  @foreach ($item as $i)
                    <option value="{{ $i->id }}">{{ $i->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="my-2">
               <label for="name">stok</label>
               <input type="text" name="stok" class="form-control" placeholder="stok">
            </div>
            <div class="my-2">
              <label class="fw-semibold mb-1" for="harga">Deskripsi</label>
              <input type="text-area" name="deskripsi" class="form-control" placeholder="Deskripsi" required>
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_sk_btn" class="btn btn-primary">Selesai</button>
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
  <script src="{{asset('arsip/admin/js/settings.js')}}"></script>
  <script src="{{asset('arsip/admin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script type="text/javascript">
    
    $(function() {
 
      // add new employee ajax request
      $("#add_sm_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_sm_btn").text('Memproses ...');
        $.ajax({
          url: '{{ route('M.C.stokM') }}',
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
              loadSMasuk();
            }
            $("#add_sm_btn").text('Stok Masuk');
            $("#add_sm_form")[0].reset();
            $("#addSmModal").modal('hide');
          },error: function(data){
       var errors = data.responseJSON;
       console.log(errors);
   }
        });
      });

 
      // delete employee ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let item = $(this).attr('data-item');
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
              url: '{{ route('M.D.stokM') }}',
              method: 'delete',
              data: {
                id: id,
                item: item,
                _token: csrf
              },
              success: function(response) {
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                loadSMasuk();
              }
            });
          }
        })
      }); 
 
      // fetch all kate ajax request
      loadSMasuk();
 
      function loadSMasuk() {
        $.ajax({
          url: '{{ route('M.L.stokM') }}',
          method: 'get',
          success: function(response) {
            $("#loadSM").html(response);
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

      $("#add_sk_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_sk_btn").text('Memproses ...');
        $.ajax({
          url: '{{ route('M.C.stokK') }}',
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
                'Stok berhasil Keluar !',
                'success'
              )
              loadKeluar();
            }
            $("#add_sk_btn").text('Stok Keluar');
            $("#add_sk_form")[0].reset();
            $("#addSkModal").modal('hide');
          },error: function(data){
       var errors = data.responseJSON;
       console.log(errors);
   }
        });
      });

 
      // delete employee ajax request
      $(document).on('click', '.deleteIconK', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let item = $(this).attr('data-item');
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
              url: '{{ route('M.D.stokK') }}',
              method: 'delete',
              data: {
                id: id,
                item: item,
                _token: csrf
              },
              success: function(response) {
                Swal.fire(
                  'Deleted!',
                  'Stok yang Keluar dibatalkan',
                  'success'
                )
                loadKeluar();
              }
            });
          }
        })
      }); 
 
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