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
  <title>Pengguna | Toko</title>
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
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <link href="../vendors/@coreui/icons/css/free.min.css" rel="stylesheet">
</head>

<body>

  <!-- table start -->
  <?php
  $data = mysqli_query($conn, "SELECT * FROM pengguna");

  if (isset($_GET['editpengguna'])) {
    $id = $_GET['editpengguna'];
    $dataedit = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna = $id"));

    echo "<script>
    $(document).ready(function(){
    $('#edit').modal('show');
    });
    </script>";
  }
  ?>

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
          <div class="card-header"><button class="btn btn-primary" type="button" data-bs-toggle="modal"
              data-bs-target="#tambah">Tambah Data</button></div>
          <div class="card-body">
            <div class="tab-pane p-3 active preview" role="tabpanel">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($data as $pengguna): ?>
                    <tr>
                      <th scope="row"><?= ++$no ?></th>
                      <td><?= $pengguna['nama_pengguna'] ?></td>
                      <td><?= $pengguna['jabatan'] ?></td>
                      <td><?= $pengguna['nohp_pengguna'] ?></td>
                      <td>
                        <a class="btn btn-sm btn-warning"
                          href="pengguna.php?editpengguna=<?= $pengguna['id_pengguna'] ?>"><i
                            class="icon icon-l cil-pencil"></i></a>
                        <a class="btn btn-sm btn-danger"
                          href="../process/hapus.php?s=pengguna&id=<?= $pengguna['id_pengguna'] ?>"
                          onclick="return confirm('Hapus data?')"><i class="icon icon-l cil-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <div class="row">
                <div class="col-sm-12 col-md-5">
                  <div class="dataTables_info" id="supplier_info" role="status" aria-live="polite">Showing 1 to 1 of 1
                    entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                  <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-end">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- table end -->

    <!-- Modal Tambah Start -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">Tambah Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" action="../process/tambah.php" method="post" id="tambahpengguna" novalidate>
              <div class="mb-3">
                <label for="user_name" class="form-label">Username</label>
                <input type="text" class="form-control" id="user_name" name="user_name"
                  placeholder="Masukan Username..." required>
                <div class="invalid-feedback">
                  Username tidak boleh kosong.
                </div> 
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="xxxxxxxxxx"
                  minlength="8" maxlength="12" required>
                <div class="invalid-feedback">
                  Password harus memiliki panjang 8 - 12 karakter.
                </div>
              </div>
              <div class="mb-3">
                <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna"
                  placeholder="Masukan Nama..." required>
                <div class="invalid-feedback">
                  Nama tidak boleh kosong.
                </div>
              </div>
              <div class="mb-3">
                <label for="Jabatan" class="form-label">Jabatan</label>
                <select class="form-select" aria-label="Default select example" id="jabatan" name="jabatan">
                  <option selected>Pilih Jabatan</option>
                  <option value="admin">Admin</option>
                  <option value="umum">Umum</option>
                </select>
                <div class="invalid-feedback">
                  Jabatan tidak boleh kosong.
                </div>
              </div>
              <div class="mb-3">
                <label for="nohp_pengguna" class="form-label">No HP</label>
                <input type="text" class="form-control" id="nohp_pengguna" name="nohp_pengguna"
                  placeholder="Masukan No HP..." required>
                <div class="invalid-feedback">
                  No HP tidak boleh kosong.
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="tambahpengguna" form="tambahpengguna">Tambah</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Tambah End -->

    <!-- Modal Edit -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">Edit Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" action="../process/edit.php" method="post" id="editpengguna" novalidate>
              <input type="hidden" name="id_pengguna" readonly value="<?php if (isset($dataedit))
                echo $dataedit['id_pengguna'] ?>">
                <div class="mb-3">
                  <label for="user_name" class="form-label">Username</label>
                  <input type="text" class="form-control" id="user_name" name="user_name"
                    placeholder="Masukan Username..." required value="<?php if (isset($dataedit))
                echo $dataedit['user_name'] ?>">
                  <div class="invalid-feedback">
                    Username tidak boleh kosong. 
                  </div>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="xxxxxxxxxx"
                    minlength="8" maxlength="12" required>
                  <div class="invalid-feedback">
                    Password harus memiliki panjang 8 - 12 karakter.
                  </div>
                  <div class="mb-3">
                    <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna"
                      placeholder="Masukan Nama..." required value="<?php if (isset($dataedit))
                echo $dataedit['nama_pengguna'] ?>">
                    <div class="invalid-feedback">
                      Nama Pengguna tidak boleh kosong.
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <?php
                      $jabatan = isset($dataedit['jabatan']) ? $dataedit['jabatan'] : '';
                    ?>
                  <select class="form-select" aria-label="Default select example" id="jabatan" name="jabatan" required>
                    <option value="" <?= $jabatan == '' ? 'selected' : '' ?>>Pilih Jabatan</option>
                    <option value="admin" <?= $jabatan == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="umum" <?= $jabatan == 'umum' ? 'selected' : '' ?>>Umum</option>
                  </select>
                  <div class="invalid-feedback">
                    Harus pilih salah satu.
                  </div>
                </div>
                <div class="mb-3">
                  <label for="nohp_pengguna" class="form-label">No Hp</label>
                  <input type="text" class="form-control" id="nohp_pengguna" name="nohp_pengguna"
                    placeholder="081*********" required value="<?php if (isset($dataedit))
                      echo $dataedit['nohp_pengguna'] ?>">
                    <div class="invalid-feedback">
                      Nomor HP tidak boleh kosong.
                    </div>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="editpengguna" form="editpengguna">Simpan</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Edit End -->

    </div>
    <footer class="footer px-4">
      <div><a href="https://coreui.io">CoreUI </a><a
          href="https://coreui.io/product/free-bootstrap-admin-template/">Bootstrap Admin Template</a> © 2024
        creativeLabs.</div>
      <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
    </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="../vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Form Validation -->
    <script>
      const header = document.querySelector('header.header');

      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
    </script>
    <script>
      (function () {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            }, false)
          })
      })()
    </script>
    <script>

    </script>
    <script>
    </script>

  </body>

  </html>