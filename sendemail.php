<?php
session_start();
$emarray = $_SESSION["defaulteremail"];


include('smtp/PHPMailerAutoload.php');

$keys = array_keys($emarray);
function smtp_mailer($to, $subject, $msg)
{
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587;
  $mail->IsHTML(true);
  $mail->CharSet = 'UTF-8';
  //$mail->SMTPDebug = 2; 
  $mail->Username = "";
  $mail->Password = "";
  $mail->SetFrom("email");
  $mail->Subject = $subject;
  $mail->Body = $msg;
  $mail->AddAddress($to);
  $mail->SMTPOptions = array('ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => false
  ));
  if (!$mail->Send()) {
    echo $mail->ErrorInfo;
  }
}
foreach ($keys as $key) {
  echo smtp_mailer($key, 'Your Ward attendance is low', 'Dear Parent, your ward attendance is just ' . $emarray[$key] . '% and 75% attendance is mandatory as per university criteria. Plz tell your ward to attend the college.');
}

echo "<script>alert('Email sent successfully');location.replace('./admin.php')</script>";
