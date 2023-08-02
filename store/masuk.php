<?php
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <title>Login | Sandalland</title>
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
    width: 500px;
    height: 386px;
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
    <?php 
    $_SESSION['logout'] = true;
    if($_SESSION['logout'] == true){
        echo "
                <script>
                Toast.fire({
                    icon: 'success',
                    title: 'Logout Sukses'
                });
                </script>";
    }
    ?>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow">
            <form method="post">
                <div class="mb-3">
                    <h3 class="text-center"><i class="fa-solid fa-shop"></i>LOGIN </h3><br>
                    <i class="fa-solid fa-user"></i>
                    <i><label for="username">Username</label></i>
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Masukkan Username Anda">
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-lock"></i>
                    <i><label for="password">Password</label></i>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Masukkan Password Anda">
                    <p>Don't have an account ? <i><a href="./register.php">Register Now</a></i></p>
                </div>
                <div>
                    <button class="btn form-control mt-4" type="submit" name="loginbtn">Login</button>
                </div>
            </form>
        </div>
        <div class="mt-3" style="width: 500px">

            <?php
        if(isset($_POST['loginbtn'])){
          $username = htmlspecialchars($_POST['username']); 
           $password = htmlspecialchars($_POST['password']); 

           $query = mysqli_query($connect, "SELECT * FROM `login` WHERE username='$username' and password='$password'");
           $countdata = mysqli_num_rows($query);
           

           if(!$countdata>0){
        ?>
            <div class="alert alert-warning" role="alert">Username/Password Salah </div>
            <?php     
           }
           elseif($countdata > 0){
            $data_login = mysqli_fetch_array($query);
            // ketika kondisi trus / data ditemukan
            // login sukses
            // Add Data Login to SSESSION
            $_SESSION['id'] = $data_login['id'];
            $_SESSION['nama'] = $data_login['nama'];
            $_SESSION['login'] = true;
            $_SESSION['logout'] = false;
            header("Location: ./index.php"); // -> arahkan ndek halaman dashboard admin e
           }
        else{
            ?>
            <div class="alert alert-warning" role="alert">Akun tidak tersedia</div>
            <?php
           }
        }
        

        ?>
        </div>
    </div>
</body>

</html>