<?php
include('config.php');
include('menu.php');

$bord=$_GET["bord"];
$type=$_GET["type"];
$code=$_GET["code"];
if ($type==1)
{
 $fp = fopen("bord$bord.rsc", "a+");
 $mytext=$code;
 $test = fwrite($fp, $mytext);
 fclose($fp);
}

Echo"
 <form method='get' action='edit.php'><p>

 <input type='hidden' name='type' value='1'>
 Борд&nbsp; <input type='text' name='bord'><br>
 <textarea name='code' rows='10' cols='100'></textarea>
 <input type='submit' value='Добавить'></p>
 </form>";
include('podval.php');
?>