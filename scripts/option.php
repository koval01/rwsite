<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<!--<![endif]-->
<head>
<meta charset="utf-8" />
</head>
</html>
<?php
include 'bsinchead.php';
//

if (!isset($_POST['password']) || !isset($_POST['password2']) || !isset($_POST['password3']))
{
	exit ("Введите пароль (4 - 15 символов)! <a class='alert-link' href='../option'>Назад</a>");
	
}

if (isset($_POST['password'])) { $password = $_POST['password']; if ($password == '') { unset($password);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password2'])) { $password2 = $_POST['password2']; if ($password2 == '') { unset($password2);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password3'])) { $password3 = $_POST['password3']; if ($password3 == '') { unset($password3);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную

if(strlen($password2) > 15 || strlen($password2) < 4)
{
	exit ("Введите пароль (4 - 15 символов)! <a class='alert-link' href='../option'>Назад</a>");
}

if($password2 != $password3)
{
	exit ("Пароли не совпадают! <a class='alert-link' href='../option'>Назад</a>");
}

if($password == $password2)
{
	exit ("Старый и новый пароли не должны совпадать! <a class='alert-link' href='../option'>Назад</a>");
}

$password = stripslashes($password);
$password = htmlspecialchars($password);

$password2 = stripslashes($password2);
$password2 = htmlspecialchars($password2);

$Dpassword = strtoupper(hash('sha256', $_POST['password'].'key2212'));
$password2 = strtoupper(hash('sha256', $_POST['password2'].'key2212'));

include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

$result = mysql_query("SELECT pName, pPassword FROM accounts WHERE pName='$_SESSION[login]' LIMIT 1"); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysql_fetch_array($result);

if($myrow['pPassword'] == $Dpassword)
{
	mysql_query ("UPDATE `accounts` SET pPassword = '".$password2."' WHERE pName = '".$_SESSION['login']."'");
	exit ("<div class='alert alert-warning'>Пароль успешно изменен! <a class='alert-link' href='../option'>Назад</a></div>");
}
else
{
	exit ("Старый пароль неверный! <a class='alert-link' href='../option'>Назад</a>");
}


include 'bsincbot.php';


?>