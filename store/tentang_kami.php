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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | Sandalland</title>
    <link rel="stylesheet" href="./../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
    </div>

    <!--main-->
    <div class="container-fluid py-5">
        <div class="container fs-5">
            <h1 class="text-center">TENTANG KAMI</h1>
            <h2 class="text-center">SANDALLAND</h2>
            <p>
            Halo sahabat yang luar biasa, pada kesempatan kali ini izinkan kami dari Sandalland untuk memperkenalkan diri. 
            Mudah-mudahan dengan adanya perkenalan ini sahabat-sahabat sekalian akan lebih senang berbelanja di toko online ini.
            Sungguh terhormat bagi kami, jika Anda datang ke toko ini dan bisa memperoleh banyak hal yang bermanfaat.

            </p>
            <p>
                Sandalland adalah sebuah toko yang menyediakan Sandal & Sepatu. 
                Bermula dari sebuah bangunan yang berlokasi di Jalan Urip Sumoharjo RT03/RW01 Beru-Wlingi, 
                toko kami akhirnya bisa menjangkau pasar yang lebih luas lagi melalui internet.Seiring dengan semakin 
                teknologi, maka kami mencoba berinovasi dalam berbisnis. Salah satu bentuk inovasinya adalah dengan 
                menyediakan berbagai layanan toko kami melalui media internet, dan toko online ini adalah salah satu bentuk 
                pelayanan kami kepada Anda.
            </p>
            <p>
                Keberadaan dari toko online ini diharapkan dapat mempermudah Anda untuk mendapatkan berbagai produk 
                berkualitas tinggi namun dengan harga yang terjangkau.Dalam memberi layanan, kami selalu mencoba memberi 
                persembahan terbaik kepada siapapun. Selain itu kami juga selalu menjunjung tinggi nilai-nilai etika yang 
                baik, seperti kejujuran, ketepatan, dan profesionalitas dalam berbisnis. 
                Mudah-mudahan dengannya toko online kami bisa memberi banyak manfaat bagi Anda.
            </p>
            <p>
                Sekian dulu perkenalan ini. Semoga perkenalan ini bisa memberi inspirasi dan manfaat bagi Anda. 
            </p>
        </div>
    </div>

    <?php require "./../footer.php"; ?>

    <script src="./../fontawesome/js/all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>