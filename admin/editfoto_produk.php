<?php include '../koneksi1.php';?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
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
    <script src="..\assets\sweetalert2\dist\sweetalert2.all.js"></script>
</head>

<body id="page-top">
<?php
$comot = $koneksi1->query("SELECT * FROM galeri JOIN produk ON galeri.id_produk=produk.id_produk WHERE galeri.id='$_GET[id]'");
$detail = $comot->fetch_assoc();
//Nama Produk
$dat_produk = array();

$prod = $koneksi1->query("SELECT * FROM produk ORDER BY nama_produk ASC");
while ($nama_produk = $prod->fetch_assoc())
{
    $dat_produk[] = $nama_produk;
}
?>

    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include('sidebar/sidebar_produk.php');?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        <?php include('topbar.php');?>
            <!-- Main Content -->
            <div id="content">

            <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Foto Produk <?php echo $detail['nama_produk']; ?></h1>
</div>

<div class="card shadow">
    <div class="card-body">
    <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Produk</label>
                <select class="form-control form-control-sm" name="nama_produk" required>
                @foreach ($comot as $detail)
                            <option value="<?php echo $detail['id_produk'];?>">
                                Jangan Ubah
                            </option>                            
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control" name="foto" required>
            </div>
            
            <button class="btn btn-success btn-icon-split btn-block" name="ubah">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Simpan</span>    
            </button> <br> <br>
            <a href="galeri.php" class="btn btn-danger btn-icon-split btn-block">
                <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="text">Kembali</span>
           </a>
        </form>
        <script>
         function edit(){
        Swal.fire({
            position: 'top',
            icon: 'success',
            title: 'Data Berhasil Diubah',
            showConfirmButton: false,
            timer: 1500
        })
        setTimeout(function(){ 

        window.location.href = "galeri.php";

        }, 1600);
         }
        </script>
        <?php
            if (isset($_POST['ubah'])){

                $nama_produk = $_POST['nama_produk'];
                $nama = $_FILES['foto']['name'];
                $lokasi = $_FILES['foto']['tmp_name'];
                move_uploaded_file($lokasi,"../foto_produk/".$nama);

                //jika foto dirubah
                if (!empty($nama_produk)) {

                    $koneksi1->query("UPDATE galeri SET id_produk='$_POST[nama_produk]',images='$nama'
                    WHERE id='$_GET[id]'");
                }
                else{
                    $koneksi1->query("UPDATE produk SET images='$nama' WHERE id='$_GET[id]'");
                }
                echo '<script type="text/javascript">
                edit();
                </script>';
            }
        ?>
    </div>
</div>
</div>
<!-- /.container-fluid -->
    <!-- Footer -->
    <?php include('footer.php');?>
    <!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>