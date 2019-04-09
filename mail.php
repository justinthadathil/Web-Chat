<?php
$db = mysqli_connect('localhost', 'root', '', 'chat');
$email = mysqli_real_escape_string($db, $_POST['email']);
$user_check_query = "select * from login where email='$email'";
$result = mysqli_query($db, $user_check_query);
$row=mysqli_fetch_array($result);
$dec=base64_decode($row["password"]);
//$row["password"];
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';   					  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'livechat292@gmail.com';                 // SMTP username
$mail->Password = 'LiveChat1234';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('livechat292@gmail.com', 'Live Chat');
$mail->addAddress($row["email"]);     // Add a recipient
$mail->addReplyTo('livechat292@gmail.com');


//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Live Chat user password';
$mail->Body    = "<b>This is your password: </b>".$dec;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    //echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('No Such Email registered:- ".$email."')
    window.location.href='login.php';
    </SCRIPT>");
} else {
    //echo 'Message has been sent';
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Password Succesfully send to ".$email."')
    window.location.href='login.php';
    </SCRIPT>");
}
  
  ?>