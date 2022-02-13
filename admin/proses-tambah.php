<?php
//Memanggil file config.php
include ("../database/config.php");

//Mengecek apakah tombol SUBMIT telah di klik
if (isset($_POST['simpan'])){
    //Mengambil data dari isian form
    $ID_buku = $_POST['ID_buku'];
    $kategori = $_POST['kategori'];
    $nama_buku = $_POST['nama_buku'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $penerbit = $_POST['penerbit'];

    //membuat query agar data yang diinput bertambah ke database mysql
    $sql = "INSERT INTO buku (ID_buku, kategori, nama_buku, harga, stok, penerbit) VALUE ('$ID_buku', '$kategori', '$nama_buku', '$harga', '$stok', '$penerbit' )";
    $query = mysqli_query($host, $sql);

    //Apakah query berhasil disimpan
    if ($query) {
        //kalau berhasil langsung dialihkan ke halaman adminphp dgn status sukses
        header('location:admin.php?status=sukses');
    } else {
        //kalau gagal, tetap dialihkan ke halaman admin php dengan status gagal
        header('location:admin.php?status=gagal');
    }

} else {
    die("Akses Dilarang...");
}

?>