<?php
include('config.php');
include('menu.php');
$type1=$_GET["type1"];
$type=$_POST["type"];
$name=$_POST["name"];

if ($type1=='add')
{
echo "
<form method='post' action='bord.php'>
Название:&nbsp;<input type='text' name='name'></p>
<input type='hidden' name='type' value='1'>
<input type='submit' value='Добавить'></p>
</form>
";
}

if ($type==1)
{
 $query=mysql_query("INSERT INTO miks (name) VALUES ('$name');");
}


$query=mysql_query("SELECT * FROM miks;");
echo "<table border=1 bordercolor='#000000'>
<tr>
<td>id</td>
<td>Название</td>
<td>ip</td>
<td>Логин</td>
<td>Пароль</td>
<td>Место установки</td>
</tr>";
while($problema = mysql_fetch_assoc($query))
{
echo "<tr><td>".$problema[id]."</td>
<td>".$problema[name]."</td>
<td>".$problema[ip]."</td>
<td>".$problema[login]."</td>
<td>".$problema[pass]."</td>
<td>".$problema[mesto_ystanovki]."</td></tr>";
}
echo"</table>
<a href='bord.php?type1=add'>Добавить борд</a>";
include('podval.php');

?>