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
   <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.min.css
" rel="stylesheet">

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
              <h4 class="page-title">Items</h4>
          </div>
      </div>
    </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div>
                  <h4 class="header-title">Data Items</h4>
                    
                  </div>
                  <div>
                    <button class="btn btn-outline-primary ps-2 pe-2" data-bs-toggle="modal" data-bs-target="#add-item-modal"><i class="ri-add-box-line"></i></button>
                    <div class="dropdown">
              <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a href="{{route('K.PDF.item')}}" class="dropdown-item">print</a>
              </div>
            </div>
                  </div>
                </div>
                <div class="table-responsive" id="multi-item-preview">
                  <h4 class="header-title text-center">Memuat ... </h4>                                         
                </div>
                                    
            </div> <!-- end card body-->
          </div> <!-- end card -->
        </div><!-- end col-->
      </div> <!-- end row-->

    <div id="add-item-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-full-width">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Menambah Item Baru</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
          </div>
          <form enctype="multipart/form-data" id="add_item_form">
            @csrf
            <div class="modal-body p-2">
              <div class="row mb-3">
                <div class="col-4">
                  <label class="fw-semibold mb-1" for="name">Bar-Code  Item / <span class="font-10">Opsional</span></label>
                  <input type="text" name="sku" class="form-control" placeholder="Masukkan SKU / Bar-Code Item">
                  <div class="error-form"></div>
                </div>
                <div class="col-4">
                  <label class="fw-semibold mb-1" for="name">Nama Item</label>
                  <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Item" required>
                  <div class="error-form"></div>
                </div>                
                <div class="col-4">
                  <label class="fw-semibold mb-1" for="harga">Harga Item</label>
                  <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Item" required>
                  <div class="error-form"></div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-6">
                  <label for="kategori_menu">Kategori</label>
                    <select class="form-control" name="kategori" required>
                      <option selected="Select">----Pilih Kategori Item----</option>
                      @foreach ($kategori as $k)
                        <option value="{{ $k->kode_kate }}">{{ $k->name }}</option>
                      @endforeach
                    </select>
                    <div class="error-form"></div>
                </div>
                <div class="col-6">
                  <label for="unit">Unit/Ukuran</label>
                    <select class="form-control" name="unit" required>
                      <option selected="Select">----Pilih Unit Item----</option>
                      @foreach ($unit as $k)
                        <option value="{{ $k->kode_uk }}">{{ $k->name }}</option>
                      @endforeach
                    </select>
                    <div class="error-form"></div>
                </div>  
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" id="add_item_btn" class="btn btn-primary w-100">Selesai</button>
            </div>
          </form>
        </div>
      </div>
    </div>

{{-- edit item --}}
    <div id="edit-item-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-full-width">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Item</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
          </div>
          <form id="edit_item_form" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <input type="hidden" name="me_id" id="me_id">
              <input type="hidden" name="me_img" id="me_img">
              <div class="row mb-3">
                <div class="col-4">
                  <label class="fw-semibold" for="name">Bar-Code  Item</label>
                  <input type="text" name="sku" id="sku" class="form-control" placeholder="Masukkan SKU / Bar-Code Item" required>
                </div>
                <div class="col-4">
                  <label for="name">Nama Item</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Item" required>
                </div>
                <div class="col-4">
                  <label for="name">Harga Item</label>
                  <input type="text" name="harga" id="harga" class="form-control" placeholder="Masukkan Harga Item" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-6">
                  <label for="kategori_menu">Kategori</label>
                  <select class="form-control" name="kategori" id="kategori" required>
                      <option selected="Select">----Pilih Kategori----</option>
                   @foreach ($kategori as $k)
                      <option value="{{ $k->kode_kate}}" {{ $k->kode_kate == 1 ? 'selected' : '' }}>{{ $k->name }}</option>
                   @endforeach
                  </select>
                </div>
                <div class="col-6">
                  <label for="kategori_menu">Unit</label>
                  <select class="form-control" name="unit" id="unit" required>
                      <option selected="Select">----Pilih Unit----</option>
                   @foreach ($unit as $k)
                      <option value="{{ $k->kode_uk }}" {{ $k->kode_uk == 1 ? 'selected' : '' }}>{{ $k->name }}</option>
                   @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" id="edit_item_btn" class="btn btn-success w-100">Selesai</button>
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
 <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js
"></script>
  <!-- Datatable Demo Aapp js -->
  <script src="{{asset('arsip/template/assets/js/pages/demo.datatable-init.js')}}"></script>  
  <!-- App js -->
  <script src="{{asset('arsip/template/assets/js/app.min.js')}}"></script>
  <!-- Custom js for this page-->
  <script type="text/javascript">
    
    //item
    $(function() {
 
      // add new employee ajax request
      $("#add_item_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        console.log(fd);
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
              $('#alert-show').html('<div class="alert alert-success d-flex" role="alert">'+
            '<p class="me-2"><i class="ri-check-line me-2"></i> Item Berhasil Ditambahkan !</p>'+
            '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>'+
        '</div>')
              loadItem();
            }
            $("#add_item_btn").text(' Item');
            $("#add_item_form")[0].reset();
            $("#add-item-modal").modal('hide');
          },error: function(data){
            if (data.status == 422) {
                var errors = data.responseJSON.errors;
                var errorHtml = '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show mt-1" role="alert">';
                $.each(errors, function(key, value) {
                    errorHtml += '<i class="ri-close-line me-2"></i><strong>Gagal </strong>' + value + '<br>';
                });
                errorHtml += '</div>';
                $('#error-form').html(errorHtml);
            }
            $("#add_item_btn").text(' Item');
           var errors = data.responseJSON;
           console.log(errors);
          }
        });
      });
 
      // edit item ajax request
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
             $("#sku").val(response.SKU);
             $("#name").val(response.name);
            $("#harga").val(response.harga);
            $("#kategori").val(response.kode_kate);
            $("#unit").val(response.kode_uk);
            $("#me_id").val(response.id);
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
               $('#alert-show').html('<div class="alert alert-success d-flex" role="alert">'+
            '<p class="me-2"><i class="ri-check-line me-2"></i> Item Berhasil Di Ubah !</p>'+
            '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>'+
        '</div>')
              loadItem();
            }
            $("#edit_item_btn").text('Update Menu');
            $("#edit_item_form")[0].reset();
            $("#edit-item-modal").modal('hide');
          },error: function(data){
       var errors = data.responseJSON;
       console.log(errors);
   }
        });
      });
 
      $(document).on('click', '.deleteIcon', function (e) {
    e.preventDefault();
    let id = $(this).attr('id');

    if (confirm("Are you sure?")) {
        let csrf = '{{ csrf_token() }}';
        $.ajax({
            url: '{{ route('K.D.item') }}',
            method: 'delete',
            data: {
                id: id,
                _token: csrf
            },
            success: function (response) {
                if (response.status == 200) {
                    $('#alert-show').html('<div class="alert alert-success d-flex" role="alert">' +
                        '<p class="me-2"><i class="ri-check-line me-2"></i> Item Berhasil Di Ubah !</p>' +
                        '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>');

                    loadItem();
                }
            },
            error: function (data) {
                var errors = data.responseJSON;
                console.log(errors);
            }
        });
    }
});


 
      // fetch all kate ajax request
      loadItem();
 
      function loadItem() {
        $.ajax({
          url: '{{ route('K.L.item') }}',
          method: 'get',
          success: function(response) {
            $("#multi-item-preview").html(response);
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
