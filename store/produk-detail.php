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
    


    // TODO detail_product
    $id = htmlspecialchars($_GET['id']);
    $queryProduk = mysqli_query($connect, "SELECT * FROM produk WHERE id='$id'");
    $produk = mysqli_fetch_array($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk | Sandalland</title>
    <link rel="stylesheet" href="./../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    .produk-terkait-image {
        height: 100%;
        width: 100%;
        object-fit: cover;
        object-position: center;
    }
    </style>
    <!-- sweat alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script>
    // ES6 Modules or TypeScript
    import Swal from 'sweetalert2'

    // CommonJS
    const Swal = require('sweetalert2')
    </script>
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

    

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mb-3">
                    <img src="./../image/<?= $produk['foto']; ?>" class="w-100" alt="">
                </div>
                <div class="col-md-6 offset-md-1">
                    <h1>
                        <?php echo $produk['nama']; ?>
                    </h1>
                    <p class="fs-5">
                        <?php echo $produk['deskripsi_produk']; ?>
                    </p>
                    <p class="text-harga">
                        Rp
                        <?php echo number_format($produk['harga']); ?>
                    </p>
                    <p class="fs-5">Status Ketersediaan: <strong>
                            <?php echo $produk['stok_produk']; ?>
                        </strong>
                    </p>
                    <!-- 
                    <form action=""> -->
                    <input type="hidden" name="id_produk">
                    <input type="hidden" name="id_user">
                    <input type="hidden" name="alamat_user">
                    <input type="hidden" name="tanggal_pesan">
                    <div class="row mb-3">
                        <form method="post" class="row">
                            <input type="hidden" name="harga_barang_satuan" value="<?= $produk['harga'] ?>">
                            <div class="col col-8">
                                <div class="row">
                                    <div class="col-12 d-flex">
                                        <span class="input-group-text" id="jumlah_barang">Jumlah Barang</span>
                                        <input type="number" class="form-control" aria-describedby="jumlah_barang"
                                            id="jumlah_barang" name="jumlah_barang">
                                    </div>
                                </div>
                            </div>
                            <div class="col col-2">
                                <input type="submit" class="btn btn-primary" for="jumlah_barang" class="form-label"
                                    name="update_harga" value="update harga">
                            </div>
                        </form>
                    </div>
                    <div class="input-group mb-3">
                        <?php
                        // nilai awal dari produk
                        $total_harga_dipesan = $produk['harga'];
                        
                        if (isset($_POST['update_harga'])) {
                            // TODO hitung jumlah barang
                            $jumlah_barang = $_POST['jumlah_barang'];
                            $before_harga_barang = $_POST['harga_barang_satuan'];
                            
                            // TODO hitung harga total
                            $total_harga_barang = $jumlah_barang * $before_harga_barang;
                            $_POST['jumlah_barang'] = $jumlah_barang;
                            
                            // memasukkan data ke session
                            $_SESSION['total_harga_barang_dipesan'] = $total_harga_barang;
                            $total_harga_dipesan = $_SESSION['total_harga_barang_dipesan'];
                        } else{
                             // TODO hitung jumlah barang
                            $jumlah_barang = 1;
                            $before_harga_barang = $produk['harga'];
                            
                            // TODO hitung harga total
                            $total_harga_barang = $jumlah_barang * $before_harga_barang;
                            $_POST['jumlah_barang'] = $jumlah_barang;
                            
                            // memasukkan data ke session
                            $_SESSION['total_harga_barang_dipesan'] = $total_harga_barang;
                            $total_harga_dipesan = $_SESSION['total_harga_barang_dipesan'];
                        }
                        ?>

                        <!-- TODO Show Data Final -->
                        <span class="input-group-text" id="basic-addon1">Total Barang</span>
                        <input type="number" class="form-control" aria-describedby="basic-addon1" value="<?php if (isset($_POST['jumlah_barang'])) {
                            echo $jumlah_barang;
                            $_SESSION['jumlah_barang'] = $jumlah_barang;
                        } else {
                            echo '1';
                        }
                        ; ?>" disabled id="jumlah_barang">
                        <br>
                        <span class="input-group-text" id="basic-addon2">Total harga</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon2"
                            value="<?= number_format($total_harga_dipesan) ?>" disabled id="total_harga">
                    </div>
                    <form method="post">
                        <div class="row">
                            <div class="col-12 d-flex mb-2">
                                <span class="input-group-text" id="ukuran">Ukuran</span>
                                <input type="number" class="form-control" aria-describedby="ukuran" id="ukuran"
                                    name="ukuran" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-success" name="checkout">Checkout</button>
                            </div>
                        </div>
                    </form>
                    <!-- masuk ke database -->
                    <?php
                    // TODO Load Data produk yang akan dicheckout
                    if (isset($_POST['checkout'])) {
                        $nama_pembeli = $data_user_login['nama'];
                        $alamat_pembeli = $data_user_login['alamat'];
                        $id_pembeli = $id_user_login;
                        $id_barang = $produk['id'];
                        $jumlah_barang_dipesan = $_SESSION['jumlah_barang'];
                        $waktu_data_disimpan_timestamp = time();
                        $ukuran = $_POST['ukuran'];

                        $waktu_pesan = date('Y-m-d H:i:s', $waktu_data_disimpan_timestamp);
                        $total_harga_dipesan = $_SESSION['total_harga_barang_dipesan'];

                        // TODO masukkan ke database
                    
                        // sql
                        $sql_data_pesanan = "INSERT INTO `sandalland`.`pesanan` (`id`, `id_user`, `id_produk`, `alamat_user`, `tanggal_pesan`, `jumlah_barang`, `total_harga`, `status`, `ukuran`) VALUES (NULL, $id_user_login, $id_barang, '$alamat_pembeli', '$waktu_pesan', '$jumlah_barang_dipesan', '$total_harga_dipesan', 'diproses', '$ukuran')";
                        // sql query
                        $query_data_pesanan = mysqli_query($connect, $sql_data_pesanan);
                        // insert data
                        if (mysqli_affected_rows($connect) == 0) {
                            echo "<script>alert('gagal checkout')</script>";
                        } else {
                              // ambil data terbaru
                $sql_pesan = "SELECT *  FROM pesanan INNER JOIN produk ON produk.id = pesanan.id_produk ORDER BY tanggal_pesan DESC LIMIT 1";
                $sql_pesan_query = mysqli_query($connect, $sql_pesan);
                $data_pesanan = mysqli_fetch_array($sql_pesan_query);
                $id_transaksi = $data_pesanan['id'];
                $id_user = $data_pesanan['id_user'];
                $nama_user = $_SESSION['nama'];
                $id_produk = $data_pesanan['id_produk'];
                $alamat_user = $data_pesanan['alamat_user'];
                $jumlah_barang_pesan = $data_pesanan['jumlah_barang'];
                $jumlah_harga_pesan = $data_pesanan['total_harga'];
                $ukuran = $data_pesanan['ukuran'];
                $nama_produk = $data_pesanan['nama'];
                            echo "<script>
                            Swal.fire({
    title: 'Pesanan telah di Checkout',
    text: 'Data telah masuk ke database, lanjutkan proses transaksi dengan mengirimkan pesan ke Whatsapp admin',
    icon: 'success',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Continue',
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href='./checkout.php';
    }
})
                            </script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!--footer-->
    <?php require "./../footer.php"; ?>
    <script src="./../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./../fontawesome/js/all.min.js"></script>
</body>

</html>