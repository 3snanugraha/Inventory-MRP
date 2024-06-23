<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Data Material Requirements Planning (MRP) - Inventory MRP</title>
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
  <h1>Data Material Requirements Planning (MRP)</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Data MRP</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card rounded-4">
        <div class="card-body">
          <h5 class="card-title">Data Material Requirements Planning (MRP)</h5>
          <p>Berikut adalah semua data Material Requirements Planning (MRP). Gunakan <code>.Search</code> untuk mencari atau memfilter data. Gunakan kolom <code>.Aksi</code> untuk mengolah data.</p>
          <a href="#" data-bs-toggle="modal" data-bs-target="#tambah-data-mrp" class="btn btn-outline-primary mt-2 mb-4 rounded-pill"><i class="bi bi-plus-circle"></i><span> Tambahkan data </span></a>
          <a href="#" onclick="location.reload();" class="btn btn-outline-warning mt-2 mb-4 rounded-pill"><i class="bi bi-arrow-clockwise"></i><span> Refresh data </span></a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#keterangan-mrp" class="btn btn-outline-info mt-2 mb-4 rounded-pill"><i class="bi bi-info-circle"></i><span> Keterangan </span></a>
          <a href="#" onclick="printTable()" class="btn btn-outline-secondary mt-2 mb-4 rounded-pill">
            <i class="bi bi-print"></i><span> Print Table </span>
          </a>
          <!-- Table with stripped rows -->
          <div id="tableku" class="table-responsive">
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#No</th>
                  <th scope="col">ID MPS</th>
                  <th scope="col">Kode BOM</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">GR</th>
                  <th scope="col">OHI</th>
                  <th scope="col">NR</th>
                  <th scope="col">POR</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Ambil data MRP dari database (contoh pengambilan data, sesuaikan dengan logika aplikasi Anda)
                $data_mrp = getDataMRP();
                $no = 0;
                foreach ($data_mrp as $fetch_mrp) {
                  $no++;
                ?>
                  <tr>
                    <th scope="row"><b><?= $no; ?></b></th>
                    <td><?= $fetch_mrp['id_mps']; ?></td>
                    <td>
                      #
                      <?= $fetch_mrp['kode_bom']; ?>
                      <a href="#" data-bs-toggle="modal" data-bs-target="#detail-bom-<?= $fetch_mrp['kode_bom']; ?>" class="btn btn-sm btn-outline-primary rounded-pill">
                        <i class="bi bi-eye"></i>
                      </a>
                      <!-- Modal Detail BOM -->
                        <div class="modal fade" id="detail-bom-<?= $fetch_mrp['kode_bom']; ?>" tabindex="-1" aria-labelledby="detailBOMLabel-<?= $fetch_mrp['kode_bom']; ?>" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="detailBOMLabel-<?= $fetch_mrp['kode_bom']; ?>">Detail BOM (Kode: #<?= $fetch_mrp['kode_bom']; ?>)</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <!-- Fetch and display the BOM details using PHP -->
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">ID Produk</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Nama Komponen</th>
                                        <th scope="col">Panjang</th>
                                        <th scope="col">TB</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Satuan</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <td><?= $fetch_mrp['id_produk']; ?></td>
                                          <td><?= $fetch_mrp['nama_produk']; ?></td>
                                          <td><?= $fetch_mrp['nama_komponen']; ?></td>
                                          <td><?= $fetch_mrp['panjang']; ?></td>
                                          <td><?= $fetch_mrp['tb']; ?></td>
                                          <td><?= $fetch_mrp['jumlah']; ?></td>
                                          <td><?= $fetch_mrp['satuan']; ?></td>
                                        </tr>
                                    </tbody>
                                  </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </td>
                    <td><?= $fetch_mrp['nama_produk']; ?></td>
                    <td><?= $fetch_mrp['gr']; ?></td>
                    <td><?= $fetch_mrp['ohi']; ?></td>
                    <td><?= $fetch_mrp['nr']; ?></td>
                    <td><?= $fetch_mrp['por']; ?></td>
                    <td>
                      <a href="#" class="btn btn-sm btn-outline-warning rounded-pill mt-1" data-bs-toggle="modal" data-bs-target="#edit-data-mrp-<?= $fetch_mrp['id_mrp']; ?>"><i class="bi bi-pencil-square"></i></a>
                      <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="<?= $_SERVER['PHP_SELF'] . "?u=hapus-mrp&id=" . $fetch_mrp['id_mrp']; ?>" class="btn btn-sm btn-outline-danger rounded-pill mt-1"><i class="bi bi-trash"></i></a>

                     <!-- Modal Edit Data MRP -->
                      <div class="modal fade" id="edit-data-mrp-<?= $fetch_mrp['id_mrp']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-<?= $fetch_mrp['id_mrp']; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel-<?= $fetch_mrp['id_mrp']; ?>">Edit Data MRP</h5>
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
                                    <!-- <label for="edit_id_mrp">ID MRP</label> -->
                                  </div>
                                  <div class="col-9">
                                    <input type="hidden" class="form-control rounded-pill" name="id_mrp" id="edit_id_mrp" value="<?= $fetch_mrp['id_mrp']; ?>" readonly>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_id_mps">ID MPS</label>
                                  </div>
                                  <div class="col-9">
                                    <select class="form-control rounded-pill" name="id_mps" id="edit_id_mps" required>
                                    <option value="<?= $fetch_mrp['id_mps']; ?>" selected><?= $fetch_mrp['id_mps'] . ' - ' . $fetch_mrp['nama_produk'] . ' - ' . $fetch_mrp['order'] . ' - ' . $fetch_mrp['jadwal_export']; ?></option>
                                      <?php
                                      $data_mps = getDataMPS(); // Ambil data dari fungsi getDataMPS() atau sesuai dengan implementasi Anda
                                      foreach ($data_mps as $mps) {
                                        if ($mps['id_mps'] != $fetch_mrp['id_mps']) {
                                          echo '<option value="' . $mps['id_mps'] . '">' . $mps['id_mps'] . ' - ' . $mps['nama_produk'] . ' - ' . $mps['order'] . ' - ' . $mps['jadwal_export'] . '</option>';
                                        }
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_kode_bom">Kode BOM</label>
                                  </div>
                                  <div class="col-9">
                                    <select class="form-control rounded-pill" name="kode_bom" id="edit_kode_bom" required>
                                    <option value="<?= $fetch_mrp['kode_bom']; ?>" selected><?= $fetch_mrp['kode_bom'] . ' - ' . $fetch_mrp['nama_produk'] . ' - ' . $fetch_mrp['nama_komponen']; ?></option>
                                      <?php
                                      $data_bom = getDataBOM(); // Ambil data dari fungsi getDataBOM() atau sesuai dengan implementasi Anda
                                      foreach ($data_bom as $bom) {
                                        if ($bom['kode_bom'] != $fetch_mrp['kode_bom']) {
                                          echo '<option value="' . $bom['kode_bom'] . '">' . $bom['kode_bom'] . ' - ' . $bom['nama_produk'] . ' - ' . $bom['nama_komponen'] . '</option>';
                                        }
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_gr">GR</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="text" class="form-control rounded-pill" name="gr" id="edit_gr" value="<?= $fetch_mrp['gr']; ?>" required>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_ohi">OHI</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="text" class="form-control rounded-pill" name="ohi" id="edit_ohi" value="<?= $fetch_mrp['ohi']; ?>" required>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_nr">NR</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="text" class="form-control rounded-pill" name="nr" id="edit_nr" value="<?= $fetch_mrp['nr']; ?>" required>
                                  </div>
                                </div>

                                <div class="row mt-2">
                                  <div class="col-3">
                                    <label for="edit_por">POR</label>
                                  </div>
                                  <div class="col-9">
                                    <input type="text" class="form-control rounded-pill" name="por" id="edit_por" value="<?= $fetch_mrp['por']; ?>" required>
                                  </div>
                                </div>

                                <div class="text-center mt-5 mb-2">
                                  <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
                                  <button class="btn btn-primary rounded-pill" type="submit" name="edit-mrp">Simpan</button>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End Modal Edit Data MRP -->


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
<!-- Place this JavaScript code at the end of your HTML body -->
<script>
  function printTable() {
    var printContent = document.getElementById("tableku").innerHTML;
      var originalContent = document.body.innerHTML;

      document.body.innerHTML = printContent;

      window.print();

      document.body.innerHTML = originalContent;
  }
</script>

</body>

<?php include "modals.php"; ?>
</html>
