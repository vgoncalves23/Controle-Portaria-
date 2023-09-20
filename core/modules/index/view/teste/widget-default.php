

<?php 


session_start();

$notebook = $_SESSION['book1'];
$email = $_SESSION['email'];

?>




<!DOCTYPE html>
<html>
    
    <body>
      
        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        

require './vendor/autoload.php';

        $mail = new PHPMailer(true);
        $agora = date('d/m/Y H:i');

        try {
            
           

            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'mail.acoforja.com.br';
            $mail->SMTPAuth = true;
            $mail->Username = 'vgoncalves@acoforja.com.br';
            $mail->Password = 'F0rj@73';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('vgoncalves@acoforja.com.br', 'TI');
            $mail->addAddress($email, '');
            
    

            $mail->isHTML(true);                                 
            $mail->Subject = 'Emprestimo Notebook';
            $mail->Body = "Olá, sua solicitação de emprestimo do $notebook foi feita em $agora.<br>** . IMPORTANTE: esta é uma mensagem automática e não deve ser respondida. ";
           
            
            $mail->send();

            echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Mensagem enviada com Sucesso!');
window.location.href='https://acoforja.com/notebook/index.php?view=rent';
</SCRIPT>");


        } catch (Exception $e) {
            echo "Erro: E-mail não enviado com sucesso . Error PHPMailer: {$mail->ErrorInfo}";
            //echo "Erro: E-mail não enviado com sucesso.<br>";
        }
        ?>
    </body>
</html>
