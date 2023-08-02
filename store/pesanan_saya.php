<?php
require "../koneksi.php";

// TODO cek login
if ($_SESSION['login'] != true) {
    header("Location: ./masuk.php");
}

$id_user_login = $_SESSION['id'];
$sql_user_login = "SELECT * FROM login WHERE `id` = $id_user_login";
$query_user_login = mysqli_query($connect, $sql_user_login);
$data_user_login = mysqli_fetch_assoc($query_user_login);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya | Sandalland</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <script type="text/javascript" src="./../assets/jquery/jquery.min.js"></script>

    <link rel="stylesheet" href="./../assets/datatables/datatables.css">
    <link rel="stylesheet" href="./../assets/datatables/datatables.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="d-flex justify-content-between w-100">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./tentang_kami.php">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./produk.php">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesanan_saya.php">Pesanan Saya</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item me-2">
                            <p class="fw-bold"><?=$data_user_login['nama']?></p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    
    <!-- banner -->
    <img src="./../image/banner5.jpg" class="d-block w-100">
    <div class="container-fluid banner2 d-flex align-items-center">
        <div class="container text-center">
            <div class="header">
                <h1 class="text-center">PESANAN SAYA</h1>
                <h6>Kak
                    <?= $data_user_login['username'] ?>
                </h6>
            </div>
            <div class="d-flex justify-content-center flex-column" <br>
                <h3 class="text-center">Daftar Pesanan</h3>
                <?php
                $sql = "SELECT * FROM pesanan INNER JOIN  produk ON produk.id = pesanan.id_produk WHERE id_user = $id_user_login";
                $resultPesanan = mysqli_query($connect, $sql);

                ?>
                <div class="table-responsive">
                    <table class="display table table-striped table-hover" id="myTable">
                        <thead>
                            <tr style="background-color: pink;">
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Alamat User</th>
                                <th class="text-center">Tanggal Pesan</th>
                                <th class="text-center">Jumlah Barang</th>
                                <th class="text-center">Ukuran</th>
                                <th class="text-center">Total Harga</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($resultPesanan)): ?>
                            <tr class="text-center align-middle">
                                <td>
                                    <?= $row['nama'] ?>
                                </td>
                                <td>
                                    <?= $row['alamat_user'] ?>
                                </td>
                                <td>
                                    <?= $row['tanggal_pesan'] ?>
                                </td>
                                <td>
                                    <?= $row['jumlah_barang'] ?>
                                </td>
                                <td>
                                    <?= $row['ukuran'] ?>
                                </td>
                                <td>
                                    <?= $row['total_harga'] ?>
                                </td>
                                <td>
                                    <?= $row['status'] ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--footer-->
    <br>
    <?php require "./../footer.php"; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

    <!-- datatables -->
    <script src="./../assets/datatables/datatables.js"></script>
    <script src="./../assets/datatables/datatables.min.js"></script>
    <script src="./../assets/datatables/Responsive/js/responsive.bootstrap5.js"></script>

    <!-- jquery -->
    <script src="./../assets/jquery/jquery.js"></script>
    <script src="./../assets/jquery/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    let table = new DataTable('#myTable', {
        // options
    });
    </script>
</body>

</html>