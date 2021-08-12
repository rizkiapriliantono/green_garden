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

        window.location.href = "about.php";

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

          window.location.href = "#contactForm";

        }, 3500);
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="assets\sweetalert2\dist\sweetalert2.all.js"></script>
</head>
<body>
    
</body>
</html>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


$errors = array();

// Check if name has been entered
if (!isset($_POST['name'])) {
    $errors['name'] = 'Please enter your name';
}

// Check if email has been entered and is valid
if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address';
}

//Check if message has been entered
if (!isset($_POST['message'])) {
    $errors['message'] = 'Please enter your message';
}

$errorOutput = '';

if(!empty($errors)){

    $errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
     $errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

    $errorOutput  .= '<ul>';

    foreach ($errors as $key => $value) {
        $errorOutput .= '<li>'.$value.'</li>';
    }

    $errorOutput .= '</ul>';
    $errorOutput .= '</div>';

    echo $errorOutput;
    die();
}
$name = $_POST['name'];
$email_from = $_POST['email'];
$message = $_POST['message'];
$from = $email_from;
//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer;
    $mail->isSMTP();                                            //Send using SMTP

    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->Host       =  'smtp.gmail.com' ;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kritikgreengarden@gmail.com';                     //SMTP username
    $mail->Password   = 'rizki123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('kritikgreengarden@gmail.com');
    $mail->addAddress('tokogreengarden@gmail.com');     //Add a recipient




    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Contact Form : Green Garden - $name || $email_from";
    $mail->Body    = "From: $name <br> E-Mail: $email_from <br> Message: <br> $message";
    //send the email
    $result = '';
    if(!$mail->send())
    {
        $result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
        $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        $result .= 'Seperti ada sesuatu yang salah. Tolong coba lagi nanti!';
        $result .= '</div>';
        $result .= '</div>';

		echo $result;
        echo '<script type="text/javascript">
        salah();
        </script>';
		die();
    }
    else
    {
        
        $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
        $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        $result .= 'Terima Kasih Atas Masukan dan Saran Anda!';
        $result .= '</div>';
    
        echo $result;
        echo '<script type="text/javascript">
        benar();
        </script>';
    }
    
    ?>