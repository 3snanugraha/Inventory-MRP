<!-- Modal Tambah Data Produk -->
<div class="modal fade" id="tambah-data-produk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Data Produk</h5>
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
              <label for="tambah_nama_produk">Nama Produk</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="nama_produk" id="tambah_nama_produk" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_tipe">Tipe</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="tipe" id="tambah_tipe" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_profil">Profil</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="profil" id="tambah_profil" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_warna">Warna</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="warna" id="tambah_warna" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_size">Size</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="size" id="tambah_size" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_load">Load</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="load" id="tambah_load" required>
            </div>
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
        <button class="btn btn-primary rounded-pill" type="submit" name="tambah-produk">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Tambah Data Produk -->


<!-- Modal Tambah Data Pelanggan -->
<div class="modal fade" id="tambah-data-pelanggan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Data Pelanggan</h5>
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
              <label for="tambah_nama_pelanggan">Nama Pelanggan</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="nama_pelanggan" id="tambah_nama_pelanggan" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_alamat">Alamat</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="alamat" id="tambah_alamat" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_telepon">Telepon</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="telepon" id="tambah_telepon" required>
            </div>
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
        <button class="btn btn-primary rounded-pill" type="submit" name="tambah-pelanggan">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Tambah Data Pelanggan -->

<!-- Modal Tambah Data Bahan Baku -->
<div class="modal fade" id="tambah-data-bahan-baku" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Data Bahan Baku</h5>
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
              <label for="tambah_kode_bom">Kode BOM</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="kode_bom" id="tambah_kode_bom" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_id_produk">ID Produk</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="id_produk" id="tambah_id_produk" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_nama_bahan_baku">Nama Bahan Baku</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="nama_bahan_baku" id="tambah_nama_bahan_baku" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_jenis_bahan_baku">Jenis Bahan Baku</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="jenis_bahan_baku" id="tambah_jenis_bahan_baku" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_stok_awal">Stok Awal</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="stok_awal" id="tambah_stok_awal" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_stok_akhir">Stok Akhir</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="stok_akhir" id="tambah_stok_akhir" required>
            </div>
          </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
        <button class="btn btn-primary rounded-pill" type="submit" name="tambah-bahan-baku">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Tambah Data Bahan Baku -->


<!-- Modal Tambah Data Bahan Baku Masuk -->
<div class="modal fade" id="tambah-data-bahan-baku-masuk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Data Bahan Baku Masuk</h5>
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
              <label for="tambah_id_bahan_baku">ID Bahan Baku</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="id_bahan_baku" id="tambah_id_bahan_baku" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_nama_supplier">Nama Supplier</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="nama_supplier" id="tambah_nama_supplier" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_jumlah_bahan_masuk">Jumlah Bahan Masuk</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="jumlah_bahan_masuk" id="tambah_jumlah_bahan_masuk" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_tanggal_bahan_masuk">Tanggal Bahan Masuk</label>
            </div>
            <div class="col-9">
              <input type="date" class="form-control rounded-pill" name="tanggal_bahan_masuk" id="tambah_tanggal_bahan_masuk" required>
            </div>
          </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
        <button class="btn btn-primary rounded-pill" type="submit" name="tambah-bahan-baku-masuk">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Tambah Data Bahan Baku Masuk -->

<!-- Modal Tambah Data BOM -->
<div class="modal fade" id="tambah-data-bom" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Data BOM</h5>
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
              <label for="tambah_id_produk">ID Produk</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="id_produk" id="tambah_id_produk" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_nama_komponen">Nama Komponen</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="nama_komponen" id="tambah_nama_komponen" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_panjang">Panjang</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="panjang" id="tambah_panjang" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_tb">TB</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="tb" id="tambah_tb" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_jumlah">Jumlah</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="jumlah" id="tambah_jumlah" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_satuan">Satuan</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="satuan" id="tambah_satuan" required>
            </div>
          </div>

          <div class="text-center mt-5 mb-2">
            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
            <button class="btn btn-primary rounded-pill" type="submit" name="tambah-bom">Simpan</button>
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Tambah Data BOM -->


<!-- Modal Tambah Data MRP -->
<div class="modal fade" id="tambah-data-mrp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Data MRP</h5>
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
              <label for="tambah_id_mps">ID MPS</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="id_mps" id="tambah_id_mps" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_kode_bom">Kode BOM</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="kode_bom" id="tambah_kode_bom" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_gr">GR</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="gr" id="tambah_gr" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_ohi">OHI</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="ohi" id="tambah_ohi" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_nr">NR</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="nr" id="tambah_nr" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tambah_por">POR</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="por" id="tambah_por" required>
            </div>
          </div>

          <div class="text-center mt-5 mb-2">
              <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
              <button class="btn btn-primary rounded-pill" type="submit" name="tambah-mrp">Simpan</button>
          </div>
        </form>
      </div>
      <div class="modal-footer d-flex justify-content-center">

      </div>
    </div>
  </div>
</div>
<!-- End Modal Tambah Data MRP -->
