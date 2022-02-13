<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN ADMIN</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<!--Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<h3>Silahkan Login Terlebih Dahulu</h3>
<!--Cek pesan Login berhasil/tidak-->
<?php
if (isset($_GET['pesan'])){
    if ($_GET['pesan']== "gagal"){
        echo "<script>window.alert('Login gagal. Silahkan coba kembali!!')</script>";
    } elseif ($_GET['pesan']== "logout"){
        echo "<script>window.alert('Anda Telah Berhasil Logout')</script>";
    } elseif ($_GET['pesan']== "not_login"){
        echo "<script>window.alert('Anda Harus Login Kembali agar bisa Akses halaman Admin')</script>";
    }
}
?>
<form method="post" action="proses-login.php">
    <div class="card-header w-25 ">
        <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" maxlength="10" class="form-control" name="username" required="required">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="text" maxlength="10" class="form-control" name="password" required="required">
        </div>
        <div>
            <button type="submit" class="btn btn-success mt-3">Login</button>
        </div>
    </div>

</form>
</body>
</html>