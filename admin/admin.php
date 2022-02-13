<?php include("../database/config.php");?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>UNIBOOK STORE</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
    <!--Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--Memulai Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: darkorange">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Login Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout Admin</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" name="cari" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php
    if (isset($_GET['status'])):
            if ($_GET['status'] == 'sukses'){
                echo "<script>window.alert('Buku berhasil ditambahkan ke database')</script>";
            } else {
                echo "<script>window.alert('Buku gagal ditambah ke database. Silahkan Input Ulang!!')</script>";
            }
            endif;
            ?>
    <!--Akhir Navbar-->
    <header>
        <h2><marquee>Selamat Datang Di Toko Buku Unik</marquee></h2>
    </header>
    <!--Memulai Tabel-->
    <div class="tab1">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">ID Buku</th>
            <th scope="col">Kategori</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Harga</th>
            <th scope="col">Stok</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Aksi</th>
        </tr>
        <?php
        if (isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $sql = "SELECT * FROM buku WHERE nama_buku like '%".$cari."%'";
            $data = mysqli_query($host, $sql);
        } else {
            $sql1 = "SELECT * FROM buku";
            $data = mysqli_query($host, $sql1);
        }
        $nomor = 1;
        while ($buku1 = mysqli_fetch_array($data)){
        ?>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $buku1['ID_buku']; ?></td>
            <td><?php echo $buku1['kategori']; ?></td>
            <td><?php echo $buku1['nama_buku']; ?></td>
            <td><?php echo $buku1['harga']; ?></td>
            <td><?php echo $buku1['stok']; ?></td>
            <td><?php echo $buku1['penerbit']; ?></td>
            <td>
                <a class="edit" href="edit.php?id=<?php echo $buku1['id']; ?>">Edit</a> |
                <a class="hapus" href="delete.php?id=<?php echo $buku1['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
        </tr>

        </tbody>
    </table>
        <a href="add.php" class="btn btn-primary">Tambah Data</a>
    </div>
<!--Memulai Tabel ke 2-->
    <div class="tab2">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">ID Penerbit</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Kota</th>
                <th scope="col">Telepon</th>
                <th scope="col">Aksi</th>
            </tr>
            <?php
            $sql = "SELECT * FROM penerbit";
            $query = mysqli_query($host, $sql);
            $nomor = 1;
            while ($penerbit1 = mysqli_fetch_array($query)){
            ?>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $penerbit1['ID_penerbit']; ?></td>
                <td><?php echo $penerbit1['nama']; ?></td>
                <td><?php echo $penerbit1['alamat']; ?></td>
                <td><?php echo $penerbit1['kota']; ?></td>
                <td><?php echo $buku1['telepon']; ?></td>
                <td>
                    <a class="edit" href="edit.php?id=<?php echo $penerbit1['id']; ?>">Edit</a> |
                    <a class="hapus" href="hapus.php?id=<?php echo $penerbit1['id']; ?>">Hapus</a>
                </td>
            </tr>
            <?php } ?>
            </tr>

            </tbody>
        </table>

    </div>
    </body>
    </html>