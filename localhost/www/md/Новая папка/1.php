<?php
include('config.php');
include('menu.php');
$query=mysql_query("SELECT * FROM miks;");

echo "<table border=2 bordercolor='#000000'>
<tr>
<td>id</td>
<td>name</td>
<td>ip</td>
<td>login</td>
<td>pass</td>
<td>mesto_ystanovki</td>
</tr>";

while($problema = mysql_fetch_assoc($query))
{
echo "
<tr>
<td>".$problema[id]."</td>
<td>".$problema[name]."</td>
<td>".$problema[ip]."</td>
<td>".$problema[login]."</td>
<td>".$problema[pass]."</td>
<td>".$problema[mesto_ystanovki]."</td>
</tr>";
}
echo"</table>";
include('podval.php');

?>