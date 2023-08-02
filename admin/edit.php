<h2>Edit Status Pesanan</h2>
<?php
$koneksi = new mysqli("localhost", "root", "", "sandalland6");

$ambil = $koneksi->query("SELECT * FROM pesanan");
while ($edit = $ambil->fetch_assoc()) {
?>

<pre><?php print_r($edit); ?></pre>

<form method="post" action="index.php?halaman=update">
    <input type="hidden" name="id" value="<?php echo $edit['id']; ?>">
    <table>
        <thead>
        <tr>
            <th>Status</th>
            <th><input type="text" name="status"></th>
        </tr>
        </thead>
        <tbody>
            <tr> 
                <td>
                    <input type="submit" value="Simpan" class="btn btn-success">
                    <a href="index.php?halaman=pesanan" class="btn btn-danger">Kembali</a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
<?php
}
?>