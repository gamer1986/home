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
��������:&nbsp;<input type='text' name='name'></p>
<input type='hidden' name='type' value='1'>
<input type='submit' value='��������'></p>
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
<td>��������</td>
<td>ip</td>
<td>�����</td>
<td>������</td>
<td>����� ���������</td>
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
<a href='bord.php?type1=add'>�������� ����</a>";
include('podval.php');

?>