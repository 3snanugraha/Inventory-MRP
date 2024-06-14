<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bahan Baku Masuk - Inventory MRP</title>
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
  <h1>Data Bahan Baku Masuk</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Data Bahan Baku Masuk</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card rounded-4">
        <div class="card-body">
          <h5 class="card-title">Data Bahan Baku Masuk</h5>
          <p>Berikut adalah semua data bahan baku masuk. Gunakan <code>.Search</code> untuk mencari atau memfilter data. Gunakan kolom <code>.Aksi</code> untuk mengolah data.</p>
          <a href="#" data-bs-toggle="modal" data-bs-target="#tambah-data-bahan-baku-masuk" class="btn btn-outline-primary mt-2 mb-4 rounded-pill"><i class="bi bi-plus-circle"></i><span> Tambahkan data </span></a>
          <a href="#" onclick="location.reload();" class="btn btn-outline-warning mt-2 mb-4 rounded-pill"><i class="bi bi-arrow-clockwise"></i><span> Refresh data </span></a>

          <!-- Table with stripped rows -->
          <div class="table-responsive">
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#No</th>
                  <th scope="col">No. Bahan Masuk</th>
                  <th scope="col">ID Bahan Baku</th>
                  <th scope="col">Nama Supplier</th>
                  <th scope="col">Jumlah Bahan Masuk</th>
                  <th scope="col">Tanggal Bahan Masuk</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $data_bahan_baku_masuk = getDataBahanBakuMasuk();
                $no = 0;
                foreach ($data_bahan_baku_masuk as $fetch_bahan_baku_masuk) {
                  $no++;
                ?>
                  <tr>
                    <th scope="row"><b><?= $no; ?></b></th>
                    <td><?= $fetch_bahan_baku_masuk['no_bahan_masuk']; ?></td>
                    <td><?= $fetch_bahan_baku_masuk['id_bahan_baku']; ?></td>
                    <td><?= $fetch_bahan_baku_masuk['nama_supplier']; ?></td>
                    <td><?= $fetch_bahan_baku_masuk['jumlah_bahan_masuk']; ?></td>
                    <td><?= $fetch_bahan_baku_masuk['tanggal_bahan_masuk']; ?></td>
                    <td>
                      <a href="#" class="btn btn-sm btn-outline-warning rounded-pill mt-1" data-bs-toggle="modal" data-bs-target="#edit-data-bahan-baku-masuk-<?= $fetch_bahan_baku_masuk['no_bahan_masuk']; ?>"><i class="bi bi-pencil-square"></i></a>
                      <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="<?= $_SERVER['PHP_SELF'] . "?u=hapus-bahan-baku-masuk&id=" . $fetch_bahan_baku_masuk['no_bahan_masuk']; ?>" class="btn btn-sm btn-outline-danger rounded-pill mt-1"><i class="bi bi-trash"></i></a>

                      <!-- Modal Edit Data Bahan Baku Masuk -->
                      <div class="modal fade" id="edit-data-bahan-baku-masuk-<?= $fetch_bahan_baku_masuk['no_bahan_masuk']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-<?= $fetch_bahan_baku_masuk['no_bahan_masuk']; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel-<?= $fetch_bahan_baku_masuk['no_bahan_masuk']; ?>">Edit Data Bahan Baku Masuk</h5>
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
                                    <!-- <label for="edit_no_bahan_masuk">No. Bahan Masuk</label> -->
                                  </div>
                                  <div class="col-9">
                                    <input type="hidden" class="form-control rounded-pill" name="no_bahan_masuk" id="edit_no_bahan_masuk" value="<?= $fetch_bahan_baku_masuk['no_bahan_masuk']; ?>" readonly>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_id_bahan_baku">ID Bahan Baku</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="text" class="form-control rounded-pill" name="id_bahan_baku" id="edit_id_bahan_baku" value="<?= $fetch_bahan_baku_masuk['id_bahan_baku']; ?>" required>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_nama_supplier">Nama Supplier</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="text" class="form-control rounded-pill" name="nama_supplier" id="edit_nama_supplier" value="<?= $fetch_bahan_baku_masuk['nama_supplier']; ?>" required>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_jumlah_bahan_masuk">Jumlah Bahan Masuk</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="text" class="form-control rounded-pill" name="jumlah_bahan_masuk" id="edit_jumlah_bahan_masuk" value="<?= $fetch_bahan_baku_masuk['jumlah_bahan_masuk']; ?>" required>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_tanggal_bahan_masuk">Tanggal Bahan Masuk</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="date" class="form-control rounded-pill" name="tanggal_bahan_masuk" id="edit_tanggal_bahan_masuk" value="<?= $fetch_bahan_baku_masuk['tanggal_bahan_masuk']; ?>" required>
                                  </div>
                                </div>

                                <div class="text-center mt-5 mb-2">
                                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
                                    <button class="btn btn-primary rounded-pill" type="submit" name="edit-bahan-baku-masuk">Simpan</button>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">

                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End Modal Edit Data Bahan Baku Masuk -->
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
