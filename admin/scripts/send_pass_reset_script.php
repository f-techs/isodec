<?php
require_once('../../config.php');
if(isset($_POST['email'])){
    $email=trim($_POST['email']);
    $sql=DB::getInstance()->select_query("SELECT * FROM tbl_users where user_email='$email'");
    $r=$sql->results();
    $c=$sql->count();
    if($c > 0){
        $token='qqerueirnhakfkllkncvfodpfkzlxhoaf12945678903568';
        $token=str_shuffle($token);
        $token=substr($token, 0, 10);
         //$sql=DB::getInstance()->update('tbl_users', $email, 'user_email', array('token'=>$token, 'token_expire'=>date_add(date_create(date("Y-m-d H:i:s")), date_interval_create_from_date_string('5 minutes'))));
         $sql=DB::getInstance()->gen_query("UPDATE tbl_users set token='$token', token_expire=DATE_ADD(NOW(), INTERVAL 30 MINUTE) WHERE user_email='$email'");
         if(isset($sql)){
             require(APPROOT. '/phpmailer/PHPMailerAutoload.php');
            $mail = new PHPMailer;
            $mail->Host = 'mail.f-techsconsult.com';
            $mail->Port = 26;
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            $mail->smtpConnect([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ]);

            $mail->Username = 'info@f-techsconsult.com'; //Your Email Address
            $mail->Password = '$Kwame@20436'; //Your Email Password
            $mail->setFrom('info@f-techsconsult.com', 'ISODEC');
            $mail->addAddress($email); //Receiver Email
            $mail->addReplyTo('noreply@isodec.com');
            $mail->isHTML(true);
            $mail->Subject = ('RESET PASSWORD');
            $mail->Body = "
            <!doctype html>
            <html>
            <body>
            Hi, <br><br>

            Click on the link below to reset your password;<br><br>
            <p><a href='".URLROOT."/admin/pages/password-reset?email=$email&token=$token' target='_blank'>".URLROOT."/admin/pages/password-reset?email=$email&token=$token</a><br><br>
            </p>

            Best regards.
            </body>
            </html>
            ";
            if (!$mail->send()) {
                //echo $mail->ErrorInfo;
                echo json_encode(array('status'=>'info', 'class'=>'error', 'message'=>'Connection Problem. Check your internet and Try Again'));
               } else {
                echo json_encode(array('status'=>'success', 'class'=>'success', 'message'=>'Email sent successfully. Check your email'));
               }
         }
         
    }else{
        echo json_encode(array('status'=>'fail', 'class'=>'info', 'message'=>'Email cannot be found'));
    }
}