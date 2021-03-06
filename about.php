<?php ini_set('display_errors', 1);?>
<?php
session_start();
include 'koneksi1.php';
?>
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

        window.location.href = "#subscribe";

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
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        setTimeout(function(){ 

          window.location.href = "about.php";

        }, 3500);
    }
</script>
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icon_gd.png">
    <link rel="manifest" href="manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/icon_gd.png">
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
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
    <script src="assets\sweetalert2\dist\sweetalert2.all.js"></script>
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>

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
        <section class="module module-small-awal bg-dark-60 about-page-header" data-background="assets/images/tanaman/index1.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Green Garden</h2>
                <div class="module-subtitle font-serif">Green Garden yang merupakan nama lain dari Ma`ruf Florist didirikan tahun 2016, Green Garden ini mengusung tema tentang informasi serta penjualan seputar tanaman baik tanaman hias maupun tanaman budidaya lainnya. </div>
              </div>
            </div>
          </div>
        </section>
        <section class="module pt-0 pb-0" id="about">
          <div class="row position-relative m-20">
            <div class="col-xs-12 col-md-6 side-image" data-background="assets/images/about2.gif"></div>
            <div class="col-xs-12 col-md-6 col-md-offset-6 side-image-text">
              <div class="row">
                <div class="col-sm-12">
                  <h2 class="module-title font-alt align-left">Mari Hias Rumah Anda Dengan Tanaman</h2>
                  <div class="module-subtitle font-serif align-justify">Tanaman merupakan beberapa jenis organisme yang dibudidayakan pada suatu ruang atau media untuk dimanfaatkan di kemudian hari. Jenis tanaman sangat beragam, dari tanaman pangan yang untuk dipanen hingga tanaman hias dan tanaman untuk pengobatan. <br> <br>
                     Tanaman hias sendiri meruapakan salah satu jenis tanaman yang mempunyai fungsi untuk memperindah atau mempercantik suatu ruangan, Indonesia memiliki berbagai macam tanaman hias diantaranya tanaman janda bolong, keladi, mawar, melati dan lainnya.</div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="module module-small-testi bg-dark-60 pt-80 pb-0 parallax-bg testimonial" height="100px" data-background="assets/images/kontak.png">
          <div class="testimonials-slider pt-140 pb-140">
            <ul class="slides">
              <li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="module-icon"><span class="icon-quote"></span></div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-8 col-sm-offset-2">
                    <blockquote class="testimonial-text font-alt">Terima Kasih Green Garden telah membuat halaman saya menjadi lebih menarik dilihat.</blockquote>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                      <div class="testimonial-author">
                        <div class="testimonial-caption font-alt">
                        <div class="testimonial-title">Nabil Andra</div>
                        <div class="testimonial-descr">Karyawan Swasta</div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="module-icon"><span class="icon-quote"></span></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                      <blockquote class="testimonial-text font-alt">Saya pikir membeli tanaman hias di Green Garden lebih menarik dan mudah dalam proses pembeliannya, dimana di toko ini kita dapat langsung bertanya seputar tanaman hias melalui live chat yang tersedia.</blockquote>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                      <div class="testimonial-author">
                      <div class="testimonial-caption font-alt">
                        <div class="testimonial-title">Jeremy</div>
                        <div class="testimonial-descr">Pecinta Tanaman Hias</div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="module-icon"><span class="icon-quote"></span></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                      <blockquote class="testimonial-text font-alt">Terima Kasih Green Garden atas kerjasamanya dalam pemblian tanaman hias dengan jumlah banyak untuk dekorasi perumahan yang saya sedang bangun.</blockquote>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                      <div class="testimonial-author">
                        <div class="testimonial-caption font-alt">
                          <div class="testimonial-title">Wicaksono</div>
                          <div class="testimonial-descr">PT. Home Developer</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </section>
        <section class="module" id="team">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Tanaman Hias</h2>
                <div class="module-subtitle font-serif">Mari kita lihat berbagai macam informasi tanaman hias</div>
              </div>
            </div>
            <div class="row">
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/tanaman/anggrek.png" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Anggrek</h5>
                      <p class="font-serif">Anggrek atau yang biasa disebut bunga anggrek merupakan satu jenis tanaman hias yang terpopuler di Indonesia. Tanaman Anggrek ini dapat dibuat hiasan pada teras rumah dan ruang tamu karena tanaman ini memiliki bentuk yang indah.</p>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Tanaman Anggrek</div>
                    <div class="team-role">Tanaman Hias</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/tanaman/mawar.png" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Mawar</h5>
                      <p class="font-serif">Mawar adalah salah satu jenis tumbuhan hias dengan batang yang berduri tajam serta kulit batang halus licin. Namun mawar memiliki wangi yang cukup kuat yang dapat digunakan untuk menghias serta memberikan aroma wangi pada ruangan.</p>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Bunga Mawar</div>
                    <div class="team-role">Tanaman Hias</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/tanaman/melati.png" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Melati</h5>
                      <p class="font-serif">Melati meurpakan jenis tanaman hias yang tergolong ke dalam golongan perdu (kelompok tanaman yang memiliki tinggi dibawah 6 meter). Tanaman ini memiliki wangi yang cukup khas dan unik.</p>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Bunga Melati</div>
                    <div class="team-role">Tanaman Hias</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/tanaman/janda_bolong.png" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Janda Bolong</h5>
                      <p class="font-serif">Tanaman janda bolong meruapakan jenis tanaman monstera uang daunnya bolong. Tanaman ini merupakan jenis tanaman hias yang cukup banyak diminati banyak orang karena bentuk yang unik.</p>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Tanaman Janda Bolong</div>
                    <div class="team-role">Tanaman Hias</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/tanaman/anggrek.png" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Anggrek</h5>
                      <p class="font-serif">Anggrek atau yang biasa disebut bunga anggrek merupakan satu jenis tanaman hias yang terpopuler di Indonesia. Tanaman Anggrek ini dapat dibuat hiasan pada teras rumah dan ruang tamu karena tanaman ini memiliki bentuk yang indah.</p>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Tanaman Anggrek</div>
                    <div class="team-role">Tanaman Hias</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/tanaman/mawar.png" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Mawar</h5>
                      <p class="font-serif">Mawar adalah salah satu jenis tumbuhan hias dengan batang yang berduri tajam serta kulit batang halus licin. Namun mawar memiliki wangi yang cukup kuat yang dapat digunakan untuk menghias serta memberikan aroma wangi pada ruangan.</p>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Bunga Mawar</div>
                    <div class="team-role">Tanaman Hias</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/tanaman/melati.png" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Melati</h5>
                      <p class="font-serif">Melati meurpakan jenis tanaman hias yang tergolong ke dalam golongan perdu (kelompok tanaman yang memiliki tinggi dibawah 6 meter). Tanaman ini memiliki wangi yang cukup khas dan unik.</p>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Bunga Melati</div>
                    <div class="team-role">Tanaman Hias</div>
                  </div>
                </div>
              </div>
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="">
                <div class="team-item">
                  <div class="team-image"><img src="assets/images/tanaman/janda_bolong.png" alt="Member Photo"/>
                    <div class="team-detail">
                      <h5 class="font-alt">Janda Bolong</h5>
                      <p class="font-serif">Tanaman janda bolong meruapakan jenis tanaman monstera uang daunnya bolong. Tanaman ini merupakan jenis tanaman hias yang cukup banyak diminati banyak orang karena bentuk yang unik.</p>
                    </div>
                  </div>
                  <div class="team-descr font-alt">
                    <div class="team-name">Tanaman Janda Bolong</div>
                    <div class="team-role">Tanaman Hias</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="module bg-dark-60" data-background="assets/images/tanaman/hutan.png">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="video-box">
                  <div class="video-box-icon"><a class="video-pop-up" href="https://www.youtube.com/watch?v=f-vshHBFbe8"><span class="icon-video"></span></a></div>
                  <div class="video-title font-alt">Mari Jaga Lingkungan Dengan Menanam Pohon</div>
                  <div class="video-subtitle font-alt">Video By :<a href="https://www.greenpeace.org/indonesia/">  <font color="white"></font>greenpeace indonesia </font></a> </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="main" id="kontak">
        <div class="col-sm-6 col-sm-offset-3"> <br> <br>
            <h2 class="module-title font-alt">Informasi Dan Kontak</h2>
          </div>
        <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2865031852475!2d106.76062511476991!3d-6.356948695399878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ef6327f4e6a5%3A0xeceea54c6106a340!2sMa&#39;ruf%20Florist!5e0!3m2!1sen!2sid!4v1628432684218!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
              <div class="col-sm-6">
                <h2 class="module-title font-alt">Masukan & Saran</h2>
                <div class="module-subtitle font-serif"></div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <form id="contactForm" role="form" method="post" action="contact2.php">
                    <div class="form-group">
                      <label class="sr-only" for="name">Name</label>
                      <input class="form-control" type="text" id="name" name="name" placeholder="Your Name*" required="required" data-validation-required-message="Please enter your name."/>
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <label class="sr-only" for="email">Email</label>
                      <input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address."/>
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" rows="7" id="message" name="message" placeholder="Your Message*" required="required" data-validation-required-message="Please enter your message."></textarea>
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="text-center">
                      <button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit">Submit</button>
                    </div>
                  </form>
                  <div class="ajax-response font-alt" id="contactFormResponse"></div>
                </div>
              </div>
          </div>
      </div> <br>
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
                                <li><a href="order.php">Status Pemesanan</a></li>
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
                                <form action="subscribe/subscribe_about.php" method="POST">
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