<?php
use PHPUnit\Framework\TestCase;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

class EmailTest extends TestCase
{
      protected $mail;

      /** @test */
      public function canSendEmail() {
            try{
                  $this->mail = new PHPMailer(true);
      
                  $this->mail->isSMTP();
                  $this->mail->Host = 'smtp.googlemail.com';
                  $this->mail->SMTPAuth = true;
                  $this->mail->Username = 'fabio.marabini1.edusogno.test@gmail.com';
                  $this->mail->Password = 'PippoPlutoPaperino';
                  $this->mail->SMTPSecure = 'ssl';
                  $this->mail->Port = 465;
                  $this->mail->setFrom('fabio.marabini1.edusogno.test@gmail.com');
                  $this->mail->addAddress('fabio.marabini1.edusogno.test@gmail.com');
                  $this->mail->isHTML(true);
                  $this->mail->Subject = 'Test';
                  $this->mail->Body = 'Hi! This is a PHPUnit test email';
      
                  $this->assertEquals($this->mail->send(), true);

            } catch (Exception $e) {
                  echo "<h1>Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}</h1>";
            }
      }
}