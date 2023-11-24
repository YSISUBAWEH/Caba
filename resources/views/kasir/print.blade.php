<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        @page {
            size: 100%; /* Set the paper size */
            margin: 0.3cm;
        }

        body {
            width: 48mm;
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            font-weight: bold;
        }

        .header h1 {
            font-size: 16px;
        }

        .info {
            margin-top: 10px;
        }

        .item-list {
            margin-top: 10px;
            width: 100%;
            border-collapse: collapse;
        }

        .item-list th,
        .item-list td {
            font-size: 12px;
            border: none;
            padding: 0.5rem;
        }

        .text-start {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        .justify-content-between {
            font-size: 12px;
            display: flex;
            justify-content: space-between;
            margin-bottom:2px;
        }

        .mb-1 {
            margin-bottom: 1px;
        }

        .fw-10 {
            font-weight: 800;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>{{$auth->toko->nama}}</h1>
        <p>{{$auth->toko->alamat}}</p>
    </div>
    <div class="justify-content-between mb-1" style="font-size:10px;margin-top:3px;">
        <p>{{session('TRXPrint')->tanggal_pembayaran}}</p>
        <p>Kasir : {{session('TRXPrint')->user->name}}</p>
    </div>
    <p class="fw-10">==================</p>
    <table class="item-list">
        <tr>
            <th class="text-start">Barang</th>
            <th class="text-center">Jumlah</th>
            <th class="text-end">Harga</th>
        </tr>

        @foreach (session('TRXPrint')->menus as $no => $menu)
        <tr>
            <td>{{$menu->name}}</td>
            <td class="text-center">{{$menu->pivot->quantity}}</td>
            <td class="text-end">{{$menu->pivot->harga}}</td>
        </tr>
        @endforeach
    </table>

    <p class="fw-10">===================</p>
    <div class="justify-content-between">
        <p>Total</p>
        <p>{{session('TRXPrint')->total_pembayaran}}</p>
    </div>
    <div class="justify-content-between">
        <p>Kembalian</p>
        <p>{{session('TRXPrint')->kembalian}}</p>
    </div>
    <div class="justify-content-between">
        <p>Metode Pembayaran</p>
        <p>{{session('TRXPrint')->metode_pembayaran}}</p>
    </div>
    <div>
        <p class="text-center" style="font-size:12px;margin-top:4px;">Terima kasih atas kunjungan Anda!</p>
    </div>

    <script>
        function printTest() {
            window.print();
        }
        window.onload = printTest;
    </script>
</body>

</html>