<?php
session_start();
if (isset($_GET['ld'])) { $ld = $_GET['ld']; if ($ld == '') { unset($ld);}}
if (isset($_GET['del_id'])) { $del_id = $_GET['del_id']; if ($del_id == '') { unset($del_id);}}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf8" />
<meta name="author" content="Interline" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../jquery-1.5.1.min.js"></script>
<title>Админка</title>
</head>
<body>

<?
if (empty($_SESSION['id']))
{
require_once("au_admin_form.php"); 
}

if (isset($_SESSION['id']) AND isset($_SESSION['login']))
{
require_once("menu.php");
}

if (isset($_SESSION['id']) AND isset($ld) AND ($ld==add_u))
{
require_once("add_user_form.php"); 
}

if (isset($_SESSION['id']) AND isset($ld) AND ($ld==list_u))
{
require_once("user_list.php"); 
}

if (isset($del_id))
{ 
require_once("db.php");
mysql_query ("DELETE FROM users WHERE id='$del_id'");
echo "Пользователь удален"; 
}
?>


</body>
</html>