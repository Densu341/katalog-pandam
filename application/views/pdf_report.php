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
    <div class="section text-center mt-3 border-bottom">
      <div class="row">
        <div class="col-2">
          <img src="<?= base_url() ?>/assets/favicon.png" alt="test">
        </div>
        <div class="col-8">
          <h3>Laporan Data Produk</h3>
          <h2>Pandam Adiwastra Janaloka</h2>
          <p class="fst-italic">Jl.Langenarjan Kidul No.7A, Panembahan, Kraton, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55131</p>
        </div>
      </div>
    </div>
    <!-- <hr size="10px"> -->
    <hr>
    <div class="section">
      <?php foreach ($produk as $data) : ?>
        <table class="table mt-3 table-bordered border">
          <tbody>
            <tr>
              <th colspan="4" class="text-center fw-bolder border"><?= $data['category_name'] ?></th>
            </tr>
            <tr>
              <td rowspan="7" width="200px" class="text-center border"><img src="<?= base_url('assets/img/subcategory/') . $data['image'] ?>" alt="produk category" width="150"></td>
              <td colspan="2" class="text-center fw-bold">Spesifikasi Produk</td>
            </tr>
            <tr>
              <td class="border ml-1" width="250px">Nama Produk</td>
              <td class="border ml-1"><?= $data['product_name'] ?></td>
            </tr>
            <tr>
              <td class="border ml-1">unicode</td>
              <td class="border ml-1"><?= $data['sub_code'] ?>-<?= $data['mat_code'] ?>-<?= $data['product_code'] ?></td>
            </tr>
            <tr>
              <td class="border ml-1">Bahan / Material</td>
              <td class="border ml-1"><?= $data['material_name'] ?></td>
            </tr>

            <tr>
              <td class="border ml-1">Ukuran</td>
              <td class="border ml-1"> P.<?= $data['length'] ?>cm x L.<?= $data['width'] ?>cm x t.<?= $data['height'] ?>cm</td>
            </tr>
            <tr>
              <td class="border ml-1">Harga</td>
              <td class="border ml-1">Rp. <?= number_format($data['price'], 2, ',', '.'); ?></td>
            </tr>
            <tr>
              <td class="border ml-1">Deskripsi</td>
              <td class="border ml-1"><?= $data['description'] ?></td>
            </tr>
          </tbody>
        </table>
      <?php endforeach; ?>
    </div>
  </div>
</body>

</html>