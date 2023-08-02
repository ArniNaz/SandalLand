<?php
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <title>Register | Sandalland</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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

<style>
body {
    background-color: #5F9EA0;
}

.main {
    height: 100vh;
}

.login-box {
    width: 800px;
    height: 720px;
    box-sizing: border-box;
    border-radius: 10px;
    background-color: #F5FFFA;
}

.btn {
    font-family: serif;
    background-color: #5F9EA0;
}
</style>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow">
            <form method="post">
                <div class="mb-3">
                    <h3 class="text-center"><i class="fa-solid fa-shop"></i>Register Form</h3><br>
                    <i><label for="nama">Nama Lengkap</label></i>
                    <input type="text" class="form-control" id="nama" name="nama"
                        placeholder="Masukkan Nama Lengkap Anda">
                </div>
                <div class="mb-3">
                    <i><label for="username">Username</label></i>
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Masukkan Username Anda">
                </div>
                <div class="mb-3">
                    <i><label for="alamat">Alamat Lengkap</label></i>
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        placeholder="Masukkan Alamat Anda">
                </div>
                <div class="mb-3">
                    <i><label for="no_telp">No HP</label></i>
                    <input type="number" class="form-control" id="no_telp" name="no_telp"
                        placeholder="Masukkan Nomor HP Anda">
                </div>
                <div class="mb-3">
                    <i><label for="password">Password</label></i>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Masukkan Password Anda">
                </div>
                <div class="mb-3">
                    <i><label for="repeat_password">Konfirmasi Password</label></i>
                    <input type="password" class="form-control" id="repeat_password" name="repeat_password"
                        placeholder="Masukkan Konfirmasi Password Anda">
                </div>
                <div>
                    <button class="btn form-control mt-2" type="submit" name="registerbtn">Register</button>
                    <p class="m-2 text-center">Have an account ? <i><a href="./masuk.php">Login</a></i></p>
                </div>
            </form>
        </div>
        <div class="mt-3" style="width: 500px">

            <?php
            if (isset($_POST['registerbtn'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                $re_password = htmlspecialchars($_POST['repeat_password']);
                $nama = htmlspecialchars($_POST['nama']);
                $alamat = htmlspecialchars($_POST['alamat']);
                $no_telp = htmlspecialchars($_POST['no_telp']);

                $sql_register = "INSERT INTO `sandalland`.`login` (`id`, `username`, `password`, `nama`, `alamat`, `no_telp`) VALUES (NULL, '$username', '$password', '$nama', '$alamat', '$no_telp')";



                // cek password sama atau tidak
                if ($password == $re_password) {
                    $query_register = mysqli_query($connect, $sql_register);
                    $check = mysqli_affected_rows($connect);
                    if ($check > 0) {
                    echo "
                    <script>
                    Toast.fire({
                        icon: 'success',
                        title: 'Registrasi Sukses'
                    });
                    </script>";
                    } else{
                    echo "
                    <script>
                    Toast.fire({
                        icon: 'error',
                        title: 'Registrasi Gagal'
                    })
                    </script>";
                    }
                } else{
                    echo "
                    <script>
                    Toast.fire({
                        icon: 'error',
                        title: 'Password Tidak Sama'
                    })
                    </script>";
                }

                
            }
            ?>
        </div>
    </div>

</body>

</html>