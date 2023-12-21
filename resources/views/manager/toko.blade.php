<!DOCTYPE html>
<html lang="en" data-layout="topnav" data-topbar-color="dark">

<head>
    <meta charset="utf-8" />
    <title>Buat Toko</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('arsip/template/assets/images/favicon.ico')}}">

    <!-- Theme Config Js -->
    <script src="{{asset('arsip/template/assets/js/hyper-config.js')}}"></script>

    <!-- App css -->
    <link href="{{asset('arsip/template/assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{asset('arsip/template/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <style></style>
</head>

<body class="">

    <div class="container d-flex justify-content-center align-items-center pt-4">
        <!--Auth fluid left content -->
        <div class="col-8">
            <div class="card border-4 shadow">
                <div class="card-body">
                    <!-- title-->
                    <h4 class="mt-0">Buat Toko</h4>
                    <p class="text-muted mb-4">Enter store details to create a new store.</p>

                    <!-- form -->
                    <form class="forms-sample" action="{{route('M.C.T.P')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Toko</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter store name">
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Enter phone number">
                        </div>
                        <div class="mb-3">
                            <label for="jenisToko" class="form-label">Jenis Usaha</label>
                            <select class="form-control" id="jenisToko" name="toko">
                          <option value="1">Restoran atau Kafe</option>
                          <option value="2">Toko Elektronik</option>
                          <option value="3">Toko Kelontong</option>
                          <option value="4">Butik Pakaian</option>
                          <option value="5">Salon Kecantikan</option>
                          <option value="6">Bengkel Mobil</option>
                          <option value="7">Toko Buku</option>
                          <option value="8">Toko Sepatu</option>
                          <option value="9">Toko Hobi dan Mainan</option>
                          <option value="10">Klinik Kesehatan</option>
                          <option value="11">Toko Perhiasan</option>
                          <option value="12">Studio Seni</option>
                          <option value="13">Toko Outdoor dan Peralatan Petualangan</option>
                          <option value="14">Toko Musik</option>
                          <option value="15">Toko Peralatan Olahraga</option>
                          <option value="0">Lainnya</option>
                      </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input class="form-control" name="alamat" id="alamat" placeholder="Enter address">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Selesai</button>
                    </form>
                    <!-- end form-->
                </div>

            </div> <!-- end .card-body -->
        </div>
        <!-- end auth-fluid-form-box-->
    </div>
    <!-- end auth-fluid-->
    <!-- Vendor js -->
    <script src="{{asset('arsip/template/assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('arsip/template/assets/js/app.min.js')}}"></script>

</body>

</html>
