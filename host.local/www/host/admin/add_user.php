<?
session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);}}
if (isset($_POST['password'])) { $password = $_POST['password']; if ($password == '') { unset($password);} }
if (isset($_POST['balance'])) { $balance = $_POST['balance']; if ($balance == '') { unset($balance);} }
if (isset($_POST['mac'])) { $mac = $_POST['mac']; if ($mac == '') { unset($mac);} }

include ("db.php");
if (empty($_SESSION['id']))
{
exit ("NO ADMIN! <meta http-equiv='refresh' content='4;URL=index.php'>"); 
}


if (empty($login) or empty($password) or empty($balance) or empty($mac))
{
exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля! <meta http-equiv='refresh' content='4;URL=index.php'>");
}

$result0 = mysql_query("SELECT id FROM users WHERE login='$login' OR mac='$mac'"); #Проверяем есть ли пользоватеди на этом девайсе


if (mysql_num_rows($result0) > 0) {
echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
exit ("Login или MAC заняты");
}

$result = mysql_query ("INSERT INTO users (login, password, balance, mac, access) VALUES ('$login','$password','$balance','$mac','yes')");
if 
($result == 'true') 
{echo "Пользователь добавлен";

echo "<meta http-equiv='refresh' content='4;URL=index.php'>";
}


else 
{
echo "Пользователь не добавлен";
echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
}
?>