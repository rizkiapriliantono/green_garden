<?php 
session_start();
// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if(isset($_SESSION['nama_pelanggan'])){ // Jika session username ada berarti dia sudah login
	header('location: index.php'); // Kita Redirect ke halaman welcome.php
}
include 'koneksi1.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="shortcut icon" href="assets/images/icon.png" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/icon.png">
    <link rel="stylesheet" href="assets/css/login/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login/login.css" />
    <script src="https://use.fontawesome.com/da3903f554.js"></script>
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
    <script src="assets\sweetalert2\dist\sweetalert2.all.js"></script>
</head>

<body>
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-xl-10 col-lg-11 mx-auto login-container">
                <div class="row">
                   
                    <div class="col-lg-5 col-md-6 no-padding">
                        <div class="login-box">
                            <h5>Selamat Datang!</h5>
                            <form method="post">
                            <div class="login-row row no-margin">
                                <label for=""><i class="fa fa-envelope"></i> Email Address</label>
                                <input type="text" name="email" class="form-control form-control-sm">
                            </div>

                             <div class="login-row row no-margin">
                                <label for=""><i class="fa fa-unlock-alt"></i> Password</label>
                                <input type="password" name="password" class="form-control form-control-sm">
                            </div> <br>

                             <div class="login-row btnroo row no-margin">
                               <button class="btn btn-primary btn-sm" type="submit" name="login"> Masuk</button>
                            </div>
                            <div class="login-row btnroo row no-margin">
                            <a class="btn btn-danger btn-sm" href="google.php"><i class="fa fa-google"></i>  Masuk Dengan Akun Google</a>
                            </div>
                            <div class="login-row donroo row no-margin">
                               <p>Belum meiliki akun? <a href="daftar1.php">Daftar Sekarang!</a></p><br>
                               <p> <a href="index.php">Batalkan !</a></p>
                            </div>
                        </div>
                    </div>
                    
                     <div class="col-lg-7 col-md-6 img-box">
                        <img src="assets/images/login2.gif" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function berhasil(){
        Swal.fire({
            toast: true,
            icon: 'success',
            title: 'Selamat anda berhasil login!',
            animation: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        setTimeout(function(){ 

            window.location.href = "index.php";

        }, 3500);
    }
</script>
<script>
    function gagal(){
        Swal.fire({
            toast: true,
            icon: 'error',
            title: 'Password atau email anda salah!',
            animation: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    }
</script>
    <?php 
// Jika ada tombol login(tombol login ditekan)
if (isset($_POST["login"]))
{
    $email = mysqli_real_escape_string($koneksi1, $_POST['email']); // Ambil value username yang dikirim dari form
    $password = mysqli_real_escape_string($koneksi1, $_POST['password']); // Ambil value password yang dikirim dari form
    $password = md5($password); // Kita enkripsi (encrypt) password tadi dengan md5
    
    //$escape_email = mysqli_real_escape_string($email); // Untuk security dari serangan SQL Injection
    //$escape_password = mysqli_real_escape_string($password); // Untuk security dari serangan SQL Injection
    
    /// Buat query untuk mengecek apakah ada data user dengan username dan password yang dikirim dari form
    $sql = mysqli_query($koneksi1, "SELECT * FROM pelanggan WHERE email_pelanggan='".$email."' AND password_pelanggan='".$password."'");
    $data = mysqli_fetch_array($sql); // Ambil datanya dari hasil query tadi
    

    //jika 1 akun yang cocok maka di loginkan atau dijalankan 
    if (! empty($data)){ // Jika tidak sama dengan empty (kosong)
        $_SESSION['id_pelanggan'] = $data['id_pelanggan']; // Set session untuk nama (simpan nama di session)
        $_SESSION['nama_pelanggan'] = $data['nama_pelanggan']; // Set session untuk email (simpan email di session)
        $_SESSION['email_pelanggan'] = $data['email_pelanggan']; // Set session untuk email (simpan email di session)
        $_SESSION['telpon_pelanggan'] = $data['telpon_pelanggan']; // Set session untuk email (simpan email di session)
        echo '<script type="text/javascript">
        berhasil();
        </script>';
    }
    else{
        //anda gagal login
        echo '<script type="text/javascript">
        gagal();
        </script>';
    }
}

?>

</body>

<script src="assets/js/login/popper.min.js"></script>
<script src="assets/js/login/bootstrap.min.js"></script>


</html>