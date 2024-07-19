<?php
include '../include/include.php';
include '../include/chart.php';
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
  <title>Dashboard | Toko</title>
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
  <link rel="stylesheet" href="../css/vendors/simplebar.css">
  <!-- Main styles for this application-->
  <link href="../css/style.css" rel="stylesheet">

  <script src="../js/config.js"></script>
  <script src="../js/color-modes.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <link href="../vendors/@coreui/icons/css/free.min.css" rel="stylesheet">
  <link href="../vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">

  <style>
    .card-background {
      position: relative;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-background:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6), 0 0 15px rgba(255, 255, 255, 0.1);
    }

    .card-background::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('../assets/img/background-pro.jpg') no-repeat center center;
      background-size: cover;
      opacity: 0.17;
      z-index: 0;
    }

    .card-body {
      position: relative;
      z-index: 1;
    }

  </style>

</head>

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
        <div class="row g-4 mb-4">
          <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-primary card-background">
              <div class="card-body py-4 d-flex justify-content-between align-items-start">
                <div>
                  <div>Total Produk</div>
                  <div class="fs-3 fw-semibold"><?= $total_produk ?></div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-info card-background">
              <div class="card-body py-4 d-flex justify-content-between align-items-start">
                <div>
                  <div>Total Transaksi</div>
                  <div class="fs-3 fw-semibold"><?= $total_transaksi ?></div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-warning card-background">
              <div class="card-body py-4 d-flex justify-content-between align-items-start">
                <div>
                  <div>Pendapatan Bulanan</div>
                  <div class="fs-3 fw-semibold"><?= $pendapatan_bulanan ?></div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-danger card-background">
              <div class="card-body py-4 d-flex justify-content-between align-items-start">
                <div>
                  <div>Total Pendapatan</div>
                  <div class="fs-3 fw-semibold"><?= $total_pendapatan ?></div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- /.row-->
        <div class="card mb-4">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div>
                <h4 class="card-title mb-0">Penjualan Bulan Ini</h4>
                <div class="small text-body-secondary"><?= date('F') ?></div>
              </div>
            </div>
            <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">
              <canvas class="chart" id="main-chart" height="300"></canvas>
            </div>
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
    </div>

    <?php
    include "../components/footer.php";
    ?>

  <!-- CoreUI and necessary plugins-->
  <script src="../vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
  <script src="../vendors/simplebar/js/simplebar.min.js"></script>
  <script>
    const header = document.querySelector('header.header');

    document.addEventListener('scroll', () => {
      if (header) {
        header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
      }
    });
  </script>
  <!-- Plugins and scripts required by this view-->
  <script src="../vendors/chart.js/js/chart.umd.js"></script>
  <script src="../vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
  <script src="../vendors/@coreui/utils/js/index.js"></script>
  <script src="../js/main.js"></script>
  <script>
  </script>

</body>

</html>