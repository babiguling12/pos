    <div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
      <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
          <svg class="sidebar-brand-full" width="88" height="32" alt="CoreUI Logo">
            <use xlink:href="../assets/brand/coreui.svg#full"></use>
          </svg>
          <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
            <use xlink:href="../assets/brand/coreui.svg#signet"></use>
          </svg>
        </div>
        <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="index.php">
            <svg class="nav-icon">
              <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="pembeli.php">
            <svg class="nav-icon">
              <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
            </svg> pembeli</a></li>
        <li class="nav-item"><a class="nav-link" href="pengguna.php">
            <svg class="nav-icon">
              <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-user"></use>
            </svg> Pengguna</a></li>
        <li class="nav-title">Produk</li>
        <li class="nav-item"><a class="nav-link" href="produk.php">
            <svg class="nav-icon">
              <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-window-maximize"></use>
            </svg> Produk</a></li>
        <li class="nav-item"><a class="nav-link" href="stok.php">
            <svg class="nav-icon">
              <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-window-restore"></use>
            </svg> Stok</a></li>
        <li class="nav-title">Transaksi</li>
        <li class="nav-item"><a class="nav-link" href="transaksi.php">
            <svg class="nav-icon">
              <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-cart"></use>
            </svg> Transaksi</a></li>
        <li class="nav-item"><a class="nav-link" href="riwayat.php">
            <svg class="nav-icon">
              <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-history"></use>
            </svg> Riwayat Transaksi</a></li>
      </ul>
      <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
      </div>
    </div>