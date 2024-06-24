<?php
// File ini berisi fungsi-fungsi dasar
// Error Reporting
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// ==============================================
//              Kontrol Database
// ============================================== 

// Fungsi Login Admin
function LoginAdmin($username, $password) {
    include "Database.php";
    session_start();
    $enc_password = md5($password);  // Menggunakan md5 untuk hashing password
    // Memeriksa apakah pengguna dengan role 'Admin' ada dalam tabel t_users
    $query = mysqli_query($conn, "SELECT * FROM t_users WHERE username='$username' AND password='$enc_password'");
    $fetchdata = mysqli_fetch_array($query);
    if (!empty($fetchdata['username'])) {
        // Menyimpan informasi pengguna dalam session
        $_SESSION['user_id'] = $fetchdata['id_user'];  // Menggunakan nama kolom dari tabel SQL yang telah kita buat
        $_SESSION['username'] = $fetchdata['username'];
        $_SESSION['name'] = $fetchdata['nama'];
        $_SESSION['role'] = $fetchdata['role'];
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=home';</script>";
        exit;
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=login&error=1';</script>";
        exit;
    }
}

// Fungsi Ubah Akun Admin
function ubahAkunAdmin($user_id, $old_password, $username, $password){
    include "Database.php";
    
    // Verifikasi password lama
    $query = mysqli_query($conn, "SELECT password FROM t_users WHERE id_user='$user_id' AND role='Admin'");
    $result = mysqli_fetch_assoc($query);

    if (md5($old_password) == $result['password']) {
        // Tentukan apakah password baru diisi atau tidak
        if (!empty($password)) {
            // Enkripsi password baru menggunakan MD5
            $hashed_password = md5($password);
        } else {
            // Gunakan password lama
            $hashed_password = $result['password'];
        }
        
        // Update data di database
        $query_update = mysqli_query($conn, "UPDATE t_users SET nama='$username', password='$hashed_password' WHERE id_user='$user_id' AND role='Admin'");
        
        if (!$query_update) {
            die("Query error: " . mysqli_error($conn));
        } else {
            // Update session data
            $_SESSION['username'] = $username;
            
            echo "<script>window.location='$_SERVER[PHP_SELF]?u=logout';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Password lama salah!');window.location='$_SERVER[PHP_SELF]?u=home';</script>";
    }
}

// Fungsi Periksa Session Login 
function LoginSessionCheck(){
    session_start();
    // Memeriksa apakah session username dan role sudah ada, jika ya, pengguna sudah login
    if(!empty($_SESSION['username']) && !empty($_SESSION['role'])){
        echo "<script>alert('Anda sudah login');window.location='$_SERVER[PHP_SELF]?u=home';</script>";
        exit;
    }
}

// Fungsi Periksa Session
function SessionCheck(){
    session_start();
    // Memeriksa apakah session username dan role kosong, jika ya, session telah habis atau pengguna belum login
    if(empty($_SESSION['username']) && empty($_SESSION['role'])){
        echo "<script>alert('Session telah habis. silahkan login kembali.');window.location='$_SERVER[PHP_SELF]?u=login';</script>";
        exit;
    }
}

// Logout
function Logout(){
    session_start();
    session_destroy();  // Menghancurkan semua session
    echo "<script>alert('Logout berhasil');window.location='$_SERVER[PHP_SELF]?u=login';</script>";
    exit;
}



// ==============================================
//           Function - Pelanggan
// ============================================== 

// Fungsi Tambah Customer
function tambahCustomer($nama_pelanggan, $alamat, $kontak){
    include "Database.php";

    // Masukkan data ke database
    $query_insert = mysqli_query($conn, "INSERT INTO t_pelanggan (nama_pelanggan, alamat, kontak) VALUES ('$nama_pelanggan', '$alamat', '$kontak')");
    if (!$query_insert) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=customers';</script>";
        exit;
    }
}

// Fungsi Ambil Data Customer
function getDataCustomer(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT * FROM t_pelanggan");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($customer = mysqli_fetch_array($result)) {
        $array[] = $customer;
    }
    return $array;
}

// Fungsi Edit Customer
function editCustomer($customer_id, $nama_pelanggan, $alamat, $kontak) {
    include "Database.php";
    // Menggunakan prepared statement untuk keamanan
    $query = mysqli_prepare($conn, "UPDATE t_pelanggan SET nama_pelanggan=?, alamat=?, kontak=? WHERE id_pelanggan=?");
    mysqli_stmt_bind_param($query, 'sssi', $nama_pelanggan, $alamat, $kontak, $customer_id);
    mysqli_stmt_execute($query);
    mysqli_stmt_close($query);
    mysqli_close($conn);
    echo "<script>window.location='$_SERVER[PHP_SELF]?u=customers';</script>";
    exit;
}

// Fungsi Hapus Customer
function hapusCustomer($customer_id){
    include "Database.php";
    $query = mysqli_query($conn, "DELETE FROM t_pelanggan WHERE id_pelanggan='$customer_id'");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=customers';</script>";
        exit;
    }
}

// Fungsi Hitung Jumlah Baris Customer
function countRowsCustomer(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM t_pelanggan");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}


// ==============================================
//              Kontrol Database - Produk
// ============================================== 

// Fungsi Tambah Produk
function tambahProduk($nama_produk, $tipe, $profil, $warna, $size, $load){
    include "Database.php";

    // Masukkan data ke database
    $query_insert = mysqli_query($conn, "INSERT INTO t_produk (nama_produk, tipe, profil, warna, size, `load`) VALUES ('$nama_produk', '$tipe', '$profil', '$warna', '$size', '$load')");
    if (!$query_insert) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=produk';</script>";
        exit;
    }
}

// Fungsi Ambil Data Produk
function getDataProduk(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT * FROM t_produk");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($produk = mysqli_fetch_array($result)) {
        $array[] = $produk;
    }
    return $array;
}

// Fungsi Edit Produk
function editProduk($produk_id, $nama_produk, $tipe, $profil, $warna, $size, $load) {
    include "Database.php";
    // Menggunakan prepared statement untuk keamanan
    $query = mysqli_prepare($conn, "UPDATE t_produk SET nama_produk=?, tipe=?, profil=?, warna=?, size=?, `load`=? WHERE id_produk=?");
    mysqli_stmt_bind_param($query, 'ssssssi', $nama_produk, $tipe, $profil, $warna, $size, $load, $produk_id);
    mysqli_stmt_execute($query);
    mysqli_stmt_close($query);
    mysqli_close($conn);
    echo "<script>window.location='$_SERVER[PHP_SELF]?u=produk';</script>";
    exit;
}

// Fungsi Hapus Produk
function hapusProduk($produk_id){
    include "Database.php";
    $query = mysqli_query($conn, "DELETE FROM t_produk WHERE id_produk='$produk_id'");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=produk';</script>";
        exit;
    }
}

// Fungsi Hitung Jumlah Baris Produk
function countRowsProduk(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM t_produk");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}


// ==============================================
//              Kontrol Database - Bahan Baku
// ============================================== 

// Fungsi Tambah Bahan Baku
function tambahBahanBaku($kode_bom, $id_produk, $nama_bahan_baku, $jenis_bahan_baku, $stok_awal, $stok_akhir){
    include "Database.php";

    // Masukkan data ke database
    $query_insert = mysqli_query($conn, "INSERT INTO t_bahan_baku (kode_bom, id_produk, nama_bahan_baku, jenis_bahan_baku, stok_awal, stok_akhir) VALUES ('$kode_bom', '$id_produk', '$nama_bahan_baku', '$jenis_bahan_baku', '$stok_awal', '$stok_akhir')");
    if (!$query_insert) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=bahan_baku';</script>";
        exit;
    }
}

// Fungsi Ambil Data Bahan Baku
function getDataBahanBaku(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT * FROM t_bahan_baku INNER JOIN t_produk ON t_bahan_baku.id_produk=t_produk.id_produk INNER JOIN t_bom ON t_bahan_baku.kode_bom=t_bom.kode_bom");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($bahan_baku = mysqli_fetch_array($result)) {
        $array[] = $bahan_baku;
    }
    return $array;
}

// Fungsi Edit Bahan Baku
function editBahanBaku($bahan_baku_id, $kode_bom, $id_produk, $nama_bahan_baku, $jenis_bahan_baku, $stok_awal, $stok_akhir) {
    include "Database.php";
    // Menggunakan prepared statement untuk keamanan
    $query = mysqli_prepare($conn, "UPDATE t_bahan_baku SET kode_bom=?, id_produk=?, nama_bahan_baku=?, jenis_bahan_baku=?, stok_awal=?, stok_akhir=? WHERE id_bahan_baku=?");
    mysqli_stmt_bind_param($query, 'sisssii', $kode_bom, $id_produk, $nama_bahan_baku, $jenis_bahan_baku, $stok_awal, $stok_akhir, $bahan_baku_id);
    mysqli_stmt_execute($query);
    mysqli_stmt_close($query);
    mysqli_close($conn);
    echo "<script>window.location='$_SERVER[PHP_SELF]?u=bahan_baku';</script>";
    exit;
}

// Fungsi Hapus Bahan Baku
function hapusBahanBaku($bahan_baku_id){
    include "Database.php";
    $query = mysqli_query($conn, "DELETE FROM t_bahan_baku WHERE id_bahan_baku='$bahan_baku_id'");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=bahan_baku';</script>";
        exit;
    }
}

// Fungsi Hitung Jumlah Baris Bahan Baku
function countRowsBahanBaku(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM t_bahan_baku");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}

// ==============================================
//              Kontrol Database - Bahan Baku Masuk
// ============================================== 

// Fungsi Tambah Bahan Baku Masuk
function tambahBahanBakuMasuk($id_bahan_baku, $nama_supplier, $jumlah_bahan_masuk, $tanggal_bahan_masuk){
    include "Database.php";

    // Masukkan data ke database
    $query_insert = mysqli_query($conn, "INSERT INTO t_bahan_baku_masuk (id_bahan_baku, nama_supplier, jumlah_bahan_masuk, tanggal_bahan_masuk) VALUES ('$id_bahan_baku', '$nama_supplier', '$jumlah_bahan_masuk', '$tanggal_bahan_masuk')");
    if (!$query_insert) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=bahan_baku_masuk';</script>";
        exit;
    }
}

// Fungsi Ambil Data Bahan Baku Masuk
function getDataBahanBakuMasuk(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT * FROM t_bahan_baku_masuk");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($bahan_baku_masuk = mysqli_fetch_array($result)) {
        $array[] = $bahan_baku_masuk;
    }
    return $array;
}

// Fungsi Edit Bahan Baku Masuk
function editBahanBakuMasuk($bahan_baku_masuk_id, $id_bahan_baku, $nama_supplier, $jumlah_bahan_masuk, $tanggal_bahan_masuk) {
    include "Database.php";
    // Menggunakan prepared statement untuk keamanan
    $query = mysqli_prepare($conn, "UPDATE t_bahan_baku_masuk SET id_bahan_baku=?, nama_supplier=?, jumlah_bahan_masuk=?, tanggal_bahan_masuk=? WHERE no_bahan_masuk=?");
    mysqli_stmt_bind_param($query, 'isssi', $id_bahan_baku, $nama_supplier, $jumlah_bahan_masuk, $tanggal_bahan_masuk, $bahan_baku_masuk_id);
    mysqli_stmt_execute($query);
    mysqli_stmt_close($query);
    mysqli_close($conn);
    echo "<script>window.location='$_SERVER[PHP_SELF]?u=bahan_baku_masuk';</script>";
    exit;
}

// Fungsi Hapus Bahan Baku Masuk
function hapusBahanBakuMasuk($bahan_baku_masuk_id){
    include "Database.php";
    $query = mysqli_query($conn, "DELETE FROM t_bahan_baku_masuk WHERE no_bahan_masuk='$bahan_baku_masuk_id'");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=bahan_baku_masuk';</script>";
        exit;
    }
}

// Fungsi Hitung Jumlah Baris Bahan Baku Masuk
function countRowsBahanBakuMasuk(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM t_bahan_baku_masuk");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}


// ==============================================
//              Kontrol Database - Bill of Materials (BOM)
// ============================================== 

// Fungsi Tambah BOM
function tambahBOM($id_produk, $nama_komponen, $panjang, $tb, $jumlah, $satuan){
    include "Database.php";

    // Masukkan data ke database
    $query_insert = mysqli_query($conn, "INSERT INTO t_bom (id_produk, nama_komponen, panjang, tb, jumlah, satuan) VALUES ('$id_produk', '$nama_komponen', '$panjang', '$tb', '$jumlah', '$satuan')");
    if (!$query_insert) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=bom';</script>";
        exit;
    }
}

// Fungsi Ambil Data BOM
function getDataBOM(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT * FROM t_bom INNER JOIN t_produk ON t_bom.id_produk=t_produk.id_produk");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($bom = mysqli_fetch_array($result)) {
        $array[] = $bom;
    }
    return $array;
}

// Fungsi Edit BOM
function editBOM($bom_id, $id_produk, $nama_komponen, $panjang, $tb, $jumlah, $satuan) {
    include "Database.php";
    // Menggunakan prepared statement untuk keamanan
    $query = mysqli_prepare($conn, "UPDATE t_bom SET id_produk=?, nama_komponen=?, panjang=?, tb=?, jumlah=?, satuan=? WHERE kode_bom=?");
    mysqli_stmt_bind_param($query, 'isssisi', $id_produk, $nama_komponen, $panjang, $tb, $jumlah, $satuan, $bom_id);
    mysqli_stmt_execute($query);
    mysqli_stmt_close($query);
    mysqli_close($conn);
    echo "<script>window.location='$_SERVER[PHP_SELF]?u=bom';</script>";
    exit;
}

// Fungsi Hapus BOM
function hapusBOM($bom_id){
    include "Database.php";
    $query = mysqli_query($conn, "DELETE FROM t_bom WHERE kode_bom=$bom_id");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=bom';</script>";
        exit;
    }
}

// Fungsi Hitung Jumlah Baris BOM
function countRowsBOM(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM t_bom");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}


// ==============================================
//              Kontrol Database - Material Requirements Planning (MRP)
// ============================================== 

// Fungsi Tambah MRP
function tambahMRP($id_mps, $kode_bom, $gr, $ohi, $nr, $por){
    include "Database.php";

    // Masukkan data ke database
    $query_insert = mysqli_query($conn, "INSERT INTO t_mrp (id_mps, kode_bom, gr, ohi, nr, por) VALUES ('$id_mps', '$kode_bom', '$gr', '$ohi', '$nr', '$por')");
    if (!$query_insert) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=mrp';</script>";
        exit;
    }
}

// Fungsi Ambil Data MRP
function getDataMRP(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT * FROM t_mrp INNER JOIN t_bom ON t_mrp.kode_bom=t_bom.kode_bom INNER JOIN t_mps ON t_mrp.id_mps=t_mps.id_mps INNER JOIN t_produk ON t_bom.id_produk= t_produk.id_produk");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($mrp = mysqli_fetch_array($result)) {
        $array[] = $mrp;
    }
    return $array;
}

// Fungsi Edit MRP
function editMRP($mrp_id, $id_mps, $kode_bom, $gr, $ohi, $nr, $por) {
    include "Database.php";
    // Menggunakan prepared statement untuk keamanan
    $query = mysqli_prepare($conn, "UPDATE t_mrp SET id_mps=?, kode_bom=?, gr=?, ohi=?, nr=?, por=? WHERE id_mrp=?");
    mysqli_stmt_bind_param($query, 'iissssi', $id_mps, $kode_bom, $gr, $ohi, $nr, $por, $mrp_id);
    mysqli_stmt_execute($query);
    mysqli_stmt_close($query);
    mysqli_close($conn);
    echo "<script>window.location='$_SERVER[PHP_SELF]?u=mrp';</script>";
    exit;
}

// Fungsi Hapus MRP
function hapusMRP($mrp_id){
    include "Database.php";
    $query = mysqli_query($conn, "DELETE FROM t_mrp WHERE id_mrp='$mrp_id'");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=mrp';</script>";
        exit;
    }
}

// Fungsi Hitung Jumlah Baris MRP
function countRowsMRP(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM t_mrp");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}

// ==============================================
//              Kontrol Database - Master Production Schedule (MPS)
// ==============================================

// Fungsi Tambah MPS
function tambahMPS($id_produk, $order, $jadwal_export, $wk, $tanggal){
    include "Database.php";

    // Menggunakan prepared statement untuk keamanan
    $query = mysqli_prepare($conn, "INSERT INTO t_mps (id_produk, `order`, jadwal_export, wk, tanggal) VALUES (?, ?, ?, ?, ?)");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    }
    
    // Bind parameters
    mysqli_stmt_bind_param($query, 'issss', $id_produk, $order, $jadwal_export, $wk, $tanggal);
    
    // Execute the statement
    if (!mysqli_stmt_execute($query)) {
        die("Execute error: " . mysqli_stmt_error($query));
    } else {
        mysqli_stmt_close($query);
        mysqli_close($conn);
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=mps';</script>";
        exit;
    }
}


// Fungsi Ambil Data MPS
function getDataMPS(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT * FROM t_mps INNER JOIN t_produk ON t_mps.id_produk=t_produk.id_produk");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($mps = mysqli_fetch_array($result)) {
        $array[] = $mps;
    }
    return $array;
}

// Fungsi Edit MPS
function editMPS($mps_id, $id_produk, $order, $jadwal_export, $wk, $tanggal) {
    include "Database.php";
    // Menggunakan prepared statement untuk keamanan
    $query = mysqli_prepare($conn, "UPDATE t_mps SET id_produk=?, `order`=?, jadwal_export=?, wk=?, tanggal=? WHERE id_mps=?");
    mysqli_stmt_bind_param($query, 'issssi', $id_produk, $order, $jadwal_export, $wk, $tanggal, $mps_id);
    mysqli_stmt_execute($query);
    mysqli_stmt_close($query);
    mysqli_close($conn);
    echo "<script>window.location='$_SERVER[PHP_SELF]?u=mps';</script>";
    exit;
}

// Fungsi Hapus MPS
function hapusMPS($mps_id){
    include "Database.php";
    $query = mysqli_query($conn, "DELETE FROM t_mps WHERE id_mps='$mps_id'");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=mps';</script>";
        exit;
    }
}

// Fungsi Hitung Jumlah Baris MPS
function countRowsMPS(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM t_mps");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}




?>
