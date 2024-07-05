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
  <title>Pembeli | Toko</title>
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
</head>

<body>

<!-- table start -->
  <?php
  $data = mysqli_query($conn, "SELECT * FROM pembeli");

  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $dataedit = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pembeli WHERE id_member = $id"));

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
          <div class="card-header"><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Data</button></div>
          <div class="card-body">
            <div class="tab-pane p-3 active preview" role="tabpanel">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. HP</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($data as $pembeli) : ?>
                    <tr>
                      <th scope="row"><?= ++$no ?></th>
                      <td><?= $pembeli['nama_member'] ?></td>
                      <td><?= $pembeli['nik'] ?></td>
                      <td><?= $pembeli['alamat'] ?></td>
                      <td><?= $pembeli['nohp'] ?></td>
                      <td>
                        <a class="btn btn-sm btn-warning" href="pembeli.php?edit=<?= $pembeli['id_member'] ?>"><i class="icon icon-l cil-pencil"></i></a>
                        <a class="btn btn-sm btn-danger" href="../process/hapus.php?s=pembeli&id=<?= $pembeli['id_member'] ?>" onclick="return confirm('Hapus data?')"><i class="icon icon-l cil-trash"></i></a>
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
            <h1 class="modal-title fs-5">Tambah Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" action="../process/tambah.php" method="post" id="tambahpembeli" novalidate>
              <div class="mb-3">
                <label for="namamember" class="form-label">Nama Member</label>
                <input type="text" class="form-control" id="namamember" name="namamember" placeholder="Gustu-kun" required>
                <div class="invalid-feedback">
                  Nama tidak boleh kosong.
                </div>
              </div>
              <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" placeholder="5102030405060007" minlength="16" maxlength="16" required>
                <div class="invalid-feedback">
                  NIK harus memiliki panjang 16 angka.
                </div>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Denpasar, Bali" required>
                <div class="invalid-feedback">
                  Alamat tidak boleh kosong.
                </div>
              </div>
              <div class="mb-3">
                <label for="nohp" class="form-label">No Hp</label>
                <input type="text" class="form-control" id="nohp" name="nohp" placeholder="081*********" required>
                <div class="invalid-feedback">
                  Nomor HP tidak boleh kosong.
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="tambahpembeli" form="tambahpembeli">Tambah</button>
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
            <form class="needs-validation" action="../process/edit.php" method="post" id="editpembeli" novalidate>
              <input type="hidden" name="idmember" readonly value="<?php if (isset($dataedit)) echo $dataedit['id_member'] ?>">
              <div class="mb-3">
                <label for="namamember" class="form-label">Nama Member</label>
                <input type="text" class="form-control" id="namamember" name="namamember" placeholder="Gustu-kun" required value="<?php if (isset($dataedit)) echo $dataedit['nama_member'] ?>">
                <div class="invalid-feedback">
                  Nama tidak boleh kosong.
                </div>
              </div>
              <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" placeholder="5102030405060007" minlength="16" maxlength="16" required value="<?php if (isset($dataedit)) echo $dataedit['nik'] ?>">
                <div class="invalid-feedback">
                  NIK harus memiliki panjang 16 angka.
                </div>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Denpasar, Bali" required value="<?php if (isset($dataedit)) echo $dataedit['alamat'] ?>">
                <div class="invalid-feedback">
                  Alamat tidak boleh kosong.
                </div>
              </div>
              <div class="mb-3">
                <label for="nohp" class="form-label">No Hp</label>
                <input type="text" class="form-control" id="nohp" name="nohp" placeholder="081*********" required value="<?php if (isset($dataedit)) echo $dataedit['nohp'] ?>">
                <div class="invalid-feedback">
                  Nomor HP tidak boleh kosong.
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="editpembeli" form="editpembeli">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Edit End -->

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
    (function() {
      'use strict'
      const forms = document.querySelectorAll('.needs-validation')
      Array.from(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
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