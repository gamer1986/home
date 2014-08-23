<?php
$zsqlserver = "localhost"; // èìÿ sql ñåðâåðà
$zsqluser="root"; // èìÿ ïîëüçîâàòåëÿ äëÿ sql
$zsqlpass=""; // ïàðîëü ïîëüçîâàòåëÿ äëÿ sql
$zsqldb="md";
$conn1 = mysql_connect($zsqlserver,$zsqluser,$zsqlpass);
$rs=mysql_query("set names cp1251",$conn1);
mysql_select_db($zsqldb ,$conn1) or die('USERSIDE - error connect to conn1: '.mysql_error());
for ($i=0; $i <9999999 ; $i++) { 
	# code...
	$a=md5($i);
	$b=sha1($i);
	//$b=1;
	//$z="INSERT INTO pas (hes, pas) VALUES ('$a', '$i');";
	mysql_query("INSERT INTO passw (md, sha, pasq) VALUES ('$a', '$b','$i' );");
	//echo $i;
	//echo "<br>";
};
?>