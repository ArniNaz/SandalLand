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

// TODO produk

    $queryKategori = mysqli_query($connect, "SELECT * FROM kategori");

    //get produk by nama produk/keyword
    // if(isset($_GET['keyword'])){
    //     $queryProduk = mysqli_query($connect, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
    // }

    //get produk by kategori
   if(isset($_GET['kategori'])){
        // $queryKategoriId = mysqli_query($connect, "SELECT `id` FROM kategori WHERE id=$_GET[kategori]");
        // $kategoriId = mysqli_fetch_array($queryKategoriId);
        $kategoriId = $_GET['kategori'];

        $queryProduk = mysqli_query($connect, "SELECT * FROM produk WHERE kategori_id='$kategoriId'");
    }

    //get produk default
    else {
        $queryProduk = mysqli_query($connect, "SELECT * FROM produk");
    };

    // TODO get Product
    // $sql_get_product = "SELECT * FROM produk";
    // $query_get_product = mysqli_query($connect, $sql_get_product);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Produk | Sandalland</title>
    <style>
    .banner-produk {
        height: 10vh;
        background-position: 40% 20%;
    }

    .no-decoration {
        text-decoration: none;
        color: white;
    }

    .text-harga {
        color: red;
    }
    </style>
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

    <img src="../image/banner5.jpg" class="d-block w-100">
    <div class="container-fluid banner-produk">
        <div class="container">

        </div>

    </div>

    <!-- body-list kategori-->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h3 class=" ">Kategori</h3>
                <ul class="list-group">
                    <a href="./produk.php" class="no-decoration">
                        <li class="list-group-item">Semua Kategori</li>
                    </a>
                    <?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
                    <a class="no-decoration" href="produk.php?kategori=<?php echo $kategori['id']; ?>">
                        <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
                    </a>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-9">
                <h1 class="text-center mb-3">Produk</h1>
                <div class="row">
                    <?php while($get_product = mysqli_fetch_assoc($queryProduk)) :?>
                    <div class="col col-md-4 mb-4 col-sm-4 product-card">
                        <div class="card h-100">
                            <div class="image-box">
                                <img src="../image/<?=$get_product['foto']?>" class="card-img-top w-100"
                                    alt="<?=$get_product['foto']?>">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?=$get_product['nama']?></h5>
                                <p class="card-text"><?=$get_product['deskripsi_produk']?></p>
                                <p class="card-text text-harga">Rp. <?=number_format($get_product['harga'])?></p>
                                <a href="./produk-detail.php?id=<?=$get_product['id']?>" class="btn btn-primary">Tambah
                                    ke Keranjang</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>

        <?php require "./../footer.php"; ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
        </script>
</body>

</html>