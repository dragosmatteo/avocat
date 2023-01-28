<?php

    $name = $_POST ['name'];
    $phone = $_POST ['phone'];
  
  
    $subject = "=?utf-8?B?".base64_encode("Genova Asigurări")."?=";
    $headers = "From: Genova Asigurări\r\nReply-to: Genova Asigurări\r\nContent-type: text/html; charset=utf8\r\n";
    $message = "<br><b>Numele:</b> ".$name."<br><b>Telefon:</b> ".$phone;
  
    $success = mail("vladium60@gmail.com", $subject, $message, $headers);
    echo $success;

?>
