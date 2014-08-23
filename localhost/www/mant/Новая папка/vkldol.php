<?php
include('config.php');
include('menu.php');
echo "Начинаем проверять<br>";
$query_tariv=mysql_query("SELECT * FROM tariv;");
while($tariv = mysql_fetch_assoc($query_tariv))
 {
  $query_users=mysql_query("SELECT * FROM `users` WHERE status='yes' and balans>0 and tarif=".$tariv[id_tar].";");
  while($users = mysql_fetch_assoc($query_users))
   {
    if ($tariv[cena]<=$users[balans])
    {
     echo "Включили ".$users[fio]."<br>";
     $balans=$users[balans]-$tariv[cena];
     mysql_query("UPDATE users SET balans='$balans', status='no', tr=0 WHERE id=$users[id] LIMIT 1 ;");
    }
   }
 }
echo"Вроде закончили<br>";
include('podval.php');

?>