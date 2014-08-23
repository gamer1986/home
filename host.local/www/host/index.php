
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf8" />
<meta name="author" content="Interline" />
<link href="style.css" rel="stylesheet" type="text/css" />

<title>WIFI</title>
</head>

<body>
<?
if (!empty($_SESSION['id']))
{
echo "Интернет включен";
}
else
{
echo "<form action='reg_user.php' method='post' enctype=multipart/form-data>";
echo "<fieldset>";
echo "<legend>Введите логин и пароль</legend>";
echo "<p><label for='login'>Логин</label> <input type='text' id='login' name='login' /></p>";
echo "<p><label for='password'>Пароль</label> <input type='password' id='password' name='password' /><br /></p>";
echo "<p class='submit'><input type='submit' value='Отправить' /></p>";
echo "</fieldset>";
echo "</form>";
}
?> 

</body>
</html>