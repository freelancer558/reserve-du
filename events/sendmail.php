<?php
  $headers  = "From: My site<noreply@example.com>\r\n";
  $headers .= "Reply-To: info@example.com\r\n";
  $headers .= "Return-Path: info@example.com\r\n";
  $headers .= "X-Mailer: Drupal\n";
  $headers .= 'MIME-Version: 1.0' . "\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   
 
 $to = "freelancer558@gmail.com";
 $subject = "Hi!";
 $body = "Hi,\n\nHow are you?";
 if (mail($to, $subject, $body, $headers)) {
   echo("<p>Message successfully sent!</p>");
  } else {
   echo("<p>Message delivery failed...</p>");
  }
 