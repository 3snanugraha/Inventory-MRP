<?php
// Semua Alur diatur disini
include "Function.php";

// ======================
// GET Method Routing
// ======================
if(isset($_GET['u'])){
    // View Login
    if($_GET['u']=='login'){
        LoginSessionCheck();
        include "../view/login.php";
    }
    // View Logout
    if($_GET['u']=='logout'){
        Logout();
    }
    // View Home
    else if($_GET['u']=='home'){
        SessionCheck();
        include "../view/home.php";
    }
    // View Customers
    else if($_GET['u']=='customers'){
        SessionCheck();
        include "../view/customers.php";
    }
    // View Produk
    else if($_GET['u']=='produk'){
        SessionCheck();
        include "../view/produk.php";
    }
    // View Bahan Baku
    else if($_GET['u']=='bahan_baku'){
        SessionCheck();
        include "../view/bahan_baku.php";
    }
    // View Bahan Baku Masuk
    else if($_GET['u']=='bahan_baku_masuk'){
        SessionCheck();
        include "../view/bahan_baku_masuk.php";
    }
    // View BOM
    else if($_GET['u']=='bom'){
        SessionCheck();
        include "../view/bom.php";
    }
    // View MRP
    else if($_GET['u']=='mrp'){
        SessionCheck();
        include "../view/mrp.php";
    }
    // View MPS
    else if($_GET['u']=='mps'){
        SessionCheck();
        include "../view/mps.php";
    }
    // View Pesanan
    else if($_GET['u']=='pesanan'){
        SessionCheck();
        include "../view/pesanan.php";
    }
    // View Detail Pesanan
    else if($_GET['u']=='dtl_pesanan'){
        SessionCheck();
        include "../view/dtl_pesanan.php";
    }
    // Hapus Produk 
    else if($_GET['u']=='hapus-produk'){
        SessionCheck();
        $id=$_GET['id'];
        hapusProduk($id);
    }
    // Hapus Pelanggan 
    else if($_GET['u']=='hapus-pelanggan'){
        SessionCheck();
        $id=$_GET['id'];
        hapusCustomer($id);
    }
    // Hapus Bahan Baku 
    else if ($_GET['u'] == 'hapus-bahan-baku') {
        SessionCheck();
        $id_bahan_baku = $_GET['id'];
        hapusBahanBaku($id_bahan_baku);
    }
    // Hapus Bahan Baku Masuk
    else if ($_GET['u'] == 'hapus-bahan-baku-masuk') {
        SessionCheck();
        $id_bahan_baku_masuk = $_GET['id'];
        hapusBahanBakuMasuk($id_bahan_baku_masuk);
    }
    // Hapus BOM
    else if ($_GET['u'] == 'hapus-bom') {
        SessionCheck();
        $kode_bom = $_GET['kode'];
        hapusBOM($kode_bom);
    }
    // Hapus MRP
    else if ($_GET['u'] == 'hapus-mrp') {
        SessionCheck();
        $id_mrp = $_GET['id'];
        hapusMRP($id_mrp);
    }
    // Hapus MPS
    else if ($_GET['u'] == 'hapus-mps') {
        SessionCheck();
        $id_mps = $_GET['id'];
        hapusMPS($id_mps);
    }
    // Hapus Pesanan
    else if ($_GET['u'] == 'hapus-pesanan') {
        SessionCheck();
        $no_pesan = $_GET['id'];
        hapusPesanan($no_pesan);
    }
    // Invalid Link
    else {
        echo "<h1 class='text-center'>Maaf fitur belum ada / sedang dimaintenance.</h1>";
    }
}else{
    LoginSessionCheck();
    include "../view/login.php";
}

// ======================
// POST Method untuk Form
// ======================
// Login Handler
if(isset($_POST['login-admin'])){
    include "Database.php";
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    LoginAdmin($username, $password);
}

// Tambah Customer Handler
if(isset($_POST['tambah-pelanggan'])) {
    include "Database.php";
    $customer_name = mysqli_real_escape_string($conn, $_POST['nama_pelanggan']);
    $customer_address = mysqli_real_escape_string($conn, $_POST['alamat']);
    $customer_phone = mysqli_real_escape_string($conn, $_POST['telepon']);
    tambahCustomer($customer_name, $customer_address, $customer_phone);
}

// Edit Customer Handler
if(isset($_POST['edit-pelanggan'])) {
    include "Database.php";
    $id_pelanggan = mysqli_real_escape_string($conn, $_POST['id_pelanggan']);
    $customer_name = mysqli_real_escape_string($conn, $_POST['nama_pelanggan']);
    $customer_address = mysqli_real_escape_string($conn, $_POST['alamat']);
    $customer_phone = mysqli_real_escape_string($conn, $_POST['kontak']);
    editCustomer($id_pelanggan, $customer_name, $customer_address, $customer_phone);
}

// Tambah Produk Handler
if(isset($_POST['tambah-produk'])) {
    include "Database.php";
    $nama_produk = mysqli_real_escape_string($conn, $_POST['nama_produk']);
    $tipe = mysqli_real_escape_string($conn, $_POST['tipe']);
    $profil = mysqli_real_escape_string($conn, $_POST['profil']);
    $warna = mysqli_real_escape_string($conn, $_POST['warna']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $load = mysqli_real_escape_string($conn, $_POST['load']);
    tambahProduk($nama_produk, $tipe, $profil, $warna, $size, $load);
}

// Tambah Bahan Baku Handler
if (isset($_POST['tambah-bahan-baku'])) {
    include "Database.php";
    $kode_bom = mysqli_real_escape_string($conn, $_POST['kode_bom']);
    $id_produk = mysqli_real_escape_string($conn, $_POST['id_produk']);
    $nama_bahan_baku = mysqli_real_escape_string($conn, $_POST['nama_bahan_baku']);
    $jenis_bahan_baku = mysqli_real_escape_string($conn, $_POST['jenis_bahan_baku']);
    $stok_awal = mysqli_real_escape_string($conn, $_POST['stok_awal']);
    $stok_akhir = mysqli_real_escape_string($conn, $_POST['stok_akhir']);
    tambahBahanBaku($kode_bom, $id_produk, $nama_bahan_baku, $jenis_bahan_baku, $stok_awal, $stok_akhir);
}

// Tambah Bahan Baku Masuk Handler
if (isset($_POST['tambah-bahan-baku-masuk'])) {
    include "Database.php";
    $id_bahan_baku = mysqli_real_escape_string($conn, $_POST['id_bahan_baku']);
    $nama_supplier = mysqli_real_escape_string($conn, $_POST['nama_supplier']);
    $jumlah_bahan_masuk = mysqli_real_escape_string($conn, $_POST['jumlah_bahan_masuk']);
    $tanggal_bahan_masuk = mysqli_real_escape_string($conn, $_POST['tanggal_bahan_masuk']);
    tambahBahanBakuMasuk($id_bahan_baku, $nama_supplier, $jumlah_bahan_masuk, $tanggal_bahan_masuk);
}

// Tambah BOM Handler
if (isset($_POST['tambah-bom'])) {
    include "Database.php";
    $id_produk = mysqli_real_escape_string($conn, $_POST['id_produk']);
    $nama_komponen = mysqli_real_escape_string($conn, $_POST['nama_komponen']);
    $panjang = mysqli_real_escape_string($conn, $_POST['panjang']);
    $tb = mysqli_real_escape_string($conn, $_POST['tb']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);
    $satuan = mysqli_real_escape_string($conn, $_POST['satuan']);
    tambahBOM($id_produk, $nama_komponen, $panjang, $tb, $jumlah, $satuan);
}

// Tambah MRP Handler
if (isset($_POST['tambah-mrp'])) {
    include "Database.php";
    $id_mps = mysqli_real_escape_string($conn, $_POST['id_mps']);
    $kode_bom = mysqli_real_escape_string($conn, $_POST['kode_bom']);
    $gr = mysqli_real_escape_string($conn, $_POST['gr']);
    $ohi = mysqli_real_escape_string($conn, $_POST['ohi']);
    $nr = mysqli_real_escape_string($conn, $_POST['nr']);
    $por = mysqli_real_escape_string($conn, $_POST['por']);
    tambahMRP($id_mps, $kode_bom, $gr, $ohi, $nr, $por);
}

// Tambah MPS Handler
if (isset($_POST['tambah-mps'])) {
    include "Database.php";
    $id_produk = mysqli_real_escape_string($conn, $_POST['id_produk']);
    $order = mysqli_real_escape_string($conn, $_POST['order']);
    $jadwal_export = mysqli_real_escape_string($conn, $_POST['jadwal_export']);
    $wk = mysqli_real_escape_string($conn, $_POST['wk']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    tambahMPS($id_produk, $order, $jadwal_export, $wk, $tanggal);
}

// Tambah Pesanan Handler
if (isset($_POST['tambah-pesanan'])) {
    include "Database.php";
    $id_pelanggan = mysqli_real_escape_string($conn, $_POST['id_pelanggan']);
    $tipe_kontainer = mysqli_real_escape_string($conn, $_POST['tipe_kontainer']);
    $tgl_pesanan = mysqli_real_escape_string($conn, $_POST['tgl_pesanan']);
    $jadwal_kirim = mysqli_real_escape_string($conn, $_POST['jadwal_kirim']);
    $nama_ekspedisi = mysqli_real_escape_string($conn, $_POST['nama_ekspedisi']);
    $shipping_address = mysqli_real_escape_string($conn, $_POST['shipping_address']);
    tambahPesanan($id_pelanggan, $tipe_kontainer, $tgl_pesanan, $jadwal_kirim, $nama_ekspedisi, $shipping_address);
}

// Tambah Detail Pesanan Handler
if (isset($_POST['tambah-dtl_pesanan'])) {
    include "Database.php";
    $no_pesan = mysqli_real_escape_string($conn, $_POST['no_pesan']);
    $id_produk = mysqli_real_escape_string($conn, $_POST['id_produk']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);
    tambahDetailPesanan($no_pesan, $id_produk, $jumlah);
}

// Edit Produk Handler
if (isset($_POST['edit-produk'])) {
    include "Database.php";
    $id_produk = mysqli_real_escape_string($conn, $_POST['id_produk']);
    $nama_produk = mysqli_real_escape_string($conn, $_POST['nama_produk']);
    $tipe = mysqli_real_escape_string($conn, $_POST['tipe']);
    $profil = mysqli_real_escape_string($conn, $_POST['profil']);
    $warna = mysqli_real_escape_string($conn, $_POST['warna']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $load = mysqli_real_escape_string($conn, $_POST['load']);
    $created_at = mysqli_real_escape_string($conn, $_POST['created_at']);
    editProduk($id_produk, $nama_produk, $tipe, $profil, $warna, $size, $load, $created_at);
}

// Edit Bahan Baku Handler
if (isset($_POST['edit-bahan-baku'])) {
    include "Database.php";
    $id_bahan_baku = mysqli_real_escape_string($conn, $_POST['id_bahan_baku']);
    $kode_bom = mysqli_real_escape_string($conn, $_POST['kode_bom']);
    $id_produk = mysqli_real_escape_string($conn, $_POST['id_produk']);
    $nama_bahan_baku = mysqli_real_escape_string($conn, $_POST['nama_bahan_baku']);
    $jenis_bahan_baku = mysqli_real_escape_string($conn, $_POST['jenis_bahan_baku']);
    $stok_awal = mysqli_real_escape_string($conn, $_POST['stok_awal']);
    $stok_akhir = mysqli_real_escape_string($conn, $_POST['stok_akhir']);
    editBahanBaku($id_bahan_baku, $kode_bom, $id_produk, $nama_bahan_baku, $jenis_bahan_baku, $stok_awal, $stok_akhir);
}

// Edit Bahan Baku Masuk Handler
if (isset($_POST['edit-bahan-baku-masuk'])) {
    include "Database.php";
    $id_bahan_baku_masuk = mysqli_real_escape_string($conn, $_POST['no_bahan_masuk']);
    $id_bahan_baku = mysqli_real_escape_string($conn, $_POST['id_bahan_baku']);
    $nama_supplier = mysqli_real_escape_string($conn, $_POST['nama_supplier']);
    $jumlah_bahan_masuk = mysqli_real_escape_string($conn, $_POST['jumlah_bahan_masuk']);
    $tanggal_bahan_masuk = mysqli_real_escape_string($conn, $_POST['tanggal_bahan_masuk']);
    editBahanBakuMasuk($id_bahan_baku_masuk, $id_bahan_baku, $nama_supplier, $jumlah_bahan_masuk, $tanggal_bahan_masuk);
}

// Edit BOM Handler
if (isset($_POST['edit-bom'])) {
    include "Database.php";
    $kode_bom = mysqli_real_escape_string($conn, $_POST['kode_bom']);
    $id_produk = mysqli_real_escape_string($conn, $_POST['id_produk']);
    $nama_komponen = mysqli_real_escape_string($conn, $_POST['nama_komponen']);
    $panjang = mysqli_real_escape_string($conn, $_POST['panjang']);
    $tb = mysqli_real_escape_string($conn, $_POST['tb']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);
    $satuan = mysqli_real_escape_string($conn, $_POST['satuan']);
    $created_at = mysqli_real_escape_string($conn, $_POST['created_at']);
    editBOM($kode_bom, $id_produk, $nama_komponen, $panjang, $tb, $jumlah, $satuan, $created_at);
}

// Edit MRP Handler
if (isset($_POST['edit-mrp'])) {
    include "Database.php";
    $id_mrp = mysqli_real_escape_string($conn, $_POST['id_mrp']);
    $id_mps = mysqli_real_escape_string($conn, $_POST['id_mps']);
    $kode_bom = mysqli_real_escape_string($conn, $_POST['kode_bom']);
    $gr = mysqli_real_escape_string($conn, $_POST['gr']);
    $ohi = mysqli_real_escape_string($conn, $_POST['ohi']);
    $nr = mysqli_real_escape_string($conn, $_POST['nr']);
    $por = mysqli_real_escape_string($conn, $_POST['por']);
    $created_at = mysqli_real_escape_string($conn, $_POST['created_at']);
    editMRP($id_mrp, $id_mps, $kode_bom, $gr, $ohi, $nr, $por, $created_at);
}

// Edit MPS Handler
if (isset($_POST['edit-mps'])) {
    include "Database.php";
    $id_mps = mysqli_real_escape_string($conn, $_POST['id_mps']);
    $id_produk = mysqli_real_escape_string($conn, $_POST['id_produk']);
    $order = mysqli_real_escape_string($conn, $_POST['order']);
    $jadwal_export = mysqli_real_escape_string($conn, $_POST['jadwal_export']);
    $wk = mysqli_real_escape_string($conn, $_POST['wk']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    editMPS($id_mps, $id_produk, $order, $jadwal_export, $wk, $tanggal);
}

// Edit Pesanan Handler
if (isset($_POST['edit-pesanan'])) {
    include "Database.php";
    $no_pesan = mysqli_real_escape_string($conn, $_POST['no_pesan']);
    $id_pelanggan = mysqli_real_escape_string($conn, $_POST['id_pelanggan']);
    $tipe_kontainer = mysqli_real_escape_string($conn, $_POST['tipe_kontainer']);
    $tgl_pesanan = mysqli_real_escape_string($conn, $_POST['tgl_pesanan']);
    $jadwal_kirim = mysqli_real_escape_string($conn, $_POST['jadwal_kirim']);
    $nama_ekspedisi = mysqli_real_escape_string($conn, $_POST['nama_ekspedisi']);
    $shipping_address = mysqli_real_escape_string($conn, $_POST['shipping_address']);
    $created_at = mysqli_real_escape_string($conn, $_POST['created_at']);
    editPesanan($no_pesan, $id_pelanggan, $tipe_kontainer, $tgl_pesanan, $jadwal_kirim, $nama_ekspedisi, $shipping_address, $created_at);
}

// Edit Detail Pesanan Handler
if (isset($_POST['edit-dtl_pesanan'])) {
    include "Database.php";
    $no_pesan = mysqli_real_escape_string($conn, $_POST['no_pesan']);
    $id_produk = mysqli_real_escape_string($conn, $_POST['id_produk']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);
    $created_at = mysqli_real_escape_string($conn, $_POST['created_at']);
    editDetailPesanan($no_pesan, $id_produk, $jumlah, $created_at);
}
?>
