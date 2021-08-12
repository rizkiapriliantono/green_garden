<?php include '../koneksi1.php';?>
<?php 
$semuadata=array();
$tanggal_mulai="-";
$tanggal_selesai="-";

if(isset($_GET["kirim"])){
    $tanggal_mulai = $_GET["tglm"];
    $tanggal_selesai = $_GET["tgls"];
    $ambil = $koneksi1->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON
        pm.id_pelanggan=pl.id_pelanggan LEFT JOIN pembelian_produk pp ON pm.id_pembelian=pp.id_pembelian WHERE tanggal_pembelian BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'");
    while($pecah = $ambil->fetch_assoc()){
        $semuadata[] = $pecah;
    }
    //echo "<pre>";
    //print_r ($semuadata);
    //echo "</pre>";
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

    <title>Admin</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php include('sidebar/sidebar_pembelian.php');?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        <?php include('topbar.php');?>
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h2 mb-4 text-gray-800">Laporan Transaksi (PerTanggal)</h1>
                    <!-- DataTales Example -->
                    <form method="GET">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tglm" value="<?php echo $tanggal_mulai?>">
                    </div>
                </div>
                <div class="col-md-5">
                <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" class="form-control" name="tgls" value="<?php echo $tanggal_selesai?>">
                    </div>
                </div>
                <div class="col-md-2">
                    <label>&nbsp;</label><br>
                    <button class="btn btn-primary" name="kirim">Lihat Laporan</button>
                </div>
            </div>
        </form>
                    <a href="cetak_laporan_pertanggal.php?tglm=<?php echo date('Y-m-d',strtotime($tanggal_mulai))?>&tgls=<?php echo date('Y-m-d',strtotime($tanggal_selesai))?>&kirim="><button class="btn btn-secondary">Cetak Laporan</button></a> <br> <br>
                    <?php include 'data_laporan_pertanggal.php';?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>