<?php 
session_start();
include 'koneksi1.php';
if(!isset($_SESSION["id_pelanggan"])){
  echo "<script>alert('Silahkan Login !!!');</script>";
  echo "<script>location='login.php';</script>";
}

if(empty($_SESSION['beli'])){
  echo "<script>alert('tidak ada produk! silahkan pilih produk dan selamat berbelanja');</script>";
  echo "<script>location='index.php'</script>";
}
?>

<?php
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
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
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
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
                <h1 class="module-title-checkout font-alt">Checkout</h1> <br>
              </div>
            </div>
        
<div class="page-wrapper"> 
    <div class="checkout shopping">
        <div class="container">
            <div class="row">
              <div class="col-md-8">
                <div class="block billing-details">
                    <h4 class="widget-title">Billing Details</h4>
                    <form class="checkout-form" method="post">
                      <?php $totalbelanja = 0; ?>
                        <?php foreach($_SESSION["beli"] as $id_produk => $jumlah): ?>
                        <?php
                        $ambil = $koneksi1->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah['harga_produk']*$jumlah;
                        ?>
                        <?php $totalbelanja+=$subharga; ?>
                        <?php endforeach?>
                        <!--<?php $pajak = $totalbelanja * 0.1; //PAJAK PEMBELIAN
                        $total_harga = $totalbelanja + $pajak
                        ?>-->
                        <div class="form-group">
                            <label for="nama">Full Name</label>
                            <input type="text" class="form-control" id="nama" value="<?= $_SESSION['nama_pelanggan'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="<?= $_SESSION['email_pelanggan'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="telfon">No Telfon</label>
                            <?php if (isset($_SESSION["telpon_pelanggan"])):  ?>
                                <input type="text" class="form-control" id="telfon" value="<?= $_SESSION['telpon_pelanggan'];?>" readonly>
                            <?php else: ?>
                                <input type="text" class="form-control" id="telfon">
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat_pengiriman" >
                        </div>
                        <div class="checkout-country-code clearfix">
                            <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" class="form-control" id="kode_pos" name="kode_pos">
                            </div>
                            <div class="form-group" >
                            <select class="form-control"  name="id_ongkir">
                            <option selected="selected"> Pilih Ongkos Kirim</option>
                            <?php 
                            $ambil = $koneksi1->query("SELECT * FROM ongkir");
                            while($perongkir = $ambil->fetch_assoc()){
                            ?>
                            <option value="<?= $perongkir['id_ongkir'];?>">
                                <?= $perongkir['nama_kota']?> 
                                Rp.<?= number_format($perongkir['tarif'])?>
                            </option>
                            <?php }?>
                          </select>
                            </div>
                        </div>
                        <button class="btn btn-round btn-d mt-20" name="checkout">Order Now!</button>
                    </form>

                    
                  <?php 
                      if (isset($_POST["checkout"])){
                          $id_pelanggan = $_SESSION["id_pelanggan"];
                          $id_ongkir = $_POST["id_ongkir"];
                          $tanggal_pembelian = date("Y-m-d");
                          $alamat_pengiriman = $_POST['alamat_pengiriman'];
                          $kode_pos = $_POST['kode_pos'];
                          $telpon_pelanggan = $_POST['telpon'];
                          $email_pelanggan = $_POST['email'];

                          $ambil = $koneksi1->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
                          $arrayongkir = $ambil->fetch_assoc();
                          $nama_kota = $arrayongkir['nama_kota'];
                          $tarif = $arrayongkir['tarif'];

                          $total_pembelian = $totalbelanja + $tarif;

                          // menyimpan data ke tabel pembelian
                          $koneksi1->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,kode_pos,tarif,alamat_pengiriman,email,telpon) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$kode_pos','$tarif', '$alamat_pengiriman', '$email_pelanggan', '$telpon_pelanggan')");
                      
                          //mendapatkan id_pembelian yang telah terjadi 
                          $id_pembelian_barusan = $koneksi1->insert_id;

                          foreach ($_SESSION["beli"] as $id_produk => $jumlah) {

                              //mendapatkan data produk berdasarkan id_produk
                              $ambil = $koneksi1->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                              $perproduk = $ambil->fetch_assoc();

                              $nama = $perproduk['nama_produk'];
                              $harga = $perproduk['harga_produk'];
                              $berat = $perproduk['berat_produk'];

                              $subharga = $perproduk['harga_produk']*$jumlah;
                              $koneksi1->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah_produk,nama,harga,berat,subharga) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah','$nama','$harga','$berat','$subharga')");

                              //skript update stok
                              $koneksi1->query("UPDATE produk SET stok_produk=stok_produk -$jumlah WHERE id_produk='$id_produk'");
                          }

                          //mengkosongkan keranjang belanja
                          unset($_SESSION["beli"]);

                          //tampilan dialihka ke halaman nota
                          echo"<script>alert('Pembelian Sukses!');</script>";
                          echo"<script>location='nota.php?id=$id_pembelian_barusan';</script>";
                      }
                  ?>
                </div>
              </div>
                <div class="col-md-4">
                <div class="product-checkout-details">
                    <div class="block">
                        <h4 class="widget-title">Data Pemesanan</h4>
                        <!--Menampilkan Produk berdasarkan id_produk-->
                        
                        <?php $totalbelanja = 0; ?>
                        <!--Menampilkan Produk berdasarkan id_produk-->
                        <?php foreach($_SESSION["beli"] as $id_produk => $jumlah): ?>
                        <?php
                        $ambil = $koneksi1->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah['harga_produk']*$jumlah;
                        ?>
                        <div class="media product-card">
                            <a class="pull-left" href="detail.php?id=<?php echo $pecah["id_produk"];?>">
                            <img class="media-object" src="foto_produk/<?php echo $pecah["foto_produk"];?>" alt="Image" />
                            </a>
                            <div class="media-body">
                            <h4 class="media-heading"><a href="detail.php?id=<?php echo $pecah["id_produk"];?>"><?php echo $pecah["nama_produk"];?></a></h4>
                            <p class="price"><?php echo $jumlah;?> x Rp. <?php echo number_format ($pecah["harga_produk"]);?></p>
                            <a href="delete_produk.php?id=<?php echo $id_produk; ?>"><span class="remove" >Remove</span></a>
                            </div>
                        </div>
                       
                        <?php $totalbelanja+=$subharga; ?>
                        <?php endforeach?>
                        <div class="discount-code">
                            <!--Kosong Buat Tampilan-->
                        </div>
                        <ul class="summary-prices">
                            <li>
                            <span>Subtotal:</span>
                            <span class="price">Rp. <?php echo number_format($totalbelanja) ?></span>
                            </li>

                            <!--PAJAK PEMBELIAN-->
                            <!--<li> 
                            <span>Pajak:</span>
                            <span class="price"> Rp. <?php echo number_format ($pajak);?></span>
                            </li>-->

                            <li>
                            <span>Pengiriman:</span>
                            <span>Free (jabodetabek)</span>
                            </li>
                        </ul>
                        <div class="summary-total">
                            <span>Total</span>
                            <span class="price">Rp. <?php echo number_format ($totalbelanja);?></span>
                        </div>
                        <div class="verified-icon">
                            <img src="images/verified.png">
                        </div>
                    </div>
                </div>
                </div>
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
                                <form action="subscribe/subscribe_checkout.php" method="POST">
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