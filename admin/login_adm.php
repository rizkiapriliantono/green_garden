<?php
session_start();
include '../koneksi1.php';
?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin</title>
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
	  <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->

        <!-- CUSTOM STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!--Icon CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../images/logo.png">
    <script src="..\assets\sweetalert2\dist\sweetalert2.all.js"></script>

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h3>ADMIN</h3>
                <h2></h2>
            </div>
        </div>
         <div class="row ">
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <center> <strong> Masuk </strong> </center>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="text" class="form-control" name="username" />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control"  name="password"/>
                                        </div>
                                    <center><button class="btn btn-primary btn-block" name="login_adm">Login</button></center>
                                    <hr />
                                    <a class="btn btn-default btn-block" href="http://localhost/green_garden/index.php" >Batal </a> 
                                    </form>
                                    <script>
                                      function berhasil(){
                                        Swal.fire({
                                          position: 'center',
                                          icon: 'success',
                                          title: 'Selamat Datang Admin!',
                                          showConfirmButton: false,
                                          timer: 1500
                                        })
                                          setTimeout(function(){ 

                                              window.location.href = "index.php";

                                          }, 1600);
                                      }
                                  </script>
                                  <script>
                                      function gagal(){
                                        Swal.fire({
                                          position: 'center',
                                          icon: 'error',
                                          title: 'Username atau Password Salah!',
                                          showConfirmButton: false,
                                          timer: 1500
                                        })
                                          setTimeout(function(){ 

                                            window.location.href = "login_adm.php";

                                            }, 1600);
                                      }
                                  </script>
                                    <?php 
                                      if (isset($_POST['login_adm'])){
                                        $ambil = $koneksi1->query("SELECT * FROM adm WHERE username='$_POST[username]' AND pass ='$_POST[password]'");
                                        $yangcocok = $ambil->num_rows;
                                        if ($yangcocok==1){
                                          $_SESSION['adm']=$ambil->fetch_assoc();
                                          echo '<script type="text/javascript">
                                          berhasil();
                                          </script>';
                                        }
                                        else{
                                          echo '<script type="text/javascript">
                                          gagal();
                                          </script>';
                                        }
                                      }
                                    ?>
                            </div>
                        </div>
                    </div>
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>

   
</body>
</html>