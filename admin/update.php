<h2>Informasi Update Status</h2>
<?php
// koneksi ke db
$koneksi = new mysqli("localhost", "root", "", "sandalland6");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $status = $koneksi->real_escape_string($status);

    $query = "UPDATE pesanan SET status='$status' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Update successful.";
    } else {
        // Error handling
        echo "Error updating data: " . mysqli_error($koneksi);
    }
}
?>
<br> <br>
<a href="index.php?halaman=pesanan" class="btn btn-primary">Kembali ke Pesanan</a>