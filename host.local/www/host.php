<?php
include ("db.php");
function GetRealIp()
{
 if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
 {
   $ip=$_SERVER['HTTP_CLIENT_IP'];
 }
 elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
 {
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
 }
 else
 {
   $ip=$_SERVER['REMOTE_ADDR'];
 }
 return $ip;
}

$ipcl=GetRealIp();
$result0 = mysql_query("SELECT id FROM users WHERE ip='$ipcl' and access='yes'"); #Проверяем есть ли пользоватеди на этом девайсе

if (mysql_num_rows($result0) >0) {
//echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
	echo ("Привет незнакомец рад что ты вернулся :). Можешь работать.");
}
else {
//	include ("text.php");
	$codeip = ip2long("192.168.0.254")-ip2long("192.168.0.10");
	$code = "3995 ".$codeip;
	mysql_query("INSERT INTO users (ip, access, codeip) VALUES ('255.255.255.255', 'no', '$code');");
	echo "Для регистрации отправте ".$code." на номер бла бла";
}

?>