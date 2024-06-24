<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Data MPS - Inventory MRP</title>
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
        <h1>Data Master Production Schedule (MPS)</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data MPS</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <h5 class="card-title">Data Master Production Schedule (MPS)</h5>
                        <p>Berikut adalah semua data Master Production Schedule (MPS). Gunakan <code>.Search</code> untuk mencari atau memfilter data. Gunakan kolom <code>.Aksi</code> untuk mengolah data.</p>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#tambah-data-mps" class="btn btn-outline-primary mt-2 mb-4 rounded-pill"><i class="bi bi-plus-circle"></i><span> Tambahkan data </span></a>
                        <a href="#" onclick="location.reload();" class="btn btn-outline-warning mt-2 mb-4 rounded-pill"><i class="bi bi-arrow-clockwise"></i><span> Refresh data </span></a>
                     
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#No</th>
                                        <th scope="col">ID MPS</th>
                                        <th scope="col">ID Produk</th>
                                        <th scope="col">Order</th>
                                        <th scope="col">Jadwal Export</th>
                                        <th scope="col">Wk</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Ambil data MPS dari database (contoh pengambilan data, sesuaikan dengan logika aplikasi Anda)
                                    $data_mps = getDataMPS();
                                    $no = 0;
                                    foreach ($data_mps as $fetch_mps) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <th scope="row"><b><?= $no; ?></b></th>
                                            <td><?= $fetch_mps['id_mps']; ?></td>
                                            <td>
                                            #
                                            <?= $fetch_mps['id_produk']; ?>
                                            <a href="#" class="btn btn-sm btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#detail-produk-<?= $fetch_mps['id_produk']; ?>">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                                <!-- Modal Detail Produk -->
                                                <div class="modal fade" id="detail-produk-<?= $fetch_mps['id_produk']; ?>" tabindex="-1" aria-labelledby="detailProdukLabel-<?= $fetch_mps['id_produk']; ?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="detailProdukLabel-<?= $fetch_mps['id_produk']; ?>">Detail Produk (ID: <?= $fetch_mps['id_produk']; ?>)</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Fetch and display the product details using PHP -->
                                                                <h6>Nama Produk: <?= $fetch_mps['nama_produk']; ?></h6>
                                                                <p>Tipe: <?= $fetch_mps['tipe']; ?></p>
                                                                <p>Profil: <?= $fetch_mps['profil']; ?></p>
                                                                <p>Warna: <?= $fetch_mps['warna']; ?></p>
                                                                <p>Size: <?= $fetch_mps['size']; ?></p>
                                                                <p>Load: <?= $fetch_mps['load']; ?></p>
                                                                <!-- Add more details as needed -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= $fetch_mps['order']; ?></td>
                                            <td><?= $fetch_mps['jadwal_export']; ?></td>
                                            <td><?= $fetch_mps['wk']; ?></td>
                                            <td><?= $fetch_mps['tanggal']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-warning rounded-pill mt-1" data-bs-toggle="modal" data-bs-target="#edit-data-mps-<?= $fetch_mps['id_mps']; ?>"><i class="bi bi-pencil-square"></i></a>
                                                <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="<?= $_SERVER['PHP_SELF'] . "?u=hapus-mps&id=" . $fetch_mps['id_mps']; ?>" class="btn btn-sm btn-outline-danger rounded-pill mt-1"><i class="bi bi-trash"></i></a>

                                                <!-- Modal Edit Data MPS -->
                                                <div class="modal fade" id="edit-data-mps-<?= $fetch_mps['id_mps']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-<?= $fetch_mps['id_mps']; ?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel-<?= $fetch_mps['id_mps']; ?>">Edit Data MPS</h5>
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
                                                                            <!-- <label for="edit_id_mps">ID MPS</label> -->
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <input type="hidden" class="form-control rounded-pill" name="id_mps" id="edit_id_mps" value="<?= $fetch_mps['id_mps']; ?>" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-2">
                                                                        <div class="col-3">
                                                                            <label for="edit_id_produk">ID Produk</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <input type="text" class="form-control rounded-pill" name="id_produk" id="edit_id_produk" value="<?= $fetch_mps['id_produk']; ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-2">
                                                                        <div class="col-3">
                                                                            <label for="edit_order">Order</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <input type="text" class="form-control rounded-pill" name="order" id="edit_order" value="<?= $fetch_mps['order']; ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-2">
                                                                        <div class="col-3">
                                                                            <label for="edit_jadwal_export">Jadwal Export</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <input type="date" class="form-control rounded-pill" name="jadwal_export" id="edit_jadwal_export" value="<?= $fetch_mps['jadwal_export']; ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-2">
                                                                        <div class="col-3">
                                                                            <label for="edit_wk">Wk</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <input type="text" class="form-control rounded-pill" name="wk" id="edit_wk" value="<?= $fetch_mps['wk']; ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-2">
                                                                        <div class="col-3">
                                                                            <label for="edit_tanggal">Tanggal</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <input type="date" class="form-control rounded-pill" name="tanggal" id="edit_tanggal" value="<?= $fetch_mps['tanggal']; ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="text-center mt-5 mb-2">
                                                                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
                                                                        <button class="btn btn-primary rounded-pill" type="submit" name="edit-mps">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-center">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Edit Data MPS -->

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
