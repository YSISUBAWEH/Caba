<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Menu</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .text-center {
      text-align: center;
    }

    .text-end {
      text-align: end;
    }

    .editIcon, .deleteIcon {
      text-decoration: none;
      margin-right: 10px;
    }

    .text-primary {
      color: #007bff;
    }

    .text-danger {
      color: #dc3545;
    }
  </style>
</head>
<body>
  <div style="width: 100%; display: flex;justify-content: space-between;">
<h3>$title</h3><p>$date</p>
</div>
  <table id="tait" class="table activate-select dt-responsive table-striped dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th class="text-center">Harga</th>
        <th class="text-center">Stok</th>
        <th>Kategori</th>
        <th>Unit</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($get_menu as $no => $rs)
        <tr>
          <td>{{$no + 1 }}</td>
      <td>{{ $rs->id}}</td>
          <td> {{$rs->name}}</td>
          <td class="text-end"> {{$rs->harga}}</td>
          <td class="text-end"> {{$rs->stok}}</td>
          <td> {{$rs->kate->name}}</td>
          <td> {{$rs->uk->name}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>
</html>
