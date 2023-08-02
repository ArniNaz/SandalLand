<?php
$ambil = $koneksi->query("SELECT * FROM produk WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto = $pecah['foto'];
if (file_exists("../assets/img/produk/$foto")) {
    unlink("../assets/img/produk/$foto");
}

$koneksi->query("DELETE FROM produk WHERE id='$_GET[id]'");

echo "<script>alert('produk terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>"
?>