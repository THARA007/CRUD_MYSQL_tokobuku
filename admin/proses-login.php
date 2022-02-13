<?php
//Mengaktifkan sesi
session_start();

//Menghubungkan ke database
include ("../database/config.php");

//Mengambil data inputan
$username = $_POST['username'];
$password = $_POST['password'];

//query untuk cek data yang sesuai
$data = mysqli_query($host, "SELECT * FROM login WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($data);

if ($cek == $data){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = login;
    header("location:admin.php");
} else{
    header("location:login.php?pesan=gagal");
}
?>