<?php
//Mengisi nama host serta mysqlnya
$host = mysqli_connect("localhost", "root", "","unibookstore");

if(!$host){
    die("Gagal terhubung ke dbase: ". mysqli_connect_error());
}


?>