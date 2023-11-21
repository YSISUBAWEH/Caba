<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BaBa Kasir</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('arsip/admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('arsip/admin/images/welogo.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-md-6 mx-auto stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Buat Toko Anda</h4>
                  <p class="card-description">
                    Isi dengan benar
                  </p>
                  <form class="forms-sample" action="{{route('M.C.T.P')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Toko</label>
                      <input type="text" class="form-control" name="nama" id="exampleInputUsername1" placeholder="Enter Here">
                    </div>
                                        <div class="form-group">
                      <label for="exampleInputPassword1">Nomor Telepon</label>
                      <input type="text" class="form-control" name="telepon" id="exampleInputPassword1" placeholder="Enter Here">
                    </div>
                    <div class="form-group">
                      <label for="jenisToko">Pilih Jenis Toko:</label>
                      <select  class="form-control" id="jenisToko" name="toko">
                          <option value="6">Toko Kelontong</option>
                          <option value="1">Tko Elektronik</option>
                          <option value="2">Toko Pakaian</option>
                          <option value="3">Toko Buku</option>
                          <option value="4">Toko Sepatu</option>
                          <option value="5">Toko Mainan</option>
                          <!-- Tambahkan jenis toko lainnya sesuai kebutuhan -->
                      </select>

                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input class="form-control" name="alamat" id="exampleInputEmail1" placeholder="Enter Here"></input>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('arsip/admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('arsip/admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('arsip/admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('arsip/admin/js/hoverable-collapse.js')}}"></script>
  <!-- endinject -->
</body>

</html>
