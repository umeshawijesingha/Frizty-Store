<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESET PASSWORD</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
	<link rel="stylesheet" href="./resources/css/home/Regstyle.css">
</head>
<body>

	<!-- container class goes here -->
	<div class="container">

		<!-- recover password form goes here -->
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 500;">Recover Password</p>
            <p class="login-register-text">If you have forgotten your password enter your email address and we will send you a Verification code</p>
				<p class="login-register-text">Then you can reset your password</p>
				<hr>
			<div class="input-group">
				<input type="email" placeholder="Enter your Email" name="email" value="" required>
			</div>
			
			<div class="input-group">
				<button name="submit" class="btn">Recover My Password</button>
			</div>
			
		</form>
		<!-- recover password form ends here -->

	</div>
	<!-- container class ends here -->

</body>
</html>

<?php 
require_once 'db.php';

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function send_password_reset($get_name,$get_email,$token){
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('friztyhouse@gmail.com', 'friztyhouse');
    $mail->addAddress($get_email);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset Password Notification';

    $email_temp ="
    <h2>Helloo</h2>
    <h3>You are receiving this email beacuse we received a password reset request for your account</h3>
    <br/><br/>
    <a href='http://localhost/friztyhouse/frizty/resetpw.php?token=$token&email=$get_email'>Click Me</a>
    
    ";

    
    $mail->Body = $email_temp;
    $mail->send();
}




if(isset($_POST['submit'])){
    $cusEmail = mysqli_real_escape_string($connection,$_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT * FROM customer WHERE email='$cusEmail' LIMIT 1";
    $check_email_run = mysqli_query($connection,$check_email);

    if(mysqli_num_rows($check_email_run) >0 ){
        $row = mysqli_fetch_array($check_email_run);
      //  $get_name = $row['first_name'];
        $get_email = $row['email'];

        $update_token = "UPDATE customer SET resetToken='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($connection,$update_token);

        if($update_token_run){

            send_password_reset($get_name,$get_email,$token);
            echo "<script>alert('We e-mailed you a password reset link.')</script>";


        }else{
            echo "<script>alert('Woops! Something went Wrong.')</script>";
            exit(0);
        }

    }else{
        echo "<script>alert('Woops! No email found.')</script>";
        exit(0);
    }
}
if(isset($_POST['password_update'])){
    $cusEmail = trim(mysqli_real_escape_string($connection,$_POST['email']));
    $NewPassword = mysqli_real_escape_string($connection,md5($_POST['NewPassword']));
    $Conpassword = mysqli_real_escape_string($connection,md5($_POST['Conpassword']));
    $token = mysqli_real_escape_string($connection,$_POST['resetToken']);

    if(!empty($token)){

        if(!empty($cusEmail) && !empty($NewPassword) && !empty($Conpassword)){
            //checking token is valid or not
            $check_token = "SELECT * FROM customer WHERE resetToken='$token' AND email='$cusEmail' LIMIT 1";
            $check_token_run = mysqli_query($connection,$check_token);

            if(mysqli_num_rows($check_token_run) > 0){

                if($NewPassword == $Conpassword){

                        $update_password = "UPDATE customer SET password='$NewPassword' WHERE resetToken='$token' LIMIT 1";
                        $update_password_run = mysqli_query($connection,$update_password);

                        if($update_password_run){
                            $new_token = md5(rand()."funda");
                            $update_to_new_token = "UPDATE customer SET resetToken='$new_token' WHERE resetToken='$token' LIMIT 1";
                            $update_to_new_token_run = mysqli_query($connection,$update_to_new_token);
                            echo "<script>alert('New Password Successfully Updated.')</script>";
                            echo "<script>window.open('login.php','_self')</script>";
                            exit(0);

                        }else{
                            echo "<script>alert('Did not update Password, Something went wrong.')</script>";
                            echo("<script>window.location = 'resetpw.php?token=$token&email=$cusEmail';</script>");

							
                            exit(0);
                        }

                }else{
                    echo "<script>alert('Password and Confirm Password does not match.')</script>";
                    echo("<script>window.location = 'resetpw.php?token=$token&email=$cusEmail';</script>");
          
				
                    exit(0);
                }

            }else{
                echo "<script>alert('Invalid Token.')</script>";
         
                
				
                exit(0);
            }
            
        }else{
            
        echo "<script>alert('All filed are Mandetory.')</script>";
        echo("<script>window.location = 'resetpw.php?token=$token&email=$cusEmail';</script>");

       
		
        exit(0);
        }

    }else{
        echo "<script>alert('No token Available.')</script>";
        echo("<script>window.location = 'resetpw.php?token=$token&email=$cusEmail';</script>");

  
		
        exit(0);
    }

}


?>