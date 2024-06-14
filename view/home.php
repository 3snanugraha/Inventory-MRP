<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Inventory MRP</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../view/assets/img/favicon.png" rel="icon">
  <link href="../view/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../view/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../view/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../view/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../view/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../view/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../view/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../view/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../view/assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <?php
  include "header.php";
  ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= --> 
  <?php
  include "sidebar.php";
  ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
                  <section class="section dashboard">
                  <div class="row">

                      <!-- Kartu Data Produk -->
                      <div class="col-xxl-4 col-md-6">
                          <div class="card info-card product-card">
                              <div class="card-body">
                                  <h5 class="card-title">Data Produk</h5>
                                  <div class="d-flex align-items-center">
                                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-warning">
                                          <i class="bi bi-box"></i>
                                      </div>
                                      <div class="ps-3">
                                          <h6><?= countRowsProduk(); ?></h6>
                                          <span class="text-muted small pt-2">Total produk tersedia</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><!-- Akhir Kartu Data Produk -->

                      <!-- Kartu Data Pelanggan -->
                      <div class="col-xxl-4 col-md-6">
                          <div class="card info-card customer-card">
                              <div class="card-body">
                                  <h5 class="card-title">Data Pelanggan</h5>
                                  <div class="d-flex align-items-center">
                                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-success text-light">
                                          <i class="bi bi-people"></i>
                                      </div>
                                      <div class="ps-3">
                                          <h6><?= countRowsCustomer(); ?></h6>
                                          <span class="text-muted small pt-2">Total pelanggan terdaftar</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><!-- Akhir Kartu Data Pelanggan -->

                      <!-- Kartu Data Bahan Baku -->
                      <div class="col-xxl-4 col-md-6">
                          <div class="card info-card raw-material-card">
                              <div class="card-body">
                                  <h5 class="card-title">Data Bahan Baku</h5>
                                  <div class="d-flex align-items-center">
                                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-info text-light">
                                          <i class="bi bi-boxes"></i>
                                      </div>
                                      <div class="ps-3">
                                          <h6><?= countRowsBahanBaku(); ?></h6>
                                          <span class="text-muted small pt-2">Total bahan baku tersedia</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><!-- Akhir Kartu Data Bahan Baku -->

                      <!-- Kartu Data Bahan Baku Masuk -->
                      <div class="col-xxl-4 col-md-6">
                          <div class="card info-card material-in-card">
                              <div class="card-body">
                                  <h5 class="card-title">Data Bahan Baku Masuk</h5>
                                  <div class="d-flex align-items-center">
                                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-warning">
                                          <i class="bi bi-box"></i>
                                      </div>
                                      <div class="ps-3">
                                          <h6><?= countRowsBahanBakuMasuk(); ?></h6>
                                          <span class="text-muted small pt-2">Total bahan baku masuk</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><!-- Akhir Kartu Data Bahan Baku Masuk -->

                      <!-- Kartu Data Bill of Materials (BOM) -->
                      <div class="col-xxl-4 col-md-6">
                          <div class="card info-card bom-card">
                              <div class="card-body">
                                  <h5 class="card-title">Data BOM</h5>
                                  <div class="d-flex align-items-center">
                                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-success text-light">
                                          <i class="bi bi-archive"></i>
                                      </div>
                                      <div class="ps-3">
                                          <h6><?= countRowsBOM(); ?></h6>
                                          <span class="text-muted small pt-2">Total Bill of Materials (BOM)</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><!-- Akhir Kartu Data Bill of Materials (BOM) -->

                      <!-- Kartu Data MRP -->
                      <div class="col-xxl-4 col-md-6">
                          <div class="card info-card mrp-card">
                              <div class="card-body">
                                  <h5 class="card-title">Data MRP</h5>
                                  <div class="d-flex align-items-center">
                                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-info text-light">
                                          <i class="bi bi-file-earmark-text"></i>
                                      </div>
                                      <div class="ps-3">
                                          <h6><?= countRowsMRP(); ?></h6>
                                          <span class="text-muted small pt-2">Total Material Requirements Planning (MRP)</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><!-- Akhir Kartu Data MRP -->

                  </div>
              </section>


            </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <?php
  include "footer.php";
  ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../view/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../view/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../view/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../view/assets/vendor/quill/quill.min.js"></script>
  <script src="../view/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../view/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../view/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../view/assets/js/main.js"></script>

</body>

</html>