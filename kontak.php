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
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
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
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.php">IT Development</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a class="section-scroll" href="about.php">Tentang Kami</a></li>
                    <li><a class="section-scroll" href="penjualan.php">Penjualan</a></li>
                    <li><a class="section-scroll" href="keranjang.php">Keranjang</a></li>
                    <?php if (isset($_SESSION["pelanggan"])):  ?>
                    <li><a class="section-scroll" href="logout.php">Logout</a></li>
                    <?php else: ?>
                    <li><a class="section-scroll" href="login.php">Login</a></li>
                    <?php endif ?>
                    <li><a class="section-scroll" href="kontak.php">Kontak</a></li>
                </ul>
              </div>
          </div>
        </div>
      </nav>
      <section class="home-section home-parallax home-fade bg-dark-30" id="home" height="300px" data-background="assets/images/kontak.png">
        <div class="testimonials-slider pt-140 pb-140"> <br> <br>
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
                        <blockquote class="testimonial-text font-alt">Terima Kasih IT Development dengan adanya website ini penjualan saya menjadi naik dan saya dapat memiliki lebih banyak customer.</blockquote>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 col-sm-offset-4">
                        <div class="testimonial-author">
                          <div class="testimonial-caption font-alt">
                            <div class="testimonial-title">Nabil Andra</div>
                            <div class="testimonial-descr">Perusahaan Jual dan Beli Alat Kerja</div>
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
                        <blockquote class="testimonial-text font-alt">Saya pikir IT Development merupakan suatu penyedia jasa pembuatan website terbaik yang pernah saya gunakan, Lanjutkan Teruss..</blockquote>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 col-sm-offset-4">
                        <div class="testimonial-author">
                          <div class="testimonial-caption font-alt">
                            <div class="testimonial-title">Jeremy</div>
                            <div class="testimonial-descr">PT. Indah Megah Jaya</div>
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
                        <blockquote class="testimonial-text font-alt">Awalnya saya bingung bagaimana cara saya untuk memajukan usaha saya terutama usaha saya penjualan jasa, tapi setelah saya bertanya ke teman saya saya direkomendasikan untuk menggunakan IT Development dan hasilnya sangat memuaskan. Terima Kasih IT Development.</blockquote>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 col-sm-offset-4">
                        <div class="testimonial-author">
                          <div class="testimonial-caption font-alt">
                            <div class="testimonial-title">Wicaksono</div>
                            <div class="testimonial-descr">PT. Bimu</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
      </section> <br> 
    <div class="main" id="kontak">
        <div class="col-sm-6 col-sm-offset-3"> <br> <br>
            <h2 class="module-title font-alt">Informasi Dan Kontak</h2>
          </div>
        <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.9312067494056!2d106.83971956508628!3d-6.354536915303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec475427cefd%3A0xc4e7eee0f871687!2sUniversitas%20Gunadarma%20Kampus%20E!5e0!3m2!1sen!2sid!4v1608309847519!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
              <div class="col-sm-6">
                <h2 class="module-title font-alt">Hubungi Kami</h2>
                <div class="module-subtitle font-serif"></div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <form id="contactForm" role="form" method="post" action="php/contact.php">
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
      <div class="module-small bg-dark">
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
              <div class="widget">
                <h5 class="widget-title font-alt">IT Development</h5>
                <p>Merupakan suatu perusahaan jasa yang menyediakan kebutuhan digital.</p>
                <p>telpon: 021 737 3324</p>
                <p>Email:<a href="#"> itdevelopment@gmail.com</a></p>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="widget">
                <h5 class="widget-title font-alt">Recent LINK</h5>
                <ul class="icon-list">
                  <li>Beranda <a href="index.html">Halaman Utama</a></li>
                  <li>Tentang Kami <a href="about.html"> Informasi Kami</a></li>
                  <li>Layanan <a href="service.html">Layanan Kami</a></li>
                  <li>Portofolio <a href="portofolio.html">Portofolio Kami</a></li>
                  <li>Project <a href="project.html">Project Kami</a></li>
                  <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Kontak</a>
                    <ul class="dropdown-menu">
                      <li><a href="kontak.html">Kontak Kami</a></li>
                      <li><a href="kontak.html">Biodata</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="widget">
                <h5 class="widget-title font-alt">Sosial Media</h5>
                <ul class="icon-list">
                  <a href="https://web.facebook.com/?_rdc=1&_rdr"><i class="fa fa-facebook fa-2x"></i></a> <br> <br>
                    <a href="https://www.instagram.com/rizki_apriliantono/"><i class="fa fa-instagram fa-2x"></i></a> <br> <br>
                    <a href="https://wa.me/6289656544087"><i class="fa fa-whatsapp fa-2x"></i></a>
                </ul>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <hr class="divider-d">
      <footer class="footer bg-dark">
        <div class="container">
          <div class="row">
              <center><p class="copyright font-alt ">&copy; 2017&nbsp;<a href="index.html">Green Garden</a>, All Rights Reserved</p></center>
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
  </body>
</html>