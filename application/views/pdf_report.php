<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Laporan Data Produk</title>
</head>

<body>
  <div class="container-fluid">
    <div class="section text-center mt-3">
      <div class="row">
        <div class="col-2">
          <img src="<?= base_url() ?>/assets/favicon.png" alt="test">
        </div>
        <div class="col-8">
          <h3>Laporan Data Produk</h3>
          <h2>Pandam Adiwastra Janaloka</h2>
          <p>Jl.Langenarjan Kidul No.7A, Panembahan, Kraton, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55131</p>
        </div>
      </div>
    </div>
    <hr size="10px">
    <hr>
    <div class="section m-5">
      <?php foreach ($produk as $data) : ?>
        <table class="table mt-4 table-bordered">
          <tbody>
            <tr>
              <th colspan="4" class="text-center fw-bolder"><?= $data['category_name'] ?></th>
            </tr>
            <tr>
              <td rowspan="7" width="300px" class="text-center"><img src="<?= base_url('assets/img/subcategory/') . $data['image'] ?>" alt="produk category" width="200"></td>
              <td colspan="2" class="text-center fw-bold">Spesifikasi Produk</td>
            </tr>
            <tr>
              <td width="300px">Nama Produk</td>
              <td><?= $data['subcategory_name'] ?></td>
            </tr>
            <tr>
              <td>unicode</td>
              <td>unicode</td>
            </tr>
            <tr>
              <td>Bahan / Material</td>
              <td>Bahan / Material</td>
            </tr>
            <tr>
              <td>Deskripsi</td>
              <td>Deskripsi</td>
            </tr>
            <tr>
              <td>Ukuran</td>
              <td>Ukuran</td>
            </tr>
            <tr>
              <td>Harga</td>
              <td>Harga</td>
            </tr>
          </tbody>
        </table>
      <?php endforeach; ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>