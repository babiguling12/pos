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
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <link href="../vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
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
            <div class="card text-white bg-primary">
              <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                  <div class="fs-4 fw-semibold"><?= $total_produk ?></div>
                  <div>Total Produk</div>
                </div>
                <div class="dropdown">
                  <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon">
                      <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                    </svg>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                </div>
              </div>
              <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart1" height="70"></canvas>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-info">
              <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                  <div class="fs-4 fw-semibold"><?= $total_transaksi ?></div>
                  <div>Total Transaksi</div>
                </div>
                <div class="dropdown">
                  <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon">
                      <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                    </svg>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                </div>
              </div>
              <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart2" height="70"></canvas>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-warning">
              <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                  <div class="fs-4 fw-semibold"><?= $total_pembeli ?></div>
                  <div>Total Pembeli</div>
                </div>
                <div class="dropdown">
                  <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon">
                      <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                    </svg>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                </div>
              </div>
              <div class="c-chart-wrapper mt-3" style="height:70px;">
                <canvas class="chart" id="card-chart3" height="70"></canvas>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-danger">
              <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                  <div class="fs-4 fw-semibold"><?= $total_pendapatan ?></div>
                  <div>Total Pendapatan</div>
                </div>
                <div class="dropdown">
                  <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon">
                      <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                    </svg>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                </div>
              </div>
              <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart4" height="70"></canvas>
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
    
    <footer class="footer px-4">
      <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io/product/free-bootstrap-admin-template/">Bootstrap Admin Template</a> © 2024 creativeLabs.</div>
      <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
    </footer>
  </div>
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