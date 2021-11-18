<?php

    ini_set("include_path", '/home/e587261/php:' . ini_get("include_path") );
    require_once "Mail.php";
 
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $title = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']); 
    $recipient = "info@elstorage.ie";

 $body = "Name: $name\nEmail: $email\n\nMessage:\n$message\n\nRegards,\n$name";
 $subject = "From: $name <$email> $title";
 $host = "91.210.235.216";
 $username = "info@elstorage.ie";
 $password = "Rhiabit666";
 
 $headers = array ('From' => "info@elstorage.ie",
   'To' => $recipient,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => "PLAIN",
     'socket_options' => array('ssl' => array('verify_peer_name' => false)),
     'username' => $username,
     'password' => $password));

 
 $mail = $smtp->send($recipient, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("OK");
  }
 ?>