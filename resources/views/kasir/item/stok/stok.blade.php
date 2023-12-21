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
                      <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Icons</a></li>
                      <li class="breadcrumb-item active">Remix Icons</li>
                  </ol>
              </div>
              <h4 class="page-title">Inventory Stok</h4>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-tabs nav-bordered mb-3">
              <li class="nav-item w-50 text-end">
                <a href="#show-stok-in" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                  Stok Masuk
                </a>
              </li>
              <li class="nav-item w-50">
                <a href="#show-stok-out" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                  Stok Keluar
                </a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane show active" id="show-stok-in">
                <div class="d-flex justify-content-between">
                  <div>
                    <h4 class="header-title">Data Stok Masuk</h4>
                    <p class="text-muted font-14">
                      Digunakan untuk menambah stok pada suatu item
                    </p>
                  </div>
                  <div>
                    <button class="btn btn-outline-primary ps-2 pe-2" data-bs-toggle="modal" data-bs-target="#addSmModal">
                    <i class="ri-add-box-line"></i></button>
                  </div>
                </div>
                <div class="table-responsive" id="loadSM">
                  <h4 class="header-title text-center">Memuat ... </h4>  
                </div>
              </div>
              <div class="tab-pane show" id="show-stok-out">
                <div class="d-flex justify-content-between">
                  <div>
                    <h4 class="header-title">Data Stok Keluar</h4>
                    <p class="text-muted font-14">
                      Data Diperoleh dari input kasir apabila barang rusak, kadaluarsa , dll.
                      Data Juga diperoleh dari setiap penjualan yang terjadi.
                    </p>
                  </div>
                  <div>
                    <button class="btn btn-outline-primary ps-2 pe-2" data-bs-toggle="modal" data-bs-target="#addSkModal">
                    <i class="ri-add-box-line"></i></button>
                  </div>
                </div>
                <div class="table-responsive" id="loadSK">
                  <h4 class="header-title text-center">Memuat ... </h4> 
                </div>
              </div>
            </div>
          </div> <!-- end card body-->
        </div> <!-- end card -->
      </div><!-- end col-->
    </div><!-- end row -->

        <!-- modal stok masuk -->

<div class="modal fade" id="addSmModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-right">
    <div class="modal-content bg-light">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Stok Masuk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_sm_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-2">
          <div class="mb-3">
            <label for="items">Pilih Items</label>
            <select class="form-control" name="item" required>
              <option selected="Select">----Pilih Items----</option>
              @foreach ($item as $i)
              <option value="{{ $i->id }}" class="p-2" style="padding: 0; display: flex; justify-content: space-between; align-items: center;">
                <span style="margin: 0;">{{ $i->name }}</span>---
                <span style="margin: 0;">{{ $i->stok }}</span>
              </option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="items">Pilih Suplayer</label>
            <select class="form-control" name="suplayer">
              <option selected="Select">----Pilih Suplayer---</option>
              @foreach ($suplayer as $s)
                <option value="{{ $s->id }}">{{ $s->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="name">Jumlah Stok Masuk</label>
            <input type="text" name="stok" class="form-control" placeholder="Masukkan Jumlah Stok">
          </div>
          <div class="mb-3">
            <label class="fw-semibold mb-1" for="harga">Deskripsi</label>
            <input type="text-area" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="add_sm_btn" class="btn btn-primary">Selesai</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal stok keluar -->

<div class="modal fade" id="addSkModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Stok Keluar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_sk_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-2">
          <div class="mb-3">
            <label for="items">Pilih Items</label>
            <select class="form-control" name="item" required>
              <option selected="Select">----Pilih Items----</option>
              @foreach ($item as $i)
                <option value="{{ $i->id }}">{{ $i->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
             <label for="name">Jumlah Stok Keluar</label>
             <input type="text" name="stok" class="form-control" placeholder="Masukkan Jumlah Stok">
          </div>
          <div class="mb-3">
            <label class="fw-semibold " for="harga">Deskripsi</label>
            <input type="text-area" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" required>
          </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="add_sk_btn" class="btn btn-primary">Selesai</button>
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
    
    $(function() {
 
      // add new employee ajax request
      $("#add_sm_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_sm_btn").text('Memproses ...');
        $.ajax({
          url: '{{ route('K.C.stokM') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              $('#alert-show').html('<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert">'+
            '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>'+
            '<i class="ri-information-line me-2"></i> Stok berhasil ditambah !'+
        '</div>');
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
              url: '{{ route('K.D.stokM') }}',
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
          url: '{{ route('K.L.stokM') }}',
          method: 'get',
          success: function(response) {
            $("#loadSM").html(response);
            $("#tasm").DataTable({
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
          url: '{{ route('K.C.stokK') }}',
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
              url: '{{ route('K.D.stokK') }}',
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
          url: '{{ route('K.L.stokK') }}',
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