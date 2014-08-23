<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=win-1251">
  <title>123</title>
 </head>
 <body>
<?php
$zsqlserver = "localhost"; 
$zsqluser="root"; 
$zsqlpass=""; 
$zsqldb="mag";
$conn1 = mysql_connect($zsqlserver,$zsqluser,$zsqlpass);
//$rs=mysql_query("set names cp1251",$conn1);
mysql_select_db($zsqldb ,$conn1) or die('USERSIDE - error connect to conn1: '.mysql_error());
$qyery_magaz=mysql_query("SELECT * FROM magaz;");

echo "
  <table border=1>
  <tr>
  <td>Магазин</td>
  </tr>
";

while($magaz = mysql_fetch_assoc($qyery_magaz))
 {
  Echo"<tr>
  <td>".$magaz[magazin]."
   - ".$magaz[addres]."</td>
</tr>";
 }

echo "</table>";
//while (true) {
//$magaz=mysql_fetch_array($qyery_magaz);
//if (!$magaz) {
//	echo $magaz[magazin];		
//					break;
//				} else {
//					echo $magaz[magazin];
//					//echo " string1 ";
//						}
//				//echo count($shaq);
//				break;
//			}
//
?>
 </body>
</html>