<?php
$zsqlserver = "localhost"; // ��� sql �������
$zsqluser="root"; // ��� ������������ ��� sql
$zsqlpass=""; // ������ ������������ ��� sql
$zsqldb="mag";
$conn1 = mysql_connect($zsqlserver,$zsqluser,$zsqlpass);
$rs=mysql_query("set names cp1251",$conn1);
mysql_select_db($zsqldb ,$conn1) or die('USERSIDE - error connect to conn1: '.mysql_error());
?>
