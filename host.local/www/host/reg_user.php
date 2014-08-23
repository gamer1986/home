<?php
session_start();
//Заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную:
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
//Заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную:
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//Если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт:
if (empty($login) or empty($password))
//Если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали (мало ли, что люди могут ввести):
{
exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля! <meta http-equiv='refresh' content='4;URL=index.php'>");
}
//Удаляем лишние пробелы:
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//Подключаемся к базе:  
$login = trim($login);
$password = trim($password);

//Подключаем файл соединения с базой данных: 
include ("admin/db.php");

//Извлекаем из базы все данные о пользователе с введенным логином и access должен быть равен yes: 
$result = mysql_query("SELECT * FROM users WHERE login='$login' AND access='yes'");

//Если пользователя с такими данными не существует:
$myrow = mysql_fetch_array($result);
if (empty($myrow['password']))
{
exit ("Извините, введённый вами login или пароль неверный. <meta http-equiv='refresh' content='2;URL=index.php'>");
}
else {

//Если существует, то сверяем пароли: 
	if ($myrow['password']==$password) {
//Если пароли совпадают, то запускаем пользователю сессию: 
		$_SESSION['login']=$myrow['login'];
//Эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь:  
		$_SESSION['id']=$myrow['id'];
//Присваиваем переменной mac значение МАС-адреса пользователя: 
		$mac = $myrow['mac'];
//Заносим значение МАС-адреса в таблицу action: 
		mysql_query ("INSERT INTO action (mac) VALUES ('$mac')");
echo "Вы успешно авторизировались! <meta http-equiv='refresh' content='2;URL=index.php'>";
}
else {
//Если пароли не сошлись:
exit ("Извините, введённый вами login или пароль неверный.<meta http-equiv='refresh' content='2;URL=index.php'>");
}
}

?>