<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="<?= $_SERVER['PHP_SELF'] . '?u=home'; ?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#transaksi-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-receipt"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="transaksi-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=forecast'; ?>">
          <i class="bi bi-circle"></i><span>Forecast</span>
        </a>
      </li>
    </ul>
  </li><!-- End Transaksi Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#plan-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-sidebar-reverse"></i><span>Plan</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="plan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=bom'; ?>">
          <i class="bi bi-circle"></i><span>BOM</span>
        </a>
      </li>
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=mixing_material'; ?>">
          <i class="bi bi-circle"></i><span>Mixing Material</span>
        </a>
      </li>
    </ul>
  </li><!-- End Plan Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#master-data-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-archive"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="master-data-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=material'; ?>">
          <i class="bi bi-circle"></i><span>Material</span>
        </a>
      </li>
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=satuan'; ?>">
          <i class="bi bi-circle"></i><span>Satuan</span>
        </a>
      </li>
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=project'; ?>">
          <i class="bi bi-circle"></i><span>Project</span>
        </a>
      </li>
      <li>
        <a href="<?= $_SERVER['PHP_SELF'] . '?u=customers'; ?>">
          <i class="bi bi-circle"></i><span>Customer</span>
        </a>
      </li>
    </ul>
  </li><!-- End Master Data Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#akun-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-circle"></i><span>Akun</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="akun-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
