<h2>Data Pesanan</h2>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>ID User</th>
            <th>ID Produk</th>
            <th>Alamat User</th>
            <th>Tanggal Pesanan</th>
            <th>Jumlah Barang</th>
            <th>Total Harga</th>
            <th>Ukuran</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pesanan"); ?>
        <?php while($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['id_user']; ?></td>
            <td><?php echo $pecah['id_produk']; ?></td>
            <td><?php echo $pecah['alamat_user']; ?></td>
            <td><?php echo $pecah['tanggal_pesan']; ?></td>
            <td><?php echo $pecah['jumlah_barang']; ?></td>
            <td><?php echo $pecah['total_harga']; ?></td>
            <td><?php echo $pecah['ukuran']; ?></td>
            <td><?php echo $pecah['status']; ?></td>
            <td>
                <a href="index.php?halaman=edit&id=<?php echo $pecah['id']; ?>" class="btn btn-warning">Edit</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>