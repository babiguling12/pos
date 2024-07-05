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
                  <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                      <svg class="icon">
                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                      </svg>)</span></div>
                  <div>Users</div>
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
                  <div class="fs-4 fw-semibold">$6.200 <span class="fs-6 fw-normal">(40.9%
                      <svg class="icon">
                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                      </svg>)</span></div>
                  <div>Income</div>
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
                  <div class="fs-4 fw-semibold">2.49% <span class="fs-6 fw-normal">(84.7%
                      <svg class="icon">
                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                      </svg>)</span></div>
                  <div>Conversion Rate</div>
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
                  <div class="fs-4 fw-semibold">44K <span class="fs-6 fw-normal">(-23.6%
                      <svg class="icon">
                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                      </svg>)</span></div>
                  <div>Sessions</div>
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
                <div class="small text-body-secondary">Juli</div>
              </div>
            </div>
            <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">
              <canvas class="chart" id="main-chart" height="300"></canvas>
            </div>
          </div>
          <div class="card-footer">

          </div>
        </div>
        <!-- /.row-->
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-4">
              <div class="card-header">Pelanggan &amp; Pengguna</div>
              <div class="card-body">

                <!-- /.row--><br>
                <div class="table-responsive">
                  <table class="table border mb-0">
                    <thead class="fw-semibold text-nowrap">
                      <tr class="align-middle">
                        <th class="bg-body-secondary text-center">
                          <svg class="icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                          </svg>
                        </th>
                        <th class="bg-body-secondary">User</th>
                        <th class="bg-body-secondary text-center">Country</th>
                        <th class="bg-body-secondary">Usage</th>
                        <th class="bg-body-secondary text-center">Payment Method</th>
                        <th class="bg-body-secondary">Activity</th>
                        <th class="bg-body-secondary"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="align-middle">
                        <td class="text-center">
                          <div class="avatar avatar-md"><img class="avatar-img" src="../assets/img/avatars/1.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                        </td>
                        <td>
                          <div class="text-nowrap">Yiorgos Avraamu</div>
                          <div class="small text-body-secondary text-nowrap"><span>New</span> | Registered: Jan 1, 2023</div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="../vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="d-flex justify-content-between align-items-baseline">
                            <div class="fw-semibold">50%</div>
                            <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="../vendors/@coreui/icons/svg/brand.svg#cib-cc-mastercard"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="small text-body-secondary">Last login</div>
                          <div class="fw-semibold text-nowrap">10 sec ago</div>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <svg class="icon">
                                <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                              </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                          </div>
                        </td>
                      </tr>
                      <tr class="align-middle">
                        <td class="text-center">
                          <div class="avatar avatar-md"><img class="avatar-img" src="../assets/img/avatars/2.jpg" alt="user@email.com"><span class="avatar-status bg-danger"></span></div>
                        </td>
                        <td>
                          <div class="text-nowrap">Avram Tarasios</div>
                          <div class="small text-body-secondary text-nowrap"><span>Recurring</span> | Registered: Jan 1, 2023</div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="../vendors/@coreui/icons/svg/flag.svg#cif-br"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="d-flex justify-content-between align-items-baseline">
                            <div class="fw-semibold">10%</div>
                            <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="../vendors/@coreui/icons/svg/brand.svg#cib-cc-visa"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="small text-body-secondary">Last login</div>
                          <div class="fw-semibold text-nowrap">5 minutes ago</div>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <svg class="icon">
                                <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                              </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                          </div>
                        </td>
                      </tr>
                      <tr class="align-middle">
                        <td class="text-center">
                          <div class="avatar avatar-md"><img class="avatar-img" src="../assets/img/avatars/3.jpg" alt="user@email.com"><span class="avatar-status bg-warning"></span></div>
                        </td>
                        <td>
                          <div class="text-nowrap">Quintin Ed</div>
                          <div class="small text-body-secondary text-nowrap"><span>New</span> | Registered: Jan 1, 2023</div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="../vendors/@coreui/icons/svg/flag.svg#cif-in"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="d-flex justify-content-between align-items-baseline">
                            <div class="fw-semibold">74%</div>
                            <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 74%" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="../vendors/@coreui/icons/svg/brand.svg#cib-cc-stripe"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="small text-body-secondary">Last login</div>
                          <div class="fw-semibold text-nowrap">1 hour ago</div>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <svg class="icon">
                                <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                              </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                          </div>
                        </td>
                      </tr>
                      <tr class="align-middle">
                        <td class="text-center">
                          <div class="avatar avatar-md"><img class="avatar-img" src="../assets/img/avatars/4.jpg" alt="user@email.com"><span class="avatar-status bg-secondary"></span></div>
                        </td>
                        <td>
                          <div class="text-nowrap">Enéas Kwadwo</div>
                          <div class="small text-body-secondary text-nowrap"><span>New</span> | Registered: Jan 1, 2023</div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="../vendors/@coreui/icons/svg/flag.svg#cif-fr"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="d-flex justify-content-between align-items-baseline">
                            <div class="fw-semibold">98%</div>
                            <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="../vendors/@coreui/icons/svg/brand.svg#cib-cc-paypal"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="small text-body-secondary">Last login</div>
                          <div class="fw-semibold text-nowrap">Last month</div>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <svg class="icon">
                                <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                              </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                          </div>
                        </td>
                      </tr>
                      <tr class="align-middle">
                        <td class="text-center">
                          <div class="avatar avatar-md"><img class="avatar-img" src="../assets/img/avatars/5.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                        </td>
                        <td>
                          <div class="text-nowrap">Agapetus Tadeáš</div>
                          <div class="small text-body-secondary text-nowrap"><span>New</span> | Registered: Jan 1, 2023</div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="../vendors/@coreui/icons/svg/flag.svg#cif-es"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="d-flex justify-content-between align-items-baseline">
                            <div class="fw-semibold">22%</div>
                            <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="../vendors/@coreui/icons/svg/brand.svg#cib-cc-apple-pay"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="small text-body-secondary">Last login</div>
                          <div class="fw-semibold text-nowrap">Last week</div>
                        </td>
                        <td>
                          <div class="dropdown dropup">
                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <svg class="icon">
                                <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                              </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                          </div>
                        </td>
                      </tr>
                      <tr class="align-middle">
                        <td class="text-center">
                          <div class="avatar avatar-md"><img class="avatar-img" src="../assets/img/avatars/6.jpg" alt="user@email.com"><span class="avatar-status bg-danger"></span></div>
                        </td>
                        <td>
                          <div class="text-nowrap">Friderik Dávid</div>
                          <div class="small text-body-secondary text-nowrap"><span>New</span> | Registered: Jan 1, 2023</div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="../vendors/@coreui/icons/svg/flag.svg#cif-pl"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="d-flex justify-content-between align-items-baseline">
                            <div class="fw-semibold">43%</div>
                            <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="../vendors/@coreui/icons/svg/brand.svg#cib-cc-amex"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="small text-body-secondary">Last login</div>
                          <div class="fw-semibold text-nowrap">Yesterday</div>
                        </td>
                        <td>
                          <div class="dropdown dropup">
                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <svg class="icon">
                                <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                              </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- /.row-->
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