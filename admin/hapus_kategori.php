<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="..\assets\sweetalert2\dist\sweetalert2.all.js"></script>
     <!--  
    Favicons
    =============================================
    -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/icon.png">
    <link rel="manifest" href="manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../assets/images/icon.png">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
</head>
<body>
<script>
    function hapus_kat(){
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Kategori Berhasil Dihapus',
        showConfirmButton: false,
        timer: 1500
    })
    setTimeout(function(){ 

    window.location.href = "kategori.php";

    }, 1600);
    }
</script>
    <?php
    include('../koneksi1.php');
    ?>
    <?php

    $ambil = $koneksi1->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
    $pecah = $ambil->fetch_assoc();


    $koneksi1->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");

    echo '<script type="text/javascript">
    hapus_kat();
    </script>';
    ?>
</body>
</html>
