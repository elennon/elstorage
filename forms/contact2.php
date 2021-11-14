<?php
 require_once "Mail.php";
 
 $from = "eee_lennon@yahoo.com";
 $to = "elennon@outlook.ie";
 $subject = "Hi!";
 $body = "Hi,\n\nHow are you?";
 
 $host = "5.189.183.138";
 $username = "ned@elstorage.com";
 $password = "Rhiabit666";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
 ?>