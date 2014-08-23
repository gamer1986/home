<?php
include('config.php');
include('menu.php');

$query=mysql_query("SELECT * FROM tariv;");
echo "Списываем абон плату на тарифе<br>";
while($problema = mysql_fetch_assoc($query))
{
 echo "<br>".$problema[name_tar]."<br>";
 $query_users=mysql_query("SELECT * FROM users WHERE tarif='$problema[id_tar]' and udal=0;");
 while($users = mysql_fetch_assoc($query_users))
  {
   $balans=$users[balans]-$problema[cena];
   echo "".$users[id]." ".$users[fio]." ".$balans."<br>";
   mysql_query("UPDATE users SET balans='$balans' WHERE id=$users[id] LIMIT 1 ;");
  }
}
echo"Вроде списали :)<br>
Начинаем убиать.<br>";
mysql_query("UPDATE users SET status='yes' WHERE balans<0;");
mysql_query("UPDATE users SET status='no' WHERE balans>0;");
echo"Вроде убили<br>";
include('podval.php');

?>