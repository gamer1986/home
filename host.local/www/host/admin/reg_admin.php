<?php
session_start();

//Заносим значения, переданные методом POST в переменные:
//Заносим введенный пользователем логин в переменную $login, если он пустой - уничтожаем переменную:
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
//Заносим введенный пользователем пароль в переменную $password, если он пустой - уничтожаем переменную:
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//Если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт:
if (empty($login) or empty($password))
{
exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля! <meta http-equiv='refresh' content='4;URL=index.php'>");
}
//Если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали. Удаляем лишние пробелы:
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//Подключаемся к базе:
$login = trim($login);
$password = trim($password);
//Файл db.php должен быть в той же папке, что и все остальные. Если это не так, то просто измените путь:
include ("db.php");
//Извлекаем из базы все данные о пользователе с введенным логином, access должен быть равен yes:
//$result = mysql_query("SELECT * FROM users WHERE login='$login' AND access='yes'");
//Строка для администраторов:
$result = mysql_query("SELECT * FROM admins WHERE login='$login' AND password='$password'");
//Если пользователя с такими данными не существует:
$myrow = mysql_fetch_array($result);
if (empty($myrow['password']))
{
exit ("Извините, введённый вами login или пароль неверный. <meta http-equiv='refresh' content='2;URL=index.php'>");
}
else {
//Если существует, то сверяем пароли:
if ($myrow['password']==$password) {
//Если пароли совпадают, то запускаем пользователю сессию. Можете его поздравить - он вошел!
//Эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь: 
$_SESSION['login']=$myrow['login']; 
$_SESSION['id']=$myrow['id'];

//Следующие строки предназначены исключительно для авторизации пользователей:
//Присваиваем переменной $mac значение МАС-адреса пользователя, которое мы недавно извлекли из базы данных:
$mac = $myrow['mac'];
//Заносим значение МАС-адреса в таблицу Action:
mysql_query ("INSERT INTO action (mac) VALUES ('$mac')");
echo "Вы успешно авторизировались! <meta http-equiv='refresh' content='2;URL=index.php'>";
}
else {
//Если пароли не сошлись:
exit ("Извините, введённый вами login или пароль неверный.<meta http-equiv='refresh' content='2;URL=index.php'>");
}
}
?>