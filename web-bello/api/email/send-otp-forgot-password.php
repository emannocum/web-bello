<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

include_once("../../connections/connection.php");
$con = connection();
$mail = new PHPMailer(true);
$Email = $_POST['email'];
$OTP = $_POST['otp'];

try{
    
    
    

     try {
         
                        //Enable verbose debug output
                        $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
             
                        //Send using SMTP
                        $mail->isSMTP();
             
                        //Set the SMTP server to send through
                        $mail->Host = 'smtp.gmail.com';
             
                        //Enable SMTP authentication
                        $mail->SMTPAuth = true;
             
                        //SMTP username
                        $mail->Username = 'safezonesoftware@gmail.com';
             
                        //SMTP password
                        $mail->Password = 'gaqpsyxhwbqlnrxo';
             
                        //Enable TLS encryption;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
             
                        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                        $mail->Port = 587;
             
                        //Recipients
                        $mail->setFrom('safezonesoftware@gmail.com', 'Palazo bello');
             
                        //Add a recipient
                        $mail->addAddress($Email, $Firstname . ' ' . $Lastname);
             
                        //Set email format to HTML
                        $mail->isHTML(true);
                
                        $mail->Subject = 'Email recovery';
                        // $mail->Body    = '<center><h1 style="font-weight: bold;">Dela Chica Dental Care	&#174;</h1><h3 style="color: black;">Hi, '.$fname.' '.$lname.'!</h3><p style="color: black;">Thanks for using Dela Chica Dental Care Website,<br>Use this OTP to complete your Sign up procedure and verify your account on Dela Chica Dental Care.</p><p style="color: black;">Remember, never share this OTP to anyone.</p><b style="font-size: 30px;">' . $vkey . '</b><p><strong>- Dela Chica Dental Care</strong></p></center>';
             
                        $mail->Body = "<!DOCTYPE html>
<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
<head>
    <meta charset='utf-8'> <!-- utf-8 works for most cases -->
    <meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name='x-apple-disable-message-reformatting'>  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href='https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700' rel='stylesheet'>

    <!-- Progressive Enhancements : BEGIN -->
    

</head>

<body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1; 	font-family: 'Poppins', sans-serif;font-weight: 400;font-size: 15px; line-height: 1.8; color: rgba(0,0,0,.4);' >
	<center style='width: 100%; background-color: #f1f1f1;'>
    <div style='display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>

    <div style='max-width: 600px; margin: 0 auto;' class='email-container'>
    	<!-- BEGIN BODY -->
      <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
      	<tr>
          <td valign='top' class='bg_white' style='padding: 1em 2.5em 0 2.5em;'>
          	<table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
          		<tr>
          			<td class='logo' style='text-align: center;'>
			            <h1 style=' margin: 0;  font-size: 24px; font-weight: 700; font-family: 'Poppins', sans-serif; color:#1100BB  ;'><a href='#'>PALAZO BELLO</a></h1>
			          </td>
          		</tr>
          	</table>
          </td>
	      </tr><!-- end tr -->
				<tr>
          <td valign='middle' class='hero bg_white' style='padding: 2em 0 4em 0; position: relative; z-index: 0;'>
            <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
            
            	<tr>
			          <td style='text-align: center; bordeR: 1px solid rgba(0,0,0,.05);max-width: 50%;margin: 0 auto; padding: 2em;'> 	
				          	<img src='images/logo.jpg' alt='' style='width: 100px; max-width: 600px; height: auto; margin: auto; display: block; border-radius: 50%; padding-bottom: 20px;'>
				          	<h3 style='color: black;'>Hi,!</h3><p style='color: black;'>Thanks for visiting web belo,<br>Use this OTP to recover your account on Web bello.</p><p style='color: black;'>Remember, to change your password as soon as possible.</p>

				           	<p><a href='#' class='btn btn-primary' style='padding: 10px 15px; display: inline-block; border-radius: 5px;background: #1100BB; color: #ffffff;'> $OTP </a></p>
				           	<p><a href='https://web-bello.online/' class='btn-custom' style='color: #1100BB;text-decoration: underline;'>Web bello website</a></p>
			           	
			          </td>
			        </tr>
            </table>
          </td>
	      </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
    

    </div>
  </center>
</body>
</html>";
                        
                        
                    
                        $mail->send();
             
    
    
                          exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'success', "responseMessage" =>'OTP sent!')));
                    } catch (Exception $e) {
    
                          exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$mail->ErrorInfo, "responseMessage" =>'Adding new home owner failed error:!')));
                    }
    
    


  

  
}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Adding new home owner failed error:!')));
}


?>