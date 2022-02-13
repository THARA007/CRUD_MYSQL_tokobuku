<?php
include ("../database/config.php");

//Mengecek apakah tombol submit sudah diklk apa belum
if (isset($_POST['simpan'])){
    //Mengambil data inputan dari formulir
    $id = $_POST['id'];
    $ID_buku = $_POST['ID_buku'];
    $kategori = $_POST['kategori'];
    $nama_buku = $_POST['nama_buku'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $penerbit = $_POST['penerbit'];

    //Query untuk update data di database
    $sql = "UPDATE buku SET ID_buku='$ID_buku', kategori='$kategori', nama_buku='$nama_buku', harga='$harga', stok='$stok', penerbit='$penerbit' WHERE id=$id";
    $query = mysqli_query($host, $sql);

    //cek apakah query berhasil dieksekusi
    if ($query) {
        header('location:admin.php');
    } else {
        die("Gagal menyimpan update data..");
    }

} else {
    die("Akses Update dilarang");
}
?>