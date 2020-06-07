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

if($_SESSION['character_id'] == -1)
{
	if (!isset($_POST['nicknew']))
	{
		exit ("Введите новое имя аккаунта! <a class='alert-link' href='../option'>Назад</a>");
	}

	if (!isset($_POST['passwordN']))
	{
		exit ("Введите пароль от аккаунта! <a class='alert-link' href='../option'>Назад</a>");
	}

	if (isset($_POST['nicknew'])) { $nicknew = $_POST['nicknew']; if ($nicknew == '') { unset($nicknew);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
	if (isset($_POST['passwordN'])) { $passwordN = $_POST['passwordN']; if ($passwordN == '') { unset($passwordN);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную

	if(strlen($nicknew) < 4 || strlen($nicknew) > 32)
	{
		exit ("Введите другое имя аккаунта! <a class='alert-link' href='../option'>Назад</a>");
	}
	$passwordN= strtoupper(hash('sha256', $passwordN.'key2212'));
	$passwordN = stripslashes($passwordN);
	$passwordN = htmlspecialchars($passwordN);
	$passwordN = trim($passwordN);
	
	include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

	$result = mysql_query("SELECT `ID` FROM `accounts` WHERE `pName` = '".$nicknew."'");
	$qwr = mysql_fetch_array($result);
	if($qwr > 0)
	{
		exit ("Введите другое имя аккаунта! <a class='alert-link' href='../option'>Назад</a>");
	}
	
	$result = mysql_query("SELECT `pPassword`,`pDonate` FROM `accounts` WHERE `pName` = '".$_SESSION['login']."'");
	$qwr = mysql_fetch_array($result);
	if ($qwr['pPassword']==$passwordN) {
		if($qwr['pDonate'] < '20')
		{
			exit ("Недостаточно средств для выполнения операции! <a class='alert-link' href='../option'>Назад</a>");
		}

		mysql_query ("UPDATE `accounts` SET pDonate = pDonate - '20', `pName`='".$nicknew."' WHERE pName = '".$_SESSION['login']."'");
		$_SESSION['login'] = $nicknew;
		exit ("<div class='alert alert-warning'>Ник успешно изменен! Теперь ваш ник - ".$nicknew." <a class='alert-link' href='../option'>Назад</a></div>");
		//exit ("<div class='alert alert-warning'>Ник успешно изменен! <a href='scripts/exit.php'>Выход</a></div>");//class='alert-link' 
	}
	else
	{
		exit ("Не правильно введен пароль! <a class='alert-link' href='../option'>Назад</a>");
	}
}
else
{
	if (!isset($_POST['nicknew']))
	{
		exit ("Введите новое имя аккаунта! <a class='alert-link' href='../option'>Назад</a>");
	}

	if (!isset($_POST['passwordN']))
	{
		exit ("Введите пароль от аккаунта! <a class='alert-link' href='../option'>Назад</a>");
	}

	if (isset($_POST['nicknew'])) { $nicknew = $_POST['nicknew']; if ($nicknew == '') { unset($nicknew);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
	if (isset($_POST['passwordN'])) { $passwordN = $_POST['passwordN']; if ($passwordN == '') { unset($passwordN);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную

	if(strlen($nicknew) < 4 || strlen($nicknew) > 32)
	{
		exit ("Введите другое имя аккаунта! <a class='alert-link' href='../option'>Назад</a>");
	}
	$passwordN= strtoupper(hash('sha256', $passwordN.'key2212'));
	$passwordN = stripslashes($passwordN);
	$passwordN = htmlspecialchars($passwordN);
	$passwordN = trim($passwordN);
	
	include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

	$result = mysql_query("SELECT `ID` FROM `accounts` WHERE `pName` = '".$nicknew."'");
	$qwr = mysql_fetch_array($result);
	if($qwr > 0)
	{
		exit ("Введите другое имя аккаунта! <a class='alert-link' href='../option'>Назад</a>");
	}
	
	$result = mysql_query("SELECT `pPassword`,`pDonate` FROM `accounts` WHERE `pName` = '".$_SESSION['login']."'");
	$qwr = mysql_fetch_array($result);
	if ($qwr['pPassword']==$passwordN) {
		if($qwr['pDonate'] < '20')
		{
			exit ("Недостаточно средств для выполнения операции! <a class='alert-link' href='../option'>Назад</a>");
		}

		mysql_query ("UPDATE `accounts` SET pDonate = pDonate - '20', `pName`='".$nicknew."' WHERE pName = '".$_SESSION['login']."'");
		$_SESSION['login'] = $nicknew;
		exit ("<div class='alert alert-warning'>Ник успешно изменен! Теперь ваш ник - ".$nicknew." <a class='alert-link' href='../option'>Назад</a></div>");
		//exit ("<div class='alert alert-warning'>Ник успешно изменен! <a href='scripts/exit.php'>Выход</a></div>");//class='alert-link' 
	}
	else
	{
		exit ("Не правильно введен пароль! <a class='alert-link' href='../option'>Назад</a>");
	}
}

include 'bsincbot.php';


?>