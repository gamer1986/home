<?php
$zsqlserver = "localhost"; // èìÿ sql ñåðâåðà
$zsqluser="root"; // èìÿ ïîëüçîâàòåëÿ äëÿ sql
$zsqlpass=""; // ïàðîëü ïîëüçîâàòåëÿ äëÿ sql
$zsqldb="md";
$conn1 = mysql_connect($zsqlserver,$zsqluser,$zsqlpass);
$rs=mysql_query("set names cp1251",$conn1);
mysql_select_db($zsqldb ,$conn1) or die('USERSIDE - error connect to conn1: '.mysql_error());


//6722441
for ($i=787931; $i < 6722441; $i++) { 
	//echo $i;
	$qyery_sha=mysql_query("SELECT * FROM sha WHERE id=$i;");
	while ($sha=mysql_fetch_assoc($qyery_sha)) {
		//echo "SELECT * FROM shaq WHERE sh_q LIKE '%".$sha[sh]."%';";
		$qyery_shaq=mysql_query("SELECT * FROM shaq WHERE sh_q LIKE '%".$sha[sh]."%';");
			while (true) {
				$shaq=mysql_fetch_array($qyery_shaq);
				if (!$shaq) {
					//echo " string ";
					mysql_query("INSERT INTO shaq (sh_q) VALUES ('".$sha[sh]."');");
					break;
				} else {
					//echo " string1 ";
						}
				//echo count($shaq);
				break;
			}
		//echo $sha[sh];
			//if ($qyery_shaq=null) {
			//	echo "string";
			//	mysql_query("INSERT INTO shaq (sh_q) VALUES ('".$sha[sh]."');");
			// } 
			// print_r ($qyery_shaq);
			//while ($shaq=mysql_fetch_assoc($qyery_shaq)) {
			//	echo "string1";
			//}
		# code...
	}
	//echo "<br>";

}


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

//$fp = fopen("combo_not.txt", "r"); // Открываем файл в режиме чтения
//if ($fp) 
//{
//	while (!feof($fp))
//	{	
//		$mytext = fgets($fp, 999);
//		echo $mytext."<br />";
//		mysql_query("INSERT INTO sha (sh) VALUES ('$mytext');");
//	}
//}
//else echo "Ошибка при открытии файла";
//fclose($fp);

//$file_array=file("combo_not.txt");
//echo count($file_array);

//SELECT * FROM `articles` WHERE MATCH (title,body) AGAINST ('database');
?>