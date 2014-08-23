<?php
$zsqlserver = "localhost"; // èìÿ sql ñåðâåðà
$zsqluser="root"; // èìÿ ïîëüçîâàòåëÿ äëÿ sql
$zsqlpass=""; // ïàðîëü ïîëüçîâàòåëÿ äëÿ sql
$zsqldb="md";
$conn1 = mysql_connect($zsqlserver,$zsqluser,$zsqlpass);
$rs=mysql_query("set names cp1251",$conn1);
mysql_select_db($zsqldb ,$conn1) or die('USERSIDE - error connect to conn1: '.mysql_error());
//for ($i=0; $i <9999999 ; $i++) { 
	# code...
//	$a=md5($i);
//	$b=sha1($i);
	//$b=1;
	//$z="INSERT INTO pas (hes, pas) VALUES ('$a', '$i');";
//	mysql_query("INSERT INTO passw (md, sha, pasq) VALUES ('$a', '$b','$i' );");
	//echo $i;
	//echo "<br>";
//};

$fp = fopen("combo_not.txt", "r"); // Открываем файл в режиме чтения
if ($fp) 
{
	while (!feof($fp))
	{	
		$mytext = fgets($fp, 999);
//		echo $mytext."<br />";
		mysql_query("INSERT INTO sha (sh) VALUES ('$mytext');");
	}
}
else echo "Ошибка при открытии файла";
fclose($fp);

//$file_array=file("combo_not.txt");
//echo count($file_array);

//SELECT * FROM `articles` WHERE MATCH (title,body) AGAINST ('database');
?>