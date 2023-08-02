<?php 
require_once "./../koneksi.php";
                // ambil data terbaru
                $sql_pesan = "SELECT pesanan.id AS id_transaksi, pesanan.alamat_user, .pesanan.id_produk, pesanan.jumlah_barang, pesanan.id_user, pesanan.`status`, pesanan.tanggal_pesan, pesanan.total_harga, pesanan.ukuran, produk.id, produk.nama, produk.stok_produk, produk.kategori_id FROM pesanan INNER JOIN produk ON produk.id = pesanan.id_produk ORDER BY tanggal_pesan DESC LIMIT 1";
                $sql_pesan_query = mysqli_query($connect, $sql_pesan);
                $data_pesanan = mysqli_fetch_array($sql_pesan_query);
                $id_transaksi = $data_pesanan['id_transaksi'];
                $id_user = $data_pesanan['id_user'];
                $nama_user = $_SESSION['nama'];
                $id_produk = $data_pesanan['id_produk'];
                $alamat_user = $data_pesanan['alamat_user'];
                $jumlah_barang_pesan = $data_pesanan['jumlah_barang'];
                $jumlah_harga_pesan = $data_pesanan['total_harga'];
                $ukuran = $data_pesanan['ukuran'];
                $nama_produk = $data_pesanan['nama'];
                $jumlah_harga_pesan = number_format($jumlah_harga_pesan);

        // Ganti pesan dengan teks pesan yang ingin dikirim
        $pesan =
            "Halo Kak, Saya *$nama_user*. %0A*_Rincian Pesanan Saya_*: %0A%0A*ID Transaksi*: $id_transaksi %0A*Nama Produk*: $nama_produk %0A*Ukuran*: $ukuran  %0A*Jumlah Barang*: $jumlah_barang_pesan %0A*Total Harga*: Rp. $jumlah_harga_pesan %0A*Alamat*: $alamat_user";

        // Encode teks pesan agar sesuai format URL

        header("Location: https://wa.me/6281330823742?&text=$pesan");
 ?>
</script>