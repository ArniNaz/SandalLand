<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Sandalland</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="./../css/style.css">

    <!-- Sweetalert -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    <script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    </script>
</head>

<body>
<?php
    require "../koneksi.php";
    $id_user_login = $_SESSION['id'];
    $nama_user_login = $_SESSION['nama'];
    // TODO cek login
    if ($_SESSION['login'] != true) {
        header("Location: ./masuk.php");
    } else {
    //     echo "<script>
    // Toast.fire({
    // icon: 'success',
    // title: 'Login Berhasil'
    // });
    // </script>";
    }
    $id_user_login = $_SESSION['id'];
    $sql_user_login = "SELECT * FROM login WHERE `id` = $id_user_login";
    $query_user_login = mysqli_query($connect, $sql_user_login);
    $data_user_login = mysqli_fetch_assoc($query_user_login);
    ?>
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
            <h2>Selamat Datang,
                <?= $data_user_login['username'] ?> Di Sandalland!
            </h2>
        </div>
    </div>
    <!--main-->
    <div class="container-fluid py-5">
        <div class="container fs-5 text-center">
            <p>
                Hai, selamat datang dan selamat berbelanja. Disini kami menyediakan Sandal dan Sepatu untuk Pria dan
                Wanita.
                Barang yang kami jual pastinya yang berkualitas tinggi dan harga yang sangat terjangkau. Kami menjual
                barang yang lagi Trend,
                Keren, Kekinian. Hubungi No WhatsApp berikut ini (+6285654321890).
            </p>
        </div>
    </div>
    <?php require "./../footer.php"; ?>

    <script src="./../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./../fontawesome/js/all.min.js"></script>
</body>

</html>