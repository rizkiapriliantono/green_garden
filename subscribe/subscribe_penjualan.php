<?php error_reporting(0);?>
<script>
    function salah(){
        Swal.fire({
            toast: true,
            icon: 'error',
            title: 'Email yang anda masukan salah!',
            animation: true,
            position: 'center',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        setTimeout(function(){ 
        
          window.location.href = "http://localhost/green_garden/penjualan.php#subscribe";

        }, 4300);
    }
</script>
  <script>
    function benar(){
        Swal.fire({
            toast: true,
            icon: 'success',
            title: 'Anda Berhasil Mengikut!',
            animation: true,
            position: 'center',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        setTimeout(function(){ 

          window.location.href = "http://localhost/green_garden/penjualan.php";

        }, 4300);
    }
</script>
<?php
session_start();
include '../koneksi1.php';
$kate = $koneksi1->query("SELECT * FROM kategori ORDER BY kategori ASC");

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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/icon.png">
    <link rel="manifest" href="../manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../assets/images/icon.png">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="../assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="../assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="../assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="../assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="../assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="../assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="../assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <script src="../assets\sweetalert2\dist\sweetalert2.all.js"></script>
    <!-- Main stylesheet and color file-->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="../assets/css/colors/default.css" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <section>
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
      </section>
      <div class="main">
        <section class="module module-small-awal bg-dark-60 shop-page-header" data-background="../assets/images/tanaman/penjualan.png">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Daftar Produk</h2>
                <div class="module-subtitle font-serif">"Jika Anda belum pernah mengalami kegembiraan karena mencapai lebih dari yang dapat Anda bayangkan, berkebunlah." <br> - Robert Breault</div>
              </div>
            </div>
          </div>
        </section>
        <section class="module-small">
          <div class="container">
            <form class="row" method="get" action="pencarian.php">
              <div class="col-sm-4 mb-sm-20">
                <select class="form-control" onchange="location = this.value;">
                <option>-Pilih Kategori-</option>
                <?php if (mysqli_num_rows($kate)){?>
                  <?php while ($rowkat = mysqli_fetch_array($kate)){ ?>
                    <option value="kategori.php?kategori=<?= $rowkat['kategori'];?>">
                        <?= $rowkat['kategori'];?>
                    </option>
                  <?php } ?>
                <?php } ?>
                </select>
              </div>
              <div class="col-sm-4 mb-sm-20">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword" aria-label="Search">
              </div>
                <button class="btn btn-outline-success" name="cari" type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </section>
        <hr class="divider-w">
        <section class="module-small">
<?php
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
?>
          <div class="container">
            <div class="row multi-columns-row">
              <?php $ambil = $koneksi1->query("SELECT * FROM produk WHERE kat_produk IN ('tanaman','hias','umum')");?>
            	<?php while($perproduk = $ambil->fetch_assoc()){?>
              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="shop-item">
                  <div class="shop-item-image"><img src="../foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
                    <div class="shop-item-detail"><a href="detail.php?id=<?php echo $perproduk["id_produk"];?>" class="btn btn-round btn-b"><i class="fas fa-info-circle"></i> Detail</a></div>
                    <div class="shop-item-info"><a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-round btn-b"><span class="icon-basket"> Beli</span></a></div>
                  </div>
                  <h4 class="shop-item-title font-alt"><a href="detail.php?id=<?php echo $perproduk["id_produk"];?>"><?php echo $perproduk['nama_produk']; ?></a></h4>
                  Rp. <?php echo number_format($perproduk['harga_produk']); ?>
                </div>
              </div>
              <?php }?>
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
                                <a href="index.html"><img src="../assets/images/logo/logo_white.png" class="img-fluid" alt="logo"></a>
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
                                <form action="subscribe_penjualan.php" method="POST">
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
    <script src="../assets/lib/jquery/dist/jquery.js"></script>
    <script src="../assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/lib/wow/dist/wow.js"></script>
    <script src="../assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="../assets/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="../assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="../assets/lib/flexslider/jquery.flexslider.js"></script>
    <script src="../assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="../assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="../assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>
  </body>
</html>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer;
    $mail->isSMTP();                                            //Send using SMTP

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->Host       =  'smtp.gmail.com' ;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tokogreengarden@gmail.com';                     //SMTP username
    $mail->Password   = 'rizki123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('tokogreengarden@gmail.com', 'Green Garden');
    $mail->addAddress($_POST['email']);     //Add a recipient




    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Terima kasih anda telah mengikuti kami - Green Garden';
    $mail->Body    = '
    <!doctype html>
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

    <head>
      <title> Hello world </title>
      <!--[if !mso]><!-- -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!--<![endif]-->
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style type="text/css">
        #outlook a {
          padding: 0;
        }

        body {
          margin: 0;
          padding: 0;
          -webkit-text-size-adjust: 100%;
          -ms-text-size-adjust: 100%;
        }

        table,
        td {
          border-collapse: collapse;
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
        }

        img {
          border: 0;
          height: auto;
          line-height: 100%;
          outline: none;
          text-decoration: none;
          -ms-interpolation-mode: bicubic;
        }

        p {
          display: block;
          margin: 13px 0;
        }
      </style>
      <!--[if mso]>
            <xml>
            <o:OfficeDocumentSettings>
              <o:AllowPNG/>
              <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
            </xml>
            <![endif]-->
      <!--[if lte mso 11]>
            <style type="text/css">
              .mj-outlook-group-fix { width:100% !important; }
            </style>
            <![endif]-->
      <!--[if !mso]><!-->
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,500" rel="stylesheet" type="text/css">
      <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Roboto:300,500);
      </style>
      <!--<![endif]-->
      <style type="text/css">
        @media only screen and (min-width:480px) {
          .mj-column-per-60 {
            width: 60% !important;
            max-width: 60%;
          }

          .mj-column-per-40 {
            width: 40% !important;
            max-width: 40%;
          }

          .mj-column-per-100 {
            width: 100% !important;
            max-width: 100%;
          }

          .mj-column-per-45 {
            width: 45% !important;
            max-width: 45%;
          }

          .mj-column-per-65 {
            width: 65% !important;
            max-width: 65%;
          }

          .mj-column-per-35 {
            width: 35% !important;
            max-width: 35%;
          }
        }
      </style>
      <style type="text/css">
        @media only screen and (max-width:480px) {
          table.mj-full-width-mobile {
            width: 100% !important;
          }

          td.mj-full-width-mobile {
            width: auto !important;
          }
        }
      </style>
    </head>

    <body>
      <div style="">
        <!--[if mso | IE]>
          <table
            align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        <div style="margin:0px auto;max-width:600px;">
          <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
              <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                  <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                  class="" style="vertical-align:top;width:360px;"
                >
              <![endif]-->
                  <div class="mj-column-per-60 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                      <tr>
                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                          <div style="font-family:Roboto, Helvetica, sans-serif;font-size:10px;font-weight:300;line-height:24px;text-align:left;color:#616161;">Semua tanaman yang anda ingikan ada disini!</div>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                </td>
              
                <td
                  class="" style="vertical-align:top;width:240px;"
                >
              <![endif]-->
                  <div class="mj-column-per-40 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                      <tr>
                        <td align="right" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                          <div style="font-family:Roboto, Helvetica, sans-serif;font-size:16px;font-weight:300;line-height:24px;text-align:right;color:#616161;" href="http://greengarden.epizy.com/">Green Garden</div>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          
          <table
            align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        <div style="margin:0px auto;max-width:600px;">
          <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
              <tr>
                <td style="direction:ltr;font-size:0px;padding:0px;text-align:center;">
                  <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                  class="" style="vertical-align:top;width:600px;"
                >
              <![endif]-->
                  <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                      <tr>
                        <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                            <tbody>
                              <tr>
                                <td style="width:550px;">
                                  <a href="http://greengarden.epizy.com/" target="_blank">
                                    <img height="auto" src="https://res.cloudinary.com/jiboy/image/upload/v1615729605/email_lcp0sf.png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="550" />
                                  </a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          
          <table
            align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        <div style="margin:0px auto;max-width:600px;">
          <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
              <tr>
                <td style="direction:ltr;font-size:0px;padding:0px;text-align:center;">
                  <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                  class="" style="vertical-align:top;width:600px;"
                >
              <![endif]-->
                  <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                      <tr>
                        <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                          <div style="font-family:Roboto, Helvetica, sans-serif;font-size:16px;font-weight:300;line-height:24px;text-align:center;color:#616161;">Semua tanaman yang anda ingikan ada disini!</div>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          
          <table
            align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        <div style="margin:0px auto;max-width:600px;">
          <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
              <tr>
                <td style="direction:ltr;font-size:0px;padding:0px;text-align:center;">
                  <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                  class="" style="vertical-align:top;width:270px;"
                >
              <![endif]-->
                  <div class="mj-column-per-45 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                      <tr>
                        <td align="center" style="font-size:0px;padding:0px;word-break:break-word;">
                          <div style="font-family:Roboto, Helvetica, sans-serif;font-size:18px;font-weight:500;line-height:24px;text-align:center;color:#616161;">TERIMA KASIH, TELAH MENGIKUTI KAMI</div>
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size:0px;padding:10px 25px;word-break:break-word;">
                          <p style="border-top:solid 2px #616161;font-size:1px;margin:0px auto;width:100%;">
                          </p>
                          <!--[if mso | IE]>
            <table
              align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 2px #616161;font-size:1px;margin:0px auto;width:220px;" role="presentation" width="220px"
            >
              <tr>
                <td style="height:0;line-height:0;">
                  &nbsp;
                </td>
              </tr>
            </table>
          <![endif]-->
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size:0px;padding:10px 25px;word-break:break-word;">
                          <p style="border-top:solid 2px #616161;font-size:1px;margin:0px auto;width:45%;">
                          </p>
                          <!--[if mso | IE]>
            <table
              align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 2px #616161;font-size:1px;margin:0px auto;width:71.5px;" role="presentation" width="71.5px"
            >
              <tr>
                <td style="height:0;line-height:0;">
                  &nbsp;
                </td>
              </tr>
            </table>
          <![endif]-->
                        </td>
                      </tr>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          
          <table
            align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        <div style="margin:0px auto;max-width:600px;">
          <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
              <tr>
                <td style="direction:ltr;font-size:0px;padding:0px;padding-top:30px;text-align:center;">
                  <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                  class="" style="vertical-align:top;width:600px;"
                >
              <![endif]-->
                  <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                      <tr>
                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                          <div style="font-family:Roboto, Helvetica, sans-serif;font-size:16px;font-weight:300;line-height:24px;text-align:left;color:#616161;">
                            <p>Halo!</p>
                            <p align="justify"> Terima kasih telah mengikuti kami, kami harap kalian suka dengan semua produk yang kami jual!, untuk menanyakan informasi seputar tananman yang kami jual kalian dapat menghubungi nomor kami di <a href="https://wa.me/628965654408">Whats App (089656544087)</a> kami atau melalui live chat di website kami <a href="http://greengarden.epizy.com/">Green Garden</a>. </p>
                            <p>Nantikan informasi dan promo menarik lainnya yang akan kami email :)</p>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          
          <table
            align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        <div style="margin:0px auto;max-width:600px;">
          <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
              <tr>
                <td style="direction:ltr;font-size:0px;padding:0px;text-align:center;">
                  <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                  class="" style="vertical-align:top;width:600px;"
                >
              <![endif]-->
                  <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                      <tr>
                        <td align="center" vertical-align="middle" style="font-size:0px;padding:10px 25px;padding-top:20px;padding-bottom:100px;word-break:break-word;">
                          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;">
                            <tr>
                              <td align="center" bgcolor="#5FA91D" role="presentation" style="border:none;border-radius:2px;cursor:auto;mso-padding-alt:15px 30px;background:#5FA91D;" valign="middle">
                                <a href="http://greengarden.epizy.com/kategori.php?kategori=tanama" style="display:inline-block;background:#5FA91D;color:#FFFFFF;font-family:Roboto, Helvetica, sans-serif;font-size:13px;font-weight:normal;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:15px 30px;mso-padding-alt:0px;border-radius:2px;" target="_blank"> WEBSITE </a>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          
          <table
            align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
          >
            <tr>
              <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
          <![endif]-->
        <div style="margin:0px auto;max-width:600px;">
          <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
              <tr>
                <td style="direction:ltr;font-size:0px;padding:0px;text-align:center;">
                  <!--[if mso | IE]>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    
            <tr>
          
                <td
                  class="" style="vertical-align:top;width:390px;"
                >
              <![endif]-->
                  <div class="mj-column-per-65 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                      <tr>
                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                            <tbody>
                              <tr>
                                <td style="width:150px;">
                                  <a href="http://greengarden.epizy.com/" target="_blank">
                                    <img height="auto" src="https://res.cloudinary.com/jiboy/image/upload/v1614595870/logo_email_icon_jbjlny.png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="150" />
                                  </a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                </td>
              
                <td
                  class="" style="vertical-align:top;width:210px;"
                >
              <![endif]-->
                  <div class="mj-column-per-35 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                      <tr>
                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                          <table cellpadding="0" cellspacing="0" width="100%" border="0" style="color:#000000;font-family:Roboto, Helvetica, sans-serif;font-size:13px;line-height:22px;table-layout:auto;width:100%;border:none;">
                            <tr style="list-style: none;line-height:1">
                              <td> <a href="https://twitter.com/">
                                  <img width="25" src="https://cdn.recast.ai/newsletter/twitter.png" />
                                </a> </td>
                              <td> <a href="https://web.facebook.com/rizkiapriliantono1/">
                                  <img width="25" src="https://cdn.recast.ai/newsletter/facebook.png" />
                                </a> </td>
                              <td> <a href="mailto:tokogreengarden@gmail.com">
                                  <img width="25" src="https://cdn.recast.ai/newsletter/google%2B.png" />
                                </a> </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                </td>
              
            </tr>
          
                      </table>
                    <![endif]-->
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--[if mso | IE]>
              </td>
            </tr>
          </table>
          <![endif]-->
      </div>
    </body>

    </html>';
    if(!$mail->send())
    {
        echo '<script type="text/javascript">
        salah();
        </script>';
    }
    else
    {
        echo '<script type="text/javascript">
        benar();
        </script>';
    }
    
    ?>