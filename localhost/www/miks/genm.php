<?php
include('config.php');
include('menu.php');


Echo "����������<br>";
echo "������ ������<br>";
$query_izm_tr=mysql_query("SELECT * FROM izm_tr where gotov=0;");
while($izm_tr = mysql_fetch_assoc($query_izm_tr))
{
 $query=mysql_query("UPDATE users SET tarif = ".$izm_tr[tarif_id]." WHERE id = ".$izm_tr[user_id]." LIMIT 1 ;");
}
echo "���������<br><br>";

$query=mysql_query("SELECT * FROM tariv;");
echo "��������� ����. ����� �� ������<br>";
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
echo"����� ������� :)<br>
�������� ������.<br>";
mysql_query("UPDATE users SET status='yes' WHERE balans<0;");
mysql_query("UPDATE users SET status='no' WHERE balans>0;");
echo"����� �����<br>";


$query_miks=mysql_query("SELECT * FROM miks;");
while($miks = mysql_fetch_assoc($query_miks))
{
 echo "��������� ���� �� ���� ".$miks[name]."<br>
 <table border=1>
 <tr>
 <td>���</td>
 <td>�����</td>
 <td>������</td>
 <td>������</td>
 <td>�����</td>
 </tr>";
 $fp = fopen("bord$miks[id].rsc", "w+");
 $mytext = "/ppp secret remove [find]\r\n";
 $test = fwrite($fp, $mytext);
 $query_users=mysql_query("SELECT users.login, users.fio, users.balans, tariv.name_tar, users.status FROM users,
 tariv WHERE tariv.id_tar = users.tarif AND users.miks =$miks[id] AND udal=0;");
 while($users = mysql_fetch_assoc($query_users))
  {
   $mytext = "/ppp secret set ".$users[login]." disabled=".$users[status]." profile=".$users[name_tar]."\r\n";
   $test = fwrite($fp, $mytext);
   echo "<tr>
   <td>".$users[fio]."</td>
   <td>".$users[login]."</td>
   <td>".$users[status]."</td>
   <td>".$users[balans]."</td>
   <td>".$users[name_tar]."</td>
   </tr>";
  }
 echo "</table>";
 if ($test) echo "���� ��� ����� ".$miks[name]." �����<br>";
  else echo '����������! ������ � ������! (��������� ���������!) ���� �� �������������';
 fclose($fp);
}

$query_miks=mysql_query("SELECT * FROM miks;");
while($miks = mysql_fetch_assoc($query_miks))
{
 echo "�� ����� ".$miks[name]." ";
 $h = mysql_query("SELECT COUNT(*) FROM users WHERE status='yes' AND miks=$miks[id] AND udal=0;");
 if ($h) $i = mysql_result($h,0);
 echo $i." � ������ �� ";
 $h = mysql_query("SELECT COUNT(*) FROM users WHERE miks=$miks[id] AND udal=0;");
 if ($h) $i = mysql_result($h,0);
 echo $i."<br>";
}



include('podval.php');
?>