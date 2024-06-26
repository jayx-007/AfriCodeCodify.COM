<?php

// To Remove unwanted errors
//error_reporting(0);

// Add your connection Code
include "connection.php";

// Important Files (Please check your file path according to your folder structure)
require "PHPMailer-6.9.1/PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-6.9.1/PHPMailer-master/src/SMTP.php";
require "PHPMailer-6.9.1/PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Email From Form Input
$send_to_email = $_POST["email"];

// Generate Random 6-Digit OTP
$verification_otp = random_int(100000, 999999);

// Full Name of User
$send_to_name = $_POST["username"];

function sendMail($send_to, $otp, $name) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Enter your email address (i.e email ID) and 16-character passcode for your GMail App password:
    $mail->Username = "jaydevbox@gmail.com";
    $mail->Password = "cshe wxpy kska fjrw";

    // Your email ID and Email Title
    $mail->setFrom("jaydevbox@gmail.com", "Africodify Institution 2024");

    $mail->addAddress($send_to);

    // You can change the subject according to your requirement!
    $mail->Subject = "Account Activation";

    // You can change the Body Message according to your requirement!
    $mail->Body = "Hello, {$name}\nYour account registration is successfully done! Now activate your account with OTP {$otp}.";
    $mail->send();
}

sendMail($send_to_email, $verification_otp, $send_to_name);

// Message to print email success!
echo "Email Sent Successfully!";

?>