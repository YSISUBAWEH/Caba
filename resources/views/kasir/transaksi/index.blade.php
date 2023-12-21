@extends('kasir.layout.layout')
@push('css')
<!-- App favicon -->
   <link rel="shortcut icon" href="{{asset('arsip/template/assets/images/favicon.ico')}}">
   <!-- Select2 css -->
  <link href="{{asset('arsip/template/assets/vendor/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Theme Config Js -->
   <script src="{{asset('arsip/template/assets/js/hyper-config.js')}}"></script>
  <!-- App css -->
   <link href="{{asset('arsip/template/assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
  <!-- Icons css -->
    <link href="{{asset('arsip/template/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <style type="text/css">
      
.delete-butn {
  display: inline-block;
  Cursor: pointer;
}
.delete-butn {
    font-size: 1.5rem;
    font-weight: 400;
}
.quantity input {
  -webkit-appearance: none;
  border: none;
  text-align: center;
  width: 32px;
  background-color: transparent;
  font-size: 16px;
}
.bo {
  width: 25px;
  height: 25px;
  background-color: transparent;
  border-radius: 6px;
  border: none;
  cursor: pointer;
}

.total-price {
  width: 83px;
  padding-top: 27px;
  text-align: center;
  font-size: 16px;
  color: #43484D;
  font-weight: 300;
}
  </style>
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
        <h4 class="page-title">Transaksi</h4>
      </div>
    </div>
  </div>
	
  <div class="row">
    <div class="col-xl-7 col-lg-6">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center border-bottom">
            <h5 class="card-title">Pilih Item</h5>
            <button class="btn btn-white"><i class="ri-qr-scan-2-line fs-4 text-primary"></i></button>
          </div>
          <div class="card-body">
            <form action="{{route('K.A.C')}}">
              <div class="d-flex align-items-center">
                <select name="selected_items[]" id="sI" class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." required>
                  @foreach($kategori as $ka)
                    <optgroup label="{{$ka->name}}">
                      @foreach($ka->item as $li)
                        <option value="{{$li->id}}" data-stok="{{$li->stok}}" data-nama="{{$li->name}}">
                          <span class="me-2">({{$li->SKU}})</span>
                          <span class="text-center">{{$li->name}}</span>
                        </option>
                      @endforeach
                    </optgroup>
                  @endforeach
                </select>
                <button class="btn btn-light ms-2" id="adi"><i class="ri-arrow-right-fill fs-5"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end pilih menu -->
      <!-- tabel -->
    	<div class="col-sm-12">
    		<div class="card">
    		  <div class="card-header border-bottom">
        		<h5 class="card-title">Pesanan</h5>
    		  </div>
          <div class="card-body pt-2 mb-2" data-simplebar style="max-height: 319px;">
					  @php $total = 0 @endphp
						  @if(session('Tcart'))
							  @foreach(session('Tcart') as $id => $details)
							    @php $total += $details['harga'] * $details['quantity'] @endphp
							      <!-- Data akan ditampilkan di sini -->
                    <div class="listitem d-flex justify-content-between align-items-center" data-id="{{$id}}">
                      <div class="flex-shrink-0">
                        <div class="avatar-sm rounded">
                          <span class="avatar-title bg-warning-lighten text-warning border border-warning rounded-circle h1 my-0">
								            <img src="{{asset('arsip/data/img/'. $details['img'] )}}" width="50" class="img-thumbnail">
                          </span>
                        </div>
                      </div>
                      <div class="priceDiv flex-grow-1 ms-2">
                        <h4 class="mt-0 mb-1 font-16 fw-semibold">{{ $details['name'] }}</h4>
                        <p class="mb-0 text-muted" data-harga="{{$details['harga']}}">{{ number_format($details['harga'], 0, ',', '.') }}</p>
                      </div>
                      <div class="pq flex-grow-0">
                        <div class="quantity d-flex align-items-center justify-content-end mb-2">
                          <button class="plus-butn bo text-center" type="button" name="button">
                            <i class="ri-add-fill text-dark"></i>
                          </button>
                          <input type="text" name="quantity" value="{{ $details['quantity'] }}" class="update-cart text-dark text-center">
                          <button class="minus-butn bo text-center" type="button" name="button">
                          <i class="ri-subtract-fill text-dark"></i>
                          </button>
                        </div>
                        <p class="mb-0 text-success h5">Total :  <span class="totalPrice">Rp {{ number_format($details['harga'] * $details['quantity'],0,',','.') }}</span></p>
                      </div>
                    </div>

                    <hr>
							    @endforeach
						      @endif
			    	@if(session('Tcart'))
						  @else
							    <p class="text-center">No data available in table</p>
						@endif
          </div>
				</div>
			</div>
    </div>

    <div class="col-xl-5 col-lg-6">
    	<div class="card">
        <div class="card-header border-bottom">
         	<h5 class="card-title">Form Transaksi</h5>
        </div>
    		<div class="card-body pt-1">
    			<form action="{{ route('K.T.S') }}" method="post">
          	@csrf
              <input type="hidden" name="user" id="userId">
              <input type="hidden" name="nota" id="Nota">
         			<div class="mb-2">
            		<p class="form-label">Total</p>
             		<input type="text" id="grandTotal" name="total-price" class="form-control text-end">
         			</div>
         			<div class="mb-2">
            		<p class="form-label">Metode Pembayaran</p>
               <select name="metode_pembayaran" class="form-control">
                   <option value="Tunai">Tunai</option>
                   <option value="Kartu Kredit">Kartu Kredit</option>
                   <!-- Tambahkan metode pembayaran lainnya jika diperlukan -->
               </select>
        			</div>
              <div class="mb-2">
                 <p class="form-label">Uang Pembayaran</p>
                  <input type="text" id="money-price" name="money-price" class="form-control text-end" data-toggle="input-mask" data-mask-format="000.000.000.000.000" data-reverse="true">
              </div>
              <div class="mb-2">
                 <p class="form-label"> Kembalian</p>
                  <input type="number" id="money-return" name="money-return" class="form-control text-end">
              </div>
              <div class="col-sm-12 d-flex justify-content-end align-items-center p-1 mb-1">
                <button type="submit" name="action" value="print" class="w-25 btn btn-info m-1" id="print-button" disabled>
                  <i   class="ri-printer-fill"></i>
                </button>
                <button type="submit" name="action" value="selesai" class="w-75 btn btn-success m-1" id="selesai-button" disabled>
                  Selesai
                </button>
    	       </div>
    		  </form>
    		</div>
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
  <!-- Input Mask js -->
  <script src="{{asset('arsip/template/assets/vendor/jquery-mask-plugin/jquery.mask.min.js')}}"></script>

  <!--  Select2 Js -->
  <script src="{{asset('arsip/template/assets/vendor/select2/js/select2.min.js')}}"></script>
  
  <!-- App js -->
  <script src="{{asset('arsip/template/assets/js/app.min.js')}}"></script>
@if(session('stokNull'))
    <script>
        // Display an alert using JavaScript
        alert("{{ session('stokNull') }}");
    </script>
@endif
@if(session('successT'))
<script type="text/javascript">
  $('#alert-show').html('<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert">'+
    '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>'+
    '<i class="ri-thumb-up-line me-2"></i><strong>Success </strong> Transkasi Penjualan Berhasil'+
'</div>')
</script>
@endif
<script>
$(document).ready(function () {
        $('#sI').on('change', function () {
            var selectedOption = $(this).find('option:selected');
            var stok = selectedOption.data('stok');
            var nama= selectedOption.data('nama');

            if (stok < 1) {
                $('#alert-show').html('<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert">'+
            '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>'+
            '<i class="ri-information-line me-2"></i> Stok <strong>'+ nama +'</strong> Tidak Cukup !'+
        '</div>');
                selectedOption.prop('selected', false);
            }
        });
    });


$('#sI').select2({
  closeOnSelect: false
});
$('#userId').val("{{$auth->id}}");
$('#Nota').val("{{$nota}}");

$(".plus-butn").click(function (e) {
    e.preventDefault();
    var ele = $(this).closest(".listitem");
    var quantityInput = ele.find(".pq .quantity input");
    var quantity = parseInt(quantityInput.val());
    if (!isNaN(quantity)) {
        quantityInput.val(quantity + 1);
        updateCartItemT(ele, quantity + 1);
    }
});

$(".minus-butn").click(function (e) {
    e.preventDefault();
    var ele = $(this).closest(".listitem");
    var quantityInput = ele.find(".pq .quantity input");
    var quantity = parseInt(quantityInput.val());
    
    if (!isNaN(quantity) && quantity > 1) {
        quantityInput.val(quantity - 1);
        updateCartItemT(ele, quantity - 1);
    }
});

$(".update-cart").change(function (e) {
    e.preventDefault();
    var ele = $(this).closest(".listitem");
    var quantity = parseInt($(this).val());
    
    if (!isNaN(quantity)) {
        updateCartItemT(ele, quantity);
    }
});

function updateCartItemT(ele, quantity) {
    $.ajax({
        url: '{{ route('K.U.C') }}',
        method: "patch",
        data: {
            _token: '{{ csrf_token() }}', 
            id: ele.data("id"), 
            quantity: quantity
        },
        success: function (response) {
            var harga = parseInt(ele.find(".priceDiv p").data("harga"));
            // Mengambil elemen dengan kelas ".totalPrice"
            var totalPriceElement = ele.find(".totalPrice");

            // Menghitung total harga
            var totalHarga = harga * quantity;

            // Mengonversi totalHarga ke format uang Indonesia
            var formattedTotalHarga = totalHarga.toLocaleString('id-ID', {
              style: 'currency',
              currency: 'IDR',
              minimumFractionDigits: 0
            });

            // Menetapkan teks yang diformat ke elemen ".totalPrice"
            totalPriceElement.text(formattedTotalHarga);
            
            // Recalculate total price for all items
            calculateTotalPrice();
        }
    });
}

function calculateTotalPrice() {
    var total = 0;
    $(".listitem").each(function () {
        var harga = parseInt($(this).find(".priceDiv p").data("harga"));
        var quantity = parseInt($(this).find(".pq .quantity input").val());
        if (!isNaN(harga) && !isNaN(quantity)) {
            total += harga * quantity;
        }
    });
    var formattedTotalHarga = total.toLocaleString('id-ID', {
              style: 'currency',
              currency: 'IDR',
              minimumFractionDigits: 0
            });

formattedTotalHarga = formattedTotalHarga.replace(/^.*?\s/, '');
    $("#grandTotal").val(formattedTotalHarga);
    $("#total-print").val(total);
    calculateMoReturn()
}
 setInterval(calculateTotalPrice, 800);


$(".delete-butn").click(function (e) {
    e.preventDefault();
    var ele = $(this).closest(".listitem");
    var itemId = ele.data("id");

        $.ajax({
            url: '{{ route('K.R.C') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}',
                id: itemId
            },
            success: function (response) {
                ele.remove(); // Hapus item dari DOM
                calculateTotalPrice(); // Hitung ulang total harga
            }
        });
});
// Mendapatkan elemen tombol "Selesai"
var selesaiButton = document.getElementById("selesai-button");
var printButton = document.getElementById("print-button");
var cekmoneyPriceInput = document.getElementById("money-price");

// Menambahkan event listener ke input uang pembayaran
cekmoneyPriceInput.addEventListener("input", function () {
  var cekmoneyPaid = parseFloat(moneyPriceInput.value) || 0;
  var cektotal = parseFloat(totalPriceInput.value) || 0;

  // Mengecek apakah uang pembayaran cukup
  if (cekmoneyPaid >= cektotal) {
    printButton.removeAttribute("disabled");
    selesaiButton.removeAttribute("disabled"); // Aktifkan tombol "Selesai"
  } else {
    printButton.setAttribute("disabled", "disabled");
    selesaiButton.setAttribute("disabled", "disabled"); // Nonaktifkan tombol "Selesai"
  }
});

// Mendapatkan elemen-elemen input dan menghubungkannya dengan variabel
var totalPriceInput = document.getElementById("grandTotal");
var moneyPriceInput = document.getElementById("money-price");
var moneyReturnInput = document.getElementById("money-return");

// Menambahkan event listener untuk menghitung uang kembalian saat nilai total atau uang pembayaran berubah
totalPriceInput.addEventListener("input", calculateMoReturn);
moneyPriceInput.addEventListener("input", calculateMoReturn);

function calculateMoReturn() {
  // Mendapatkan nilai total dan uang pembayaran dari input
  var total = parseFloat(totalPriceInput.value.replace(/[,.]/g, '')) || 0;
  var moneyPaid = parseFloat(moneyPriceInput.value.replace(/[,.]/g, '')) || 0;

  // Menghitung uang kembalian
  var returnM = moneyPaid - total;
  // Menampilkan uang kembalian pada input uang kembalian
  if (returnM >= 0) {
    var formatReturnMoney = returnM.toLocaleString('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0
    });

    formatReturnMoney = formatReturnMoney.replace(/^.*?\s/, '');
    moneyReturnInput.value = formatReturnMoney;
  } else {
    moneyReturnInput.value = 0;
  }
}


// fungsi print

</script>

  @if(session('stokNull'))
    <script>
        $(document).Toasts('create', {
              body: 'k',
              title: '{{$auth->name}}',
              subtitle: 'Fail',
              image: "{{asset('arsip/admin/images/faces/'. $auth->foto)}}",
              imageAlt: 'User Picture',
            })
    </script>
  @endif

@endpush