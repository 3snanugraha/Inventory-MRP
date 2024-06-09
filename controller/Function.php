<?php
// File ini berisi fungsi-fungsi dasar
// Error Reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ==============================================
//              Kontrol Database
// ============================================== 
// Fungsi Login
// ==============================================
// Fungsi Login Admin
function LoginAdmin($username, $password) {
    include "Database.php";
    session_start();
    $enc_password = md5($password);  // Menggunakan md5 untuk hashing password
    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$enc_password'");
    $fetchdata = mysqli_fetch_array($query);
    if (!empty($fetchdata['username'])) {
        $_SESSION['admin_id'] = $fetchdata['admin_id'];  // Menggunakan nama kolom dari tabel SQL yang telah kita buat
        $_SESSION['username'] = $fetchdata['username'];
        $_SESSION['name'] = $fetchdata['name'];
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=home';</script>";
        exit;
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=login&error=1';</script>";
        exit;
    }
}

// Fungsi Ubah Akun Admin
function ubahAkunAdmin($admin_id, $old_password, $username, $password){
    include "Database.php";
    
    // Verifikasi password lama
    $query = mysqli_query($conn, "SELECT password FROM admin WHERE admin_id='$admin_id'");
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
        $query_update = mysqli_query($conn, "UPDATE admin SET username='$username', password='$hashed_password' WHERE admin_id='$admin_id'");
        
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
    if(!empty($_SESSION['username']) AND !empty($_SESSION['name'])){
        echo "<script>alert('Anda sudah login');window.location='$_SERVER[PHP_SELF]?u=home';</script>";
        exit;
    }
}

// Fungsi Periksa Session
function SessionCheck(){
    session_start();
    if(empty($_SESSION['username']) AND empty($_SESSION['role'])){
        echo "<script>alert('Session telah habis. silahkan login kembali.');
        window.location='$_SERVER[PHP_SELF]?u=login'</script>";
        exit;
    }
}

// Logout
function Logout(){
    session_start();
    session_destroy();
    echo "<script>alert('Logout berhasil');window.location='$_SERVER[PHP_SELF]?u=login';</script>";
    exit;
}


// =========================
// Customer Function
// =========================

// Fungsi Tambah Customer
function tambahCustomer($customer_name, $customer_address, $customer_phone){
    include "Database.php";

    // Masukkan data ke database
    $created_at = date('Y-m-d H:i:s');
    $query_insert = mysqli_query($conn, "INSERT INTO customer (customer_name, customer_address, customer_phone, created_at) VALUES ('$customer_name', '$customer_address', '$customer_phone', '$created_at')");
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
    $result = mysqli_query($conn, "SELECT * FROM customer");
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
function editCustomer($conn, $customer_id, $customer_name, $customer_address, $customer_phone) {
    $query = mysqli_prepare($conn, "UPDATE customer SET customer_name=?, customer_address=?, customer_phone=? WHERE customer_id=?");
    mysqli_stmt_bind_param($query, 'sssi', $customer_name, $customer_address, $customer_phone, $customer_id);
    mysqli_stmt_execute($query);
    mysqli_stmt_close($query);
    mysqli_close($conn);
    echo "<script>window.location='$_SERVER[PHP_SELF]?u=data-customer';</script>";
    exit;
}

// Fungsi Hapus Customer
function hapusCustomer($customer_id){
    include "Database.php";
    $query = mysqli_query($conn, "DELETE FROM customer WHERE customer_id='$customer_id'");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=data-customer';</script>";
        exit;
    }
}

// Fungsi Hitung Jumlah Baris Customer
function countRowsCustomer(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM customer");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}


?>
