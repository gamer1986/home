<?php
include('config.php');
include('menu.php');
//$query=mysql_query("SELECT users.id, users.fio,users.telefon,users.adres,
//users.login,users.pass, tariv.name_tar, miks.name FROM users,miks,tariv WHERE miks.id=users.miks, tariv.id_tar=users.tarif;");

$edit=$_GET["edit"];
$type=$_GET["type"];
$name=$_GET["name"];

if ($type==1)
{
 $query=mysql_query("SELECT users.id, users.fio,users.telefon,users.adres,
users.login,users.pass, tariv.name_tar, miks.name FROM users,miks,tariv WHERE
miks.id=users.miks and tariv.id_tar=users.tarif and users.id=$edit;");
 $query_tar=mysql_query("SELECT * FROM tariv;");
 while($problema = mysql_fetch_assoc($query))
 {
  $tar=$problema[name_tar];
  Echo"
  <form method='get' action='users.php'><p>
  ФИО:&nbsp;<input type='text' name='name' value=".$problema[fio].">
  Телефон:&nbsp;<input type='text' name='telefon' value=".$problema[telefon].">
  Адрес:&nbsp;<input type='text' name='adres' value=".$problema[adres].">
  Логин:&nbsp;<input type='text' name='login' value=".$problema[login].">
  Пароль:&nbsp;<input type='text' name='pass' value=".$problema[pass].">
  <input type='hidden' name='type' value='2'>
  <input type='hidden' name='edit' value='$edit'>
  Тариф:&nbsp;<select name='tar'>";
  while($tar1= mysql_fetch_assoc($query_tar))
   {
    if ($tar==$tar1[name_tar])
     {
      echo"<option value=".$tar1[id_tar]." label=".$tar1[name_tar]." selected>".$tar1[name_tar]."</option>";
     }
    Else
     {
      echo"<option value=".$tar1[id_tar]." label=".$tar1[name_tar].">".$tar1[name_tar]."</option>";
     }
   }
  Echo" </select>

  <input type='submit' value='Изменить'></p>
  </form>
  ";
 }
}

if ($type==2)
{
 $edit=$_GET["edit"];
 $telefon=$_GET["telefon"];
 $name=$_GET["name"];
 $adres=$_GET["adres"];
 $login=$_GET["login"];
 $pass=$_GET["pass"];
 $tar=$_GET["tar"];
 $query=mysql_query("UPDATE users SET fio = '$name', telefon = '$telefon', adres = '$adres', login = '$login', pass = '$pass',tarif = '$tar',tr=0 WHERE id =$edit LIMIT 1 ;");
};

if ($type==3)
{
 $query_tar=mysql_query("SELECT * FROM tariv;");
 $query_bord=mysql_query("SELECT * FROM miks;");
 Echo"
 <form method='get' action='users.php'><p>
 ФИО:&nbsp;<input type='text' name='name'>
 Телефон:&nbsp;<input type='text' name='telefon'>
 Адрес:&nbsp;<input type='text' name='adres'>
 Логин:&nbsp;<input type='text' name='login'>
 Пароль:&nbsp;<input type='text' name='pass' value=".mt_rand(1111, 999999).">
 <input type='hidden' name='type' value='4'>
 Тариф:&nbsp;<select name='tar'>";
 while($tar1= mysql_fetch_assoc($query_tar))
  {
   echo"<option value=".$tar1[id_tar]." label=".$tar1[name_tar].">".$tar1[name_tar]."</option>";
  }
 Echo"
 </select>
  Борд:&nbsp;<select name='bord'>";
 while($botd= mysql_fetch_assoc($query_bord))
  {
   echo"<option value=".$botd[id]." label=".$botd[name].">".$botd[name]."</option>";
  }
 Echo"
 </select>
 <input type='submit' value='Добавить'></p>
 </form>";
}

if ($type==4)
{
 $telefon=$_GET["telefon"];
 $name=$_GET["name"];
 $adres=$_GET["adres"];
 $login=$_GET["login"];
 $pass=$_GET["pass"];
 $tar=$_GET["tar"];
 $miks=$_GET["bord"];
 $query=mysql_query("INSERT INTO users (id ,fio ,telefon ,adres ,login ,pass ,tarif ,miks, tr, status) VALUES (NULL , '$name', '$telefon', '$adres', '$login', '$pass', '$tar', '$miks', 2, 'no');");
};


if ($type==5)
{
 $query_user=mysql_query("select * from users where udal=0;");
 echo"
 <form method='get' action='users.php'><p>
 <select name='users'>";
 while($tar1= mysql_fetch_assoc($query_user))
  {
   echo"<option value=".$tar1[id]." label=".$tar1[fio].">".$tar1[fio]."</option>";
  }
 Echo"
 </select>
 <input type='text' name='balans'>
 <input type='hidden' name='type' value='6'>
 <input type='submit' value='Добавить'></p>
 </form>";

};

if ($type==6)
{
 $telefon=$_GET["telefon"];
 $name=$_GET["name"];
 $adres=$_GET["adres"];
 $login=$_GET["login"];
 $pass=$_GET["pass"];
 $users=$_GET["users"];
 $balans=$_GET["balans"];
 $query=mysql_query("UPDATE users SET balans = '$balans' WHERE id =$users LIMIT 1 ;;");
};

if ($type==7)
{
 $query_user=mysql_query("select * from users where udal=0;");
 $query_tar=mysql_query("SELECT * FROM tariv;");
 echo"
 <form method='get' action='users.php'><p>
 <select name='users'>";
 while($tar1= mysql_fetch_assoc($query_user))
  {
   echo"<option value=".$tar1[id]." label=".$tar1[fio].">".$tar1[fio]."</option>";
  }
 Echo"
 </select>
 Тариф:&nbsp;<select name='tar'>";
 while($tar1= mysql_fetch_assoc($query_tar))
  {
   if ($tar==$tar1[name_tar])
    {
     echo"<option value=".$tar1[id_tar]." label=".$tar1[name_tar]." selected>".$tar1[name_tar]."</option>";
    }
   Else
    {
     echo"<option value=".$tar1[id_tar]." label=".$tar1[name_tar].">".$tar1[name_tar]."</option>";
    }
  }
 Echo" </select>
 <input type='hidden' name='type' value='8'>
 <input type='submit' value='Добавить'></p>
 </form>";
};

if ($type==8)
{
 $telefon=$_GET["telefon"];
 $name=$_GET["name"];
 $adres=$_GET["adres"];
 $tar=$_GET["tar"];
 $pass=$_GET["pass"];
 $users=$_GET["users"];
 $balans=$_GET["balans"];
 $query=mysql_query("INSERT INTO izm_tr (user_id, tarif_id) VALUES ('$users', '$tar');");
};

if ($type==9)
{
 $telefon=$_GET["telefon"];
 $name=$_GET["name"];
 $adres=$_GET["adres"];
 $login=$_GET["login"];
 $pass=$_GET["pass"];
 $users=$_GET["users"];
 $balans=$_GET["balans"];
 $query=mysql_query("UPDATE users SET udal = 1 WHERE id =$users LIMIT 1 ;;");
};

$query=mysql_query("SELECT users.id, users.fio,users.telefon,users.adres,
users.login,users.pass, tariv.name_tar, miks.name, users.status, users.balans FROM users,miks,tariv WHERE
miks.id=users.miks and tariv.id_tar=users.tarif and users.udal=0;");
echo "<table border=1>
<tr>
<td>Код</td>
<td>ФИО</td>
<td>Телефон</td>
<td>Адрес</td>
<td>Логин</td>
<td>Пароль</td>
<td>Тариф</td>
<td>Бордер</td>
<td>Убит?</td>
<td>Баланс</td>
</tr>";

while($problema = mysql_fetch_assoc($query))
{
echo "
<tr>
<td><a href='users.php?edit=".$problema[id]."&type=1'>".$problema[id]."</a></td>
<td>".$problema[fio]."</td>
<td>".$problema[telefon]."</td>
<td>".$problema[adres]."</td>
<td>".$problema[login]."</td>
<td>".$problema[pass]."</td>
<td>".$problema[name_tar]."</td>
<td>".$problema[name]."</td>
<td><a href='users.php?type=9&users=".$problema[id]."'>".$problema[status]."</a></td>
<td>".$problema[balans]."</td>
</tr>";
}
echo"</table>
<a href='users.php?type=3'>Добавить пользователя</a>&nbsp;&nbsp;
<a href='users.php?type=5'>Добаить кармы</a>&nbsp;&nbsp;
<a href='users.php?type=7'>Измеить тариф</a";
include('podval.php');

?>