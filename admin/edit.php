<?php

include("../database/config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: admin.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM buku WHERE id=$id";
$query = mysqli_query($host, $sql);
$buks = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Unibook Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<header>
    <h3>Formulir Edit Data Buku</h3>
</header>

<form action="proses-edit.php" method="POST">
    <div class="card-header w-25 ">
        <input type="hidden" name="id" value="<?php echo $buks['id'] ?>" />
        <div class="mb-3">
            <label for="" class="form-label">ID Buku</label>
            <input onkeypress="return /[0-9 & a-z]/i.test(event.key)" maxlength="5" class="form-control" value="<?php echo $buks['ID_buku'] ?>" name="ID_buku" required="required">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Kategori</label>
            <input onkeypress="return /[a-z]/i.test(event.key)" maxlength="15" class="form-control" value="<?php echo $buks['kategori'] ?>" name="kategori" required="required">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nama Buku</label>
            <input type="text" maxlength="40" class="form-control" value="<?php echo $buks['nama_buku'] ?>" name="nama_buku" required="required">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Harga</label>
            <input onkeypress="return /[0-9]/i.test(event.key)" maxlength="8" class="form-control" value="<?php echo $buks['harga'] ?>" name="harga" required="required">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Stok</label>
            <input onkeypress="return /[0-9]/i.test(event.key)" maxlength="3" class="form-control" value="<?php echo $buks['stok'] ?>" name="stok" required="required">
        </div>
        <select class="form-select" aria-label="Default select example" name="penerbit">
            <?php $penerbit = $buks['penerbit'];?>
            <option selected="selected">Pilih Nama Penerbit</option>
            <option <?php echo ($penerbit == 'Penerbit Informatika') ? "selected": "" ?>>Penerbit Informatika</option>
            <option <?php echo ($penerbit == 'Andi Offset') ? "selected": "" ?>>Andi Offset</option>
            <option <?php echo ($penerbit == 'Danendra') ? "selected": "" ?>>Danendra</option>
            <?php

            $sql = "SELECT * FROM penerbit";
            $sql2 = mysqli_query($host, $sql);
            while ($data = mysqli_fetch_array($sql2)){
                ?>
                <option value="<?php echo $data['nama'];?>"><?php echo $data['nama'];?></option>
            <?php } ?>
        </select>
        <div>
            <button type="submit" name="simpan" onclick="return confirm('apakah data sudah benar?')" class="btn btn-success">Simpan</button>
            <a href="../index.php">Back</a>
        </div>


</form>

</body>
</html>