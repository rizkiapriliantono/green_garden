<?php
error_reporting(0)
?>
<script>
    function gagal(){
        Swal.fire({
            toast: true,
            icon: 'warning',
            title: 'tidak ada produk! silahkan pilih produk',
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

          window.location.href = "http://localhost/green_garden/penjualan.php";

        }, 3500);
    }
</script>

<?php 
session_start();
include 'koneksi1.php';

?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>Green Garden</title>
    <!--  
    Favicons
    =============================================
    -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icon.png">
    <link rel="manifest" href="manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/icon.png">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <script src="assets\sweetalert2\dist\sweetalert2.all.js"></script>
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
<?php
  if(empty($_SESSION['beli']) OR !isset($_SESSION['beli'])){
    echo '<script type="text/javascript">
          gagal();
          </script>';
  }
?>
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.php">Green Garden</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Beranda</a></li>
                <li><a class="section-scroll" href="about.php">Tentang Kami</a></li>
                <li><a class="section-scroll" href="penjualan.php">Penjualan</a></li>
                <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Transaksi</a>
                  <ul class="dropdown-menu">
                    <li><a href="keranjang.php">Keranjang</a></li>
                    <li><a href="order.php">Status Pemesanan</a></li>
                  </ul>
                </li>
                <?php if (isset($_SESSION["id_pelanggan"])):  ?>
                <li><a class="section-scroll" href="logout.php">Logout</a></li>
                <?php else: ?>
                <li><a class="section-scroll" href="login.php">Login</a></li>
                <?php endif ?>
            </ul>
          </div>
        </div>
      </nav>
      <div class="main">
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt">Keranjang</h1>
              </div>
            </div>
            <hr class="divider-w pt-20">
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-striped table-border checkout-table">
                  <tbody>
                    <tr>
                      <th class="hidden-xs">No</th>
                      <th>Nama Produk</th>
                      <th class="hidden-xs">Harga</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                      <th>Opsi</th>
                    </tr>
                    <?php $nomor=1; ?>
                    <?php $totalbelanja = 0; ?>
                    <!--Menampilkan Produk berdasarkan id_produk-->
                    <?php foreach($_SESSION["beli"] as $id_produk => $jumlah): ?>
                    <?php
                    $ambil = $koneksi1->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah['harga_produk']*$jumlah;
                    ?>
                    <tr>
                      <td>
                        <center><h5 class="cart-title font-alt"><?php echo $nomor; ?></h5></center>
                      </td>
                      <td>
                        <h5 class="cart-title font-alt"><?php echo $pecah["nama_produk"];?></h5>
                      </td>
                      <td class="hidden-xs">
                        <h5 class="cart-title font-alt">Rp. <?php echo number_format ($pecah["harga_produk"]);?></h5>
                      </td>
                      <td class="hidden-xs">
                        <h5 class="cart-title font-alt"><?php echo $jumlah;?></h5>
                      </td>
                      <td>
                        <h5 class="cart-title font-alt">Rp. <?php echo number_format ($subharga);?></h5>
                      </td>
                      <td class="pr-remove"><a href="delete_keranjang.php?id=<?php echo $id_produk; ?>" title="Remove"><i class="fa fa-times"></i></a></td>
                    </tr>
                  <?php $nomor++;?>
                  <?php $totalbelanja+=$subharga; ?>
                  <?php endforeach?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3 col-sm-offset-0">
                <div class="form-group">
                  <a href="penjualan.php"><button class="btn btn-block btn-round btn-d pull-right" type="submit">Tambah Produk</button></a>
                </div>
              </div>
            </div>
           
            <div class="row mt-70">
              <div class="col-sm-5 col-sm-offset-7">
                <div class="shop-Cart-totalbox">
                  <h4 class="font-alt">Total Pembelian</h4>
                  <table class="table table-striped table-border checkout-table">
                    <tbody>
                    <!--PAJAK RUMUS-->
                      <?php //$pajak = $totalbelanja * 0.1;
                      //$total_harga = $totalbelanja + $pajak
                      ?>
                      <!--<tr>
                        <th>Cart Subtotal :</th>
                        <td>Rp. <?php echo number_format ($totalbelanja);?></td>
                      </tr>-->

                      <!--PAJAK PEMBELIAN-->
                      <!--<tr>
                        <th>Shipping Tax :</th>
                        <td>Rp. <?php echo number_format ($pajak);?></td>
                      </tr>-->

                      <tr class="shop-Cart-totalprice">
                        <th>Total :</th>
                        <td>Rp. <?php echo number_format ($totalbelanja);?></td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="checkout.php"><button class="btn btn-lg btn-block btn-round btn-d" type="submit"> Checkout</button></a>
                </div>
              </div>
            </div>
          </div>
        </section>
<footer class="footer-section">
        <div class="container">
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-20">
                        <div class="footer-widget">
                            <div class="footer-logo"> <br> <br>
                                <a href="index.html"><img src="assets/images/logo/logo_white.png" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p align="justify">Green Garden yang merupakan nama lain dari Ma`ruf Florist didirikan tahun 2016, Green Garden ini mengusung tema tentang informasi serta penjualan seputar tanaman baik tanaman hias maupun tanaman budidaya lainnya.</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Links</h3>
                            </div>
                            <ul>
                                <li><a href="index.php">Beranda</a></li>
                                <li><a href="about.php">Tentang Kami</a></li>
                                <li><a href="penjualan.php">Penjualan</a></li>
                                <li><a href="keranjang.php">Keranjang</a></li>
                                <li><a href="order.php">Status Pemsanan</a></li>
                                <li><a href="login.php">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Jangan lupa ikuti kami untuk mendapatkan penawaran dan discount spesial dari kami.</p>
                            </div>
                            <div class="subscribe-form" id="subscribe">
                                <form action="subscribe/subscribe_keranjang.php" method="POST">
                                    <input type="text" name="email" placeholder="Email Address" require >
                                    <button type="submit" name="subscribe"><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2020, All Right Reserved <a href="http://localhost/green_garden/">Green Garden</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                    <div class="footer-social-icon">
                        <a href="https://web.facebook.com/"><i class="fab fa-facebook-f facebook-bg"></i></a>
                        <a href="https://twitter.com/"><i class="fab fa-twitter twitter-bg"></i></a>
                        <a href="https://www.instagram.com/rizki_apriliantono/"><i class="fab fa-instagram instagram-bg"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=6289656544087&text=Halo Mimin, Mau tanya dong ?"><i class="fab fa-whatsapp whatsapp-bg"></i></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</footer>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
    <!--  
    JavaScripts
    =============================================
    -->
    <script src="assets/lib/jquery/dist/jquery.js"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/lib/wow/dist/wow.js"></script>
    <script src="assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="assets/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="assets/lib/flexslider/jquery.flexslider.js"></script>
    <script src="assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/lib/smoothscroll.js"></script>
    <script src="assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
      <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/603f59ae385de407571c00fb/1evrnckno';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
  </body>
</html>