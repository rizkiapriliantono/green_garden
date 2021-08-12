<?php include '../koneksi1.php';?>
<?php 
$dat_kategori = array();

$kat = $koneksi1->query("SELECT * FROM kategori ORDER BY kategori ASC");
while ($kat_prod = $kat->fetch_assoc())
{
    $dat_kategori[] = $kat_prod;
}
?>
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

    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include('sidebar/sidebar_produk.php');?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        <?php include('topbar.php');?>
            <!-- Main Content -->
            <div id="content">

            <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Produk Tanaman</h1>
</div>

<div class="card shadow">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control form-control-sm" name="kategori_produk" required>
                    <option>-Pilih Kategori-</option>
                        <?php foreach($dat_kategori as $key => $value):?>
                    <option value="<?= $value['kategori'];?>">
                        <?= $value['kategori'];?>
                    </option>
                        <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="harga" placeholder="Harga" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="10" class="d-block w-100 form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Berat</label>
                <input type="number" class="form-control" name="berat" placeholder="Berat" required>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" min="1" class="form-control" name="stok_produk" placeholder="Stok" required>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control" name="foto" required>
            </div>
            
            <button class="btn btn-success btn-icon-split btn-block" name="save">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Simpan</span>    
            </button> <br> <br>
            <a href="produk.php" class="btn btn-danger btn-icon-split btn-block">
                <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="text">Kembali</span>
           </a>
        </form>
        <script>
         function simpan(){
        Swal.fire({
            position: 'top',
            icon: 'success',
            title: 'Data Berhasil Ditambahkan',
            showConfirmButton: false,
            timer: 1500
        })
        setTimeout(function(){ 

        window.location.href = "produk.php";

        }, 1600);
         }
        </script>
    </div>
</div>
</div>
<!-- /.container-fluid -->
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

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
<?php
if (isset($_POST['save'])){
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi,"../foto_produk/".$nama);
    $koneksi1->query("INSERT INTO produk (kat_produk,nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,stok_produk)VALUES('$_POST[kategori_produk]','$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[stok_produk]')");

    echo '<script type="text/javascript">
        simpan();
        </script>';
}
?>