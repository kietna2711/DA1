<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer-master/src/Exception.php';
require 'vendor/PHPMailer-master/src/PHPMailer.php';
require 'vendor/PHPMailer-master/src/SMTP.php';


$mail = new PHPMailer(true);

try {
    $mail->isSMTP();  // Chỉ định rằng PHPMailer sẽ sử dụng giao thức SMTP để gửi email
    $mail->Host = 'smtp.gmail.com';  // Máy chủ SMTP của Gmail
    $mail->SMTPAuth = true;  // Bật xác thực SMTP
    $mail->Username = 'nvk1662005@gmail.com';  // Tài khoản email Gmail của bạn
    $mail->Password = 'eobv qchw oqjk kbnk';  // Mật khẩu ứng dụng (không phải mật khẩu tài khoản Gmail chính)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Sử dụng mã hóa SSL
    $mail->Port = 465;  // Cổng SMTP, có thể dùng 465 cho SSL hoặc 587 cho TLS
      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('nvk1662005@gmail.com', 'Shop');
    $mail->addAddress('kietnvps41026@gmail.com', 'Van Kiet');     //Add a recipient
    // $mail->addAddress('ellen@example.com');  // thêm nhiều người nhận             //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>