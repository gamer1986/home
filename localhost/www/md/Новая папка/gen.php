<?php
include('config.php');
include('menu.php');
$bord=$_GET["bord"];
$type=$_GET["type"];
if ($type==1)
{
 $fp = fopen("bord$bord.rsc", "w+");
 $test = fwrite($fp, $mytext);
 $query=mysql_query("SELECT users.login, users.pass, tariv.name_tar, users.status FROM users,
 tariv WHERE tariv.id_tar = users.tarif AND users.tr =0 AND users.miks =$bord AND users.tr_new=1");
 echo "<table border=1>
 <tr>
 <td>Логин</td>
 <td>Пароль</td>
 <td>Тариф</td>
 </tr>";
 while($problema = mysql_fetch_assoc($query))
  {
   echo "
   <tr>
   <td>".$problema[login]."</td>
   <td>".$problema[pass]."</td>
   <td>".$problema[name_tar]."</td></tr>";
   $mytext = "/ppp secret set ".$problema[login]." password=".$problema[pass]." profile=".$problema[name_tar]."  disabled=".$problema[status]." \r\n";
   $test = fwrite($fp, $mytext);
  }
 mysql_query("UPDATE users SET tr=1 WHERE tr=0 and miks=$bord;");
 $query=mysql_query("SELECT users.login, users.pass, tariv.name_tar, users.status FROM users,
 tariv WHERE tariv.id_tar = users.tarif AND users.tr_new =0 AND users.miks =$bord");
 while($problema = mysql_fetch_assoc($query))
  {
   echo "
   <tr>
   <td>".$problema[login]."</td>
   <td>".$problema[pass]."</td>
   <td>".$problema[name_tar]."</td></tr>";
   $mytext = "/ppp secret add name=".$problema[login]." password=".$problema[pass]." profile=".$problema[name_tar]." disabled=".$problema[status]."\r\n";
   $test = fwrite($fp, $mytext);
  }
 mysql_query("UPDATE users SET tr_new=1 WHERE tr_new=0 and miks=$bord;");
 if ($test) echo 'Файл сгенирован.';
  else echo 'Ошибка при записи в файл.';
 fclose($fp);
echo"</table>";
}
$query_bord=mysql_query("SELECT * FROM miks;");
Echo"
 <form method='get' action='gen.php'><p>
 <input type='hidden' name='type' value='1'>
 Борд:&nbsp;<select name='bord'>";
 while($botd= mysql_fetch_assoc($query_bord))
  {
   echo"<option value=".$botd[id]." label=".$botd[name].">".$botd[name]."</option>";
  }
 Echo"
 </select>
 <input type='submit' value='Добавить'></p>
 </form>";
 
$h = mysql_query("SELECT COUNT(*) FROM users WHERE status='yes'");
 if ($h) $i = mysql_result($h,0);
echo $i;
include('podval.php');
?>