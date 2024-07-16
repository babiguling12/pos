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
  <title>Produk | Toko</title>
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
  $data = mysqli_query($conn, "SELECT * FROM produk");

  if (isset($_GET['editproduk'])) {
    $kode_produk = $_GET['editproduk'];
    $dataedit = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = $kode_produk"));

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
          <div class="card-header">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Produk</button>
          </div>
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
                  foreach ($data as $produk): ?>
                    <tr>
                      <th scope="row"><?= ++$no ?></th>
                      <td><?= $produk['kode_produk'] ?></td>
                      <td><?= $produk['nama_produk'] ?></td>
                      <td><?= $produk['satuan'] ?></td>
                      <td><?= $produk['harga_jual'] ?></td>
                      <td>
                        <a class="btn btn-sm btn-warning" href="produk.php?editproduk=<?= $produk['kode_produk'] ?>"><i class="icon icon-l cil-pencil"></i></a>
                        <a class="btn btn-sm btn-danger" href="../process/hapus.php?s=produk&kode_produk=<?= $produk['kode_produk'] ?>" onclick="return confirm('Hapus produk?')"><i class="icon icon-l cil-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <div class="row">
                <div class="col-sm-12 col-md-5">
                  <div class="dataTables_info" id="supplier_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div>
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
            <h1 class="modal-title fs-5">Tambah Produk</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" action="../process/tambah.php" method="post" id="tambahproduk" novalidate>
              <div class="mb-3">
                <label for="kode_produk" class="form-label">Kode Produk</label>
                <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Masukan Kode Produk..." required>
                <div class="invalid-feedback">
                  Kode Produk tidak boleh kosong.
                </div> 
              </div>
              <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukan Nama Produk..." required>
                <div class="invalid-feedback">
                  Nama produk tidak boleh kosong.
                </div>
              </div>
              <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukan Satuan..." required>
                <div class="invalid-feedback">
                  Satuan tidak boleh kosong.
                </div>
              </div>
              <div class="mb-3">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukan Harga Jual..." required>
                <div class="invalid-feedback">
                  Harga Jual tidak boleh kosong.
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="tambahproduk" form="tambahproduk">Tambah</button>
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
            <h1 class="modal-title fs-5">Edit Produk</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" action="../process/edit.php" method="post" id="editproduk" novalidate>
              <input type="hidden" name="kode_produk" readonly value="<?php if (isset($dataedit)) echo $dataedit['kode_produk'] ?>">
              <div class="mb-3">
                <label for="kode_produk" class="form-label">Kode Produk</label>
                <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Masukan Kode Produk..." required value="<?php if (isset($dataedit)) echo $dataedit['kode_produk'] ?>">
                <div class="invalid-feedback">
                  Kode produk tidak boleh kosong. 
                </div>
              </div>
              <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukan Nama Produk..." required value="<?php if (isset($dataedit)) echo $dataedit['nama_produk'] ?>">
                <div class="invalid-feedback">
                  Nama produk tidak boleh kosong
                </div>
              </div>
              <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukan satuan..." required value="<?php if (isset($dataedit)) echo $dataedit['satuan'] ?>">
                <div class="invalid-feedback">
                  Satuan tidak boleh kosong.
                </div>
              </div>
              <div class="mb-3">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukan harga jual" required value="<?php if (isset($dataedit)) echo $dataedit['harga_jual'] ?>">
                <div class="invalid-feedback">
                  Harga jual tidak boleh kosong.
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="editproduk" form="editproduk">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Edit End -->

  </div>
  <footer class="footer px-4">
    <div><a href="https://coreui.io">CoreUI</a> <a href="https://coreui.io/product/free-bootstrap-admin-template/">Bootstrap Admin Template</a> © 2024 creativeLabs.</div>
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
</body>

</html>
