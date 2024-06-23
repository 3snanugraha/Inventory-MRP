<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link" href="<?= $_SERVER['PHP_SELF'] . '?u=home'; ?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#produk-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-box-seam"></i><span>Produk</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="produk-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=produk'; ?>">
          <i class="bi bi-circle"></i><span>Daftar Produk</span>
        </a>
      </li>
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=customers'; ?>">
          <i class="bi bi-circle"></i><span>Pelanggan</span>
        </a>
      </li>
    </ul>
  </li><!-- End Produk Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#bahan-baku-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-box-seam"></i><span>Bahan Baku</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="bahan-baku-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=bahan_baku'; ?>">
          <i class="bi bi-circle"></i><span>Daftar Bahan Baku</span>
        </a>
      </li>
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=bahan_baku_masuk'; ?>">
          <i class="bi bi-circle"></i><span>Bahan Baku Masuk</span>
        </a>
      </li>
    </ul>
  </li><!-- End Bahan Baku Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#bom-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-clipboard-data"></i><span>BOM</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="bom-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=bom'; ?>">
          <i class="bi bi-circle"></i><span>Daftar BOM</span>
        </a>
      </li>
    </ul>
  </li><!-- End BOM Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#mps-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-calendar3"></i><span>MPS</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="mps-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=mps'; ?>">
          <i class="bi bi-circle"></i><span>Daftar MPS</span>
        </a>
      </li>
    </ul>
  </li><!-- End MPS Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#mrp-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-gear"></i><span>MRP</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="mrp-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=mrp'; ?>">
          <i class="bi bi-circle"></i><span>Daftar MRP</span>
        </a>
      </li>
    </ul>
  </li><!-- End MRP Nav -->

  

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#akun-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-circle"></i><span>Akun</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="akun-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=ubah_akun'; ?>">
          <i class="bi bi-circle"></i><span>Ubah Akun</span>
        </a>
      </li>
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=logout'; ?>">
          <i class="bi bi-circle"></i><span>Logout</span>
        </a>
      </li>
    </ul>
  </li><!-- End Akun Nav -->

</ul>

</aside>
