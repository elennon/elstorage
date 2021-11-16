<?php

    ini_set("include_path", '/home/e587261/php:' . ini_get("include_path") );
    require_once "Mail.php";
 
    $visitor_name = htmlspecialchars($_POST['visitor_name']);
    $visitor_email = htmlspecialchars($_POST['visitor_email']);
    $email_title = htmlspecialchars($_POST['visitor_title']);
    $email_body = htmlspecialchars($_POST['email_body']); 
    $recipient = "eee_lennon@yahoo.com";
 
 $host = "91.210.235.216";
 $username = "info@elstorage.ie";
 $password = "Rhiabit666";
 
 $headers = array ('From' => "info@elstorage.ie",
   'To' => $recipient,
   'Subject' => $email_title);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => "PLAIN",
     'socket_options' => array('ssl' => array('verify_peer_name' => false)),
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($recipient, $headers, $email_body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("OK");
  }
 ?>