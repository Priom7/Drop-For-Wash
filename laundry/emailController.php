<?php

require_once 'vendor/autoload.php';
require_once 'constants.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASS)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);



function sendVerificationEmail($userEmail, $token){


    global $mailer;

    $body = '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Verify Email</title>
      </head>
      <body>
        <div class="wrapper">
          <p>
            Thank you for sining up on our system. Please click the link below to
            verify your account.
          </p>
          <a href="http://localhost/laundry/profile.php?token=' .$token. '"
            >Verify your email</a
          >
        </div>
      </body>
    </html>
     ';
    // Create a message
$message = (new Swift_Message('Verify Your Email Address'))
->setFrom(EMAIL)
->setTo($userEmail)
->setBody($body, text/html);

// Send the message
$result = $mailer->send($message);

}



?>