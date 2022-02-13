<?php include("../database/config.php");?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tambah Data Staff Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<h1 style="text-align: center">Formulir Tambah Data Buku</h1>
<form action="proses-tambah.php" method="POST">
    <div class="card-header w-25 ">
        <div class="mb-3">
            <label for="" class="form-label">ID Buku</label>
            <input onkeypress="return /[0-9 & a-z]/i.test(event.key)" maxlength="5" class="form-control" name="ID_buku" required="required">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Kategori</label>
            <input onkeypress="return /[a-z]/i.test(event.key)" maxlength="15" class="form-control" name="kategori" required="required">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nama Buku</label>
            <input type="text" maxlength="40" class="form-control" name="nama_buku" required="required">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Harga</label>
            <input onkeypress="return /[0-9]/i.test(event.key)" maxlength="8" class="form-control" name="harga" required="required">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Stok</label>
            <input onkeypress="return /[0-9]/i.test(event.key)" maxlength="3" class="form-control" name="stok" required="required">
        </div>
        <select class="form-select" aria-label="Default select example" id="inputGender" name="penerbit">
            <option selected="selected">Pilih Nama Penerbit</option>
            <?php

            $sql = "SELECT * FROM penerbit";
            $sql2 = mysqli_query($host, $sql);
            while ($data = mysqli_fetch_array($sql2)){
            ?>
            <option value="<?php echo $data['nama'];?>"><?php echo $data['nama'];?></option>
            <?php } ?>
        </select>
        <div>
            <button type="submit" name="simpan" onclick="return confirm('apakah data sudah benar?')" class="btn btn-success mt-3">Simpan</button>
            <a href="/index.php" class="btn btn-warning mt-3">Back</a>
        </div>
</form>

<?php

?>

</body>

</html>