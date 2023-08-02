<h2>Ubah Produk</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM produk WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama']; ?>">
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga']; ?>">
    </div>
    <div class="form-group">
        <img src="../assets/img/produk/<?php echo $pecah['foto']; ?>" width="200">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control" value="<?php echo $pecah['nama']; ?>">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="10">
            <?php echo $pecah['deskripsi_produk']; ?>
        </textarea>
    </div>
    <div class="form-group">
        <label>Stok Produk</label>
        <input type="text" name="stok" class="form-control" value="<?php echo $pecah['stok_produk']; ?>">
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah'])) {
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "../assets/img/produk/$namafoto");
        $koneksi->query("UPDATE produk SET nama='$_POST[nama]', harga='$_POST[harga]', foto='$namafoto', deskripsi_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]' WHERE id='$_GET[id]'");
    } else {
        $koneksi->query("UPDATE produk SET nama='$_POST[nama]', harga='$_POST[harga]', deskripsi_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]' WHERE id='$_GET[id]'");
    }
    echo "<script>alert('Data produk telah diubah');</script>";
    echo "<script>location='index.php?halaman=produk'</script>";
}
?>