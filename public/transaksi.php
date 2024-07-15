<?php
include '../include/include.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title>Transaksi | Toko</title>
  <link rel="apple-touch-icon" sizes="57x57" href="../assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="../assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="../assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="../assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="../assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="../assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Vendors styles-->
  <link rel="stylesheet" href="../vendors/simplebar/css/simplebar.css">
  <link rel="stylesheet" href="../vendors/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/vendors/simplebar.css">
  <!-- Main styles for this application-->
  <link href="../css/style.css" rel="stylesheet">
  <script src="../js/config.js"></script>
  <script src="../js/color-modes.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <link href="../vendors/@coreui/icons/css/free.min.css" rel="stylesheet">
  <style>
    .card-input-element {
      display: none;
    }

    .card-input:hover {
      cursor: pointer;
    }

    .card-input-element:checked + .card-input {
      border: 1px solid #3d933f;
    }
  </style>
</head>

<?php
$data = (mysqli_query($conn, "SELECT * FROM produk"));
?>

<body>

  <?php
  include '../components/sidebar.php';
  ?>

  <div class="wrapper d-flex flex-column min-vh-100">

    <?php
    include '../components/header.php';
    ?>


    <div class="body flex-grow-1">
      <div class="container-lg px-4">
        <div class="card mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col">
                <p class="h5">Transaksi</p>
              </div>
              <div class="col-sm-3 mb-0 text-end">
                <b class="mr-2">Nota</b> <span id="nota"></span>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-header">
                    Produk
                  </div>
                  <div class="card-body" style="overflow-y: scroll; height: 300px">
                    <ul class="list-group">

                    <?php foreach ($data as $produk) : ?>
                      <label for="<?= $produk['kode_produk'] ?>">
                        <input type="radio" name="produk" id="<?= $produk['kode_produk'] ?>" class="card-input-element" value="<?= $produk['kode_produk'] ?>">
                        <div class="list-group-item card-input">
                          <?= $produk['nama_produk'] ?>
                        </div>
                      </label>
                    <?php endforeach; ?>
                      

                    </ul>
                  </div>
                  <div class="card-footer">
                    <div class="input-group">
                      <input type="number" class="form-control col-sm-6" placeholder="Jumlah" id="jumlah" onkeyup="checkEmpty()">
                      <button id="tambah" class="btn btn-primary" onclick="checkStok()" disabled>Tambah</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 d-flex justify-content-end text-right">
                <table class="table" id="transaksi">
                  <thead>
                    <tr>
                      <th>Barcode</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <p id="total" style="font-size: 40px; line-height: 1" class="text-success">0</p>
            <button id="bayar" class="btn btn-primary" data-toggle="modal" data-target="#modal" disabled>Bayar</button>
          </div>
        </div>
      </div>
    </div>


  </div>
  <footer class="footer px-4">
    <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io/product/free-bootstrap-admin-template/">Bootstrap Admin Template</a> © 2024 creativeLabs.</div>
    <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
  </footer>
  </div>
  <!-- CoreUI and necessary plugins-->
  <script src="../vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
  <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendors/simplebar/js/simplebar.min.js"></script>
  <script src="../js/transaksi.js"></script>
  <script>
    const header = document.querySelector('header.header');

    document.addEventListener('scroll', () => {
      if (header) {
        header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
      }
    });
  </script>
  <script>
  </script>

</body>

</html>