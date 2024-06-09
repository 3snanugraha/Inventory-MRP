<?php
// Semua Alur diatur disini
include "Function.php";

// ======================
// GET Method Routing
// ======================
if(isset($_GET['u'])){
    if($_GET['u']=='login'){
        LoginSessionCheck();
        include "../view/login.php";
    } else if($_GET['u']=='home'){
        SessionCheck();
        include "../view/home.php";
    } else if($_GET['u']=='customers'){
        SessionCheck();
        include "../view/customers.php";
    } else if($_GET['u']=='logout'){
        Logout();
    } else {
        echo "<h1 class='text-center'>Maaf fitur belum ada / sedang dimaintenance.</h1>";
    }
}else{
    LoginSessionCheck();
    include "../view/login.php";
}
// ======================
// POST Method untuk Form
// ======================
if(isset($_POST['login-admin'])){
    include "Database.php";
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    LoginAdmin($username, $password);
}

if (isset($_POST['tambah-customer'])) {
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $customer_address = mysqli_real_escape_string($conn, $_POST['customer_address']);
    $customer_phone = mysqli_real_escape_string($conn, $_POST['customer_phone']);
    tambahCustomer($customer_name, $customer_address, $customer_phone);
}
?>