<?php
function sendemail($body, $subject) {
    require_once 'libs/swift_required.php';
    $message = Swift_Message::newInstance()
      ->setSubject($subject)
      ->setFrom(array('websitebot@asperous.us' => 'From Website'))
      ->setTo(array('asperous2@gmail.com' => 'From Midnight Menu Website'))
      ->setBody($body);
      
    $transport = Swift_SmtpTransport::newInstance('s140346.gridserver.com', 25)
      ->setUsername('asper2@asperous.us')
      ->setPassword('#)url33t');
    $mailer = Swift_Mailer::newInstance($transport);
    $result = $mailer->send($message);
}
?>
