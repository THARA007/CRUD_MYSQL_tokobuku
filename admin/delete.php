<?php
include ("../database/config.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM buku WHERE id=$id";
    $query = mysqli_query($host, $sql);

    if( $query ){
        header('Location: admin.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}
?>