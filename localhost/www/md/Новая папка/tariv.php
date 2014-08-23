<?php
include('config.php');
include('menu.php');
$edit=$_GET["edit"];
$type=$_GET["type"];
$name=$_GET["name"];
$cena=$_GET["cena"];
if ($type==1)
{
 $query=mysql_query("SELECT * FROM tariv WHERE id_tar=$edit;");
 while($problema = mysql_fetch_assoc($query))
 {
  Echo"
  <form method='get' action='tariv.php'>
  <input type='text' name='name' value=".$problema[name_tar].">
  <input type='text' name='cena' value=".$problema[cena].">
  <input type='hidden' name='type' value='2'>
  <input type='hidden' name='edit' value='$edit'>
  <input type='submit' value='Изменить'>
  </form>
  ";
 }
}

if ($type==2)
{
 $query=mysql_query("UPDATE tariv SET name_tar = '$name', cena='$cena' WHERE id_tar=$edit LIMIT 1 ;");
}

if ($type==3)
{
  Echo"
  <form method='get' action='tariv.php'>
  Название&nbsp;<input type='text' name='name'>
  Цена&nbsp;<input type='text' name='cena'>
  <input type='hidden' name='type' value='4'>
  <input type='submit' value='Дабавить'>
  </form>
  ";
}

if ($type==4)
{
 $query=mysql_query("INSERT INTO tariv (name_tar, cena) VALUES ('$name', '$cena');");
}

$query=mysql_query("SELECT * FROM tariv;");
echo "<table border=1>
<tr>
<td>Код</td>
<td>Название тарифа</td>
<td>Цена</td>
</tr>";
while($problema = mysql_fetch_assoc($query))
{
echo "
<tr>
<td><a href='tariv.php?edit=".$problema[id_tar]."&type=1'>".$problema[id_tar]."</a></td>
<td>".$problema[name_tar]."</td>
<td>".$problema[cena]."</td>
</tr>";
}
echo"</table>
<a href='tariv.php?type=3'>Добавить тариф</a>";
include('podval.php');
?>