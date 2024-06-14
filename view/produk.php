<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Produk - Inventory MRP</title>
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
  <h1>Data Produk</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Data Produk</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card rounded-4">
        <div class="card-body">
          <h5 class="card-title">Data Produk</h5>
          <p>Berikut adalah semua data produk. Gunakan <code>.Search</code> untuk mencari atau memfilter data. Gunakan kolom <code>.Aksi</code> untuk mengolah data.</p>
          <a href="#" data-bs-toggle="modal" data-bs-target="#tambah-data-produk" class="btn btn-outline-primary mt-2 mb-4 rounded-pill"><i class="bi bi-plus-circle"></i><span> Tambahkan data </span></a>
          <a href="#" onclick="location.reload();" class="btn btn-outline-warning mt-2 mb-4 rounded-pill"><i class="bi bi-arrow-clockwise"></i><span> Refresh data </span></a>

          <!-- Table with stripped rows -->
          <div class="table-responsive">
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#No</th>
                  <th scope="col">ID Produk</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Tipe</th>
                  <th scope="col">Profil</th>
                  <th scope="col">Warna</th>
                  <th scope="col">Size</th>
                  <th scope="col">Load</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $data_produk = getDataProduk();
                $no = 0;
                foreach ($data_produk as $fetch_produk) {
                  $no++;
                ?>
                  <tr>
                    <th scope="row"><b><?= $no; ?></b></th>
                    <td><?= $fetch_produk['id_produk']; ?></td>
                    <td><?= $fetch_produk['nama_produk']; ?></td>
                    <td><?= $fetch_produk['tipe']; ?></td>
                    <td><?= $fetch_produk['profil']; ?></td>
                    <td><?= $fetch_produk['warna']; ?></td>
                    <td><?= $fetch_produk['size']; ?></td>
                    <td><?= $fetch_produk['load']; ?></td>
                    <td>
                      <a href="#" class="btn btn-sm btn-outline-warning rounded-pill mt-1" data-bs-toggle="modal" data-bs-target="#edit-data-produk-<?= $fetch_produk['id_produk']; ?>"><i class="bi bi-pencil-square"></i></a>
                      <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="<?= $_SERVER['PHP_SELF'] . "?u=hapus-produk&id=" . $fetch_produk['id_produk']; ?>" class="btn btn-sm btn-outline-danger rounded-pill mt-1"><i class="bi bi-trash"></i></a>

                      <!-- Modal Edit Data Produk -->
                      <div class="modal fade" id="edit-data-produk-<?= $fetch_produk['id_produk']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-<?= $fetch_produk['id_produk']; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel-<?= $fetch_produk['id_produk']; ?>">Edit Data Produk</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form method="post">
                                <div class="d-flex justify-content-center">
                                  <img class="img-fluid" width="120px" src="../view/assets/img/material.png" rel="icon">
                                </div>

                                <h6 class="text-center">Silahkan isi data dengan lengkap di bawah ini. </h6>
                                <hr>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <!-- <label for="edit_id_produk">ID Produk</label> -->
                                  </div>
                                  <div class="col-9">
                                    <input type="hidden" class="form-control rounded-pill" name="id_produk" id="edit_id_produk" value="<?= $fetch_produk['id_produk']; ?>" readonly>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_nama_produk">Nama Produk</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="text" class="form-control rounded-pill" name="nama_produk" id="edit_nama_produk" value="<?= $fetch_produk['nama_produk']; ?>" required>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_tipe">Tipe</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="text" class="form-control rounded-pill" name="tipe" id="edit_tipe" value="<?= $fetch_produk['tipe']; ?>" required>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_profil">Profil</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="text" class="form-control rounded-pill" name="profil" id="edit_profil" value="<?= $fetch_produk['profil']; ?>" required>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_warna">Warna</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="text" class="form-control rounded-pill" name="warna" id="edit_warna" value="<?= $fetch_produk['warna']; ?>" required>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_size">Size</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="text" class="form-control rounded-pill" name="size" id="edit_size" value="<?= $fetch_produk['size']; ?>" required>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_load">Load</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="text" class="form-control rounded-pill" name="load" id="edit_load" value="<?= $fetch_produk['load']; ?>" required>
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                              <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
                              <button class="btn btn-primary rounded-pill" type="submit" name="edit-produk">Simpan</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End Modal Edit Data Produk -->
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- End Table with stripped rows -->

        </div>
      </div>
    </div>
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

<?php include "modals.php"; ?>
</html>
