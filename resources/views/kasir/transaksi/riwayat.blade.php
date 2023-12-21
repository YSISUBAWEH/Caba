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
    <link href="{{asset('arsip/template/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />   <link rel="shortcut icon" href="{{asset('arsip/template/assets/images/favicon.ico')}}">
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
        <h4 class="page-title">Riwayat Transaksi</h4>
      </div>
    </div>
  </div>
          <div class="row">
        <div class="col-12">
          <div class="card">
              <div class="card-body">
                <h4 class="card-title">Riwayat Transaksi</h4>
                
                <div class="table-responsive" id="loadI">
                	<table id="tari" class="table table-striped dt-responsive nowrap w-100">
                <thead>
                  <tr>
                      <th>Nota</th>
                      <th>Tanggal</th>
                      <th>Total</th>
                      <th>Uang Pembayaran</th>
                      <th>Kembalian</th>
                      <th>-</th>
                  </tr>
                </thead>
                  @foreach ($data as $rs)
                    <!-- foreach ($rs->menus as $index => $menu) -->
                      <tr>
                        <td>{{ $rs->id }}</td>
                        <td>{{ $rs->tanggal_pembayaran }}</td>
                        <td class="text-end">{{ number_format($rs->total_pembayaran, 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($rs->uang_pembayaran, 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($rs->kembalian, 0, ',', '.') }}</td>
                        <td>
                          <a href="#" id="{{ $rs->id }}" class="btn btn-outline-secondary viewD align-items-center mx-1" data-bs-toggle="modal" data-bs-target="#DetailModal"><i class="ri-eye-line"></i></a>
                          <button type="submit" value="print" class="btn btn-outline-secondary align-items-center" id="print-button"><i class="ri-printer-fill"></i></button>
                        </td>
                      </tr>
                  @endforeach
              </table>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- partial --> 
    <div class="modal fade" id="DetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="mb-1 d-flex justify-content-between">
                            <p>Id Transaksi</p>
                            <p id="nota"></p>
                        </div>

                        <div class="mb-1 d-flex justify-content-between">
                            <p>Tanggal Transaksi</p>
                            <p id="tglP"></p>
                        </div>
                        <div class="mb-1 col-12">
                          <div class="col-12 mb-1">Item yang Terjual</div>
                          <div class="row" id="item">
                            
                            </div>
                        </div>

                        <div class="mb-1 d-flex justify-content-between">
                            <p>Total</p>
                            <p id="total"></p>
                        </div>
                        <div class="mb-1 d-flex justify-content-between">
                            <p>Metode Pembayaran</p>
                            <p id="metoP"></p>
                        </div>
                        <div class="mb-1 d-flex justify-content-between">
                            <p>Dibayar</p>
                            <p id="uangP"></p>
                        </div>
                        <div class="mb-1 d-flex justify-content-between">
                            <p>Kembalian</p>
                            <p id="kemba"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<p class="dese"></p>

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
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script type="text/javascript">
    $(document).on('click', '.viewD', function(e) {
    e.preventDefault();
    let id = $(this).attr('id');
    $.ajax({
        url: '{{ route('K.V.rwt') }}',
        method: 'get',
        data: {
            id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
          console.log(response)
            // Perbarui elemen-elemen modal dengan data yang benar
            $("#nota").text(response.id);
            $("#tglP").text(response.tanggal_pembayaran);
            $("#total").text(response.total_pembayaran);
            $("#metoP").text(response.metode_pembayaran);
            $("#uangP").text(response.uang_pembayaran);
            $("#kemba").text(response.kembalian);

            // Perbarui elemen-elemen untuk menampilkan menu

            $("#item").html('');
            $.each(response.menus, function(index, menu) {
              var hargaItem = menu.pivot.harga.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
              });
              var hitungT = menu.pivot.harga * menu.pivot.quantity ;
              var total = hitungT.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
              });
                $("#item").append(
                    '<div class="col-4">' +
                    '<div class="card">' +
                    '<div class="card-body d-flex justify-content-between">'+
                    '<div class="flex-grow-1 ms-2">' +
                    '<h4 class="mt-0 mb-1 font-16 fw-semibold">' + menu.name + '</h4>' +
                    '<p class="mb-0 text-muted">' + hargaItem + ' </p>' +
                    '</div>' +
                    '<div class="flex-grow-1">' +
                    '<h4 class="mt-0 mb-1 font-16 fw-semibold"> QTY : ' + menu.pivot.quantity + '</h4>' +
                    '<p class="mb-0 text-muted">' + total + '</p>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );
                
            });
          }
        });
      });

  	$("#tari").DataTable({
        order: [1, 'desc']
            });

  // Menangkap peristiwa penutupan modal
  // $('#DetailModal').on('hidden.bs.modal', function () {
  //   // Mengirim permintaan AJAX untuk menghapus session
  //   $.ajax({
  //     url: '{{ route("K.R.session") }}', // Gantilah route sesuai dengan konfigurasi rute Anda
  //     method: 'post',
  //     data: {
  //       _token: '{{ csrf_token() }}'
  //     },
  //     success: function(response) {
  //       console.log('Session rwt deleted');
  //     },error: function(data){
  //      var errors = data.responseJSON;
  //      console.log(errors);}
  //   });
  // });
</script>
  @endpush

                  <!-- @if(session('rwt'))
                    <div class="row">
                        <div class="mb-2 d-flex justify-content-between">
                            <p>Id Transaksi</p>
                            <p >{{ session('rwt')->id }}</p>
                        </div>

                        <div class="mb-2 d-flex justify-content-between">
                            <p>Tanggal Transaksi</p>
                            <p>{{ session('rwt')->tanggal_pembayaran }}</p>
                        </div>
                       <div class="mb-2 col-12">
                          <div class="col-12">Item yang Terjual</div>
                          <div class="row">
                              @foreach (session('rwt')->menus as $menu)
                                  <div class="col-6 d-flex justify-content-between">
                                    <div class="flex-grow-1 ms-2">
                                       <h4 class="mt-0 mb-1 font-16 fw-semibold">{{ $menu->name }}</h4>
                                       <p class="mb-0 text-muted">{{ number_format($menu->pivot->harga, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                       <h4 class="mt-0 mb-1 font-16 fw-semibold"> QTY : {{ $menu->pivot->quantity }}</h4>
                                       <p class="mb-0 text-muted">{{ number_format($menu->pivot->harga * $menu->pivot->quantity, 0, ',', '.') }}</p>
                                    </div>
                                  </div>
                              @endforeach
                          </div>
                      </div>

                        <div class="mb-2 d-flex justify-content-between">
                            <p>Total</p>
                            <p>{{ session('rwt')->total_pembayaran }}</p>
                        </div>
                        <div class="mb-2 d-flex justify-content-between">
                            <p>Metode Pembayaran</p>
                            <p>{{ session('rwt')->metode_pembayaran }}</p>
                        </div>
                        <div class="mb-2 d-flex justify-content-between">
                            <p>Dibayar</p>
                            <p>{{ session('rwt')->uang_pembayaran }}</p>
                        </div>
                        <div class="mb-2 d-flex justify-content-between">
                            <p>Kembalian</p>
                            <p>{{ session('rwt')->kembalian }}</p>
                        </div>
                    </div>
                  @endif -->
                