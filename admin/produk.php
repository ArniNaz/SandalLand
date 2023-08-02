<h2>Data Produk</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Deskripsi</th>
            <th>Stok Produk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT *  FROM produk"); ?>
        <?php while($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama']; ?></td>
            <td><?php echo $pecah['harga']; ?></td>
            <td>
                <img src="../assets/img/produk/<td><?php echo $pecah['foto']; ?>" width="100">
            </td>
            <td><?php echo $pecah['deskripsi_produk']; ?></td>
            <td><?php echo $pecah['stok_produk']; ?></td>
            <td>
                <a href="index.php?halaman=hapus_produk&id=<?php echo $pecah['id']; ?>" class="btn btn-danger">Hapus</a>
                <a href="index.php?halaman=ubah_produk&id=<?php echo $pecah['id']; ?>" class="btn btn-warning">Ubah</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a>