<?php
include('../koneksi1.php');
?>
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
          function hapus(){
          Swal.fire({
              position: 'center',
              icon: 'warning',
              title: 'Data Berhasil Dihapus',
              showConfirmButton: false,
              timer: 1500
          })
          setTimeout(function(){ 

          window.location.href = "pelanggan.php";

          }, 1600);
          }
        </script>

<?php
include('../koneksi1.php')
?>
<?php
$ambil = $koneksi1->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi1->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

echo '<script type="text/javascript">
    hapus();
    </script>';
?>
</body>
</html>

