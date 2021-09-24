<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/css/uikit.min.css" />
      
    <link rel="stylesheet" href="../css/style.scss">
    <title>Event page</title>
  </head>
  <body>
      <div class="uk-container">

            <?php

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;
            
            require_once 'vendor/autoload.php';
            include '../db/db_connection.php';

            // Users data
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            $attendees = [];
            while ($row = $result->fetch_assoc()) {
                  $attendees[] = $row;
            };

            try {
                  $mail = new PHPMailer(true);
                  $mail->isSMTP();
                  $mail->Host = 'smtp.googlemail.com';
                  $mail->SMTPAuth = true;
                  $mail->Username = 'fabio.marabini1.edusogno.test@gmail.com';
                  $mail->Password = 'PippoPlutoPaperino';
                  $mail->SMTPSecure = 'ssl';
                  $mail->Port = 465;

                  foreach($attendees as $attendee) {
                        $mail->setFrom('fabio.marabini1.edusogno.test@gmail.com', 'Fabio');
                        $mail->addAddress($attendee['usr_email'], $attendee['usr_name']);
                        
                        $mail->isHTML(true);
                        
                        $mail->Subject = 'Event reminder';
                        $mail->Body    = 'Hi '.$attendee['usr_name'].' '.$attendee['usr_surname'].',<br>you have been invited to event '.$_REQUEST['event_name'].' on '.$_REQUEST['event_date'].' at '.$_REQUEST['event_hour'].', and you can join with this link '.$_REQUEST['event_link'].'.';
                        
                        $mail->send();
                        $mail->clearAddresses();
                  }

                  echo '<h1>Messages have been sent!</h1>';
            } catch (Exception $e) {
                  echo "<h1>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</h1>";
            }
            ?>

      </div>
      <!-- UIkit JS -->
      <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit-icons.min.js"></script>
  </body>
</html>