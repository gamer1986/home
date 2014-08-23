<?php
include('config.php');

$edit=$_GET["edit"];
$type=$_GET["type"];
$name=$_GET["name"];

$query=mysql_query("SELECT * FROM dom;");
echo "<table border=1>
<tr>
<td>id</td>
<td>dom</td>
<td>status</td>
</tr>";

while($problema = mysql_fetch_assoc($query))
{
echo "
<tr>
<td>".$problema[id]."</td>
<td>".$problema[dom]."</td>
<td>".$problema[status]."</td>
</tr>";
}
echo"</table>
<a href=index.php?type=1>add dom</a>
";


?>