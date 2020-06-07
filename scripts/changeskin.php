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

if (!isset($_POST['newskin']))
{
	exit ("Введите номер скина! <a class='alert-link' href='../option'>Назад</a>");
}

if (isset($_POST['newskin'])) { $newskin = $_POST['newskin']; if ($newskin == '') { unset($newskin);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную

if($_SESSION['character_id'] == -1)
{

	if($newskin < '1' || $newskin > '311')
	{
		exit ("Введите номер скина! <a class='alert-link' href='../option'>Назад</a>");
	}

	if($newskin == '0' || $newskin == '6' || $newskin == '191' || $newskin == '285' || $newskin == '286' || $newskin == '287' || $newskin == '284' || $newskin == '283' || $newskin == '281'
	 || $newskin == '280' || $newskin == '300' || $newskin == '301' || $newskin == '302' || $newskin == '311' || $newskin == '309' || $newskin == '24' || $newskin == '274' || $newskin == '80'
	  || $newskin == '81' || $newskin == '288')
	{
		exit ("Данный скин запрещен! <a class='alert-link' href='../option'>Назад</a>");
	}

	include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

	$result = mysql_query("SELECT `ONLINE`,`pDonate` FROM accounts WHERE pName = '".$_SESSION['login']."'");
	$qwr = mysql_fetch_array($result);

	if($qwr['ONLINE'] == '2')
	{
		exit ("Данная функция недооступна, пока вы находитесь в игре! <a class='alert-link' href='../option'>Назад</a>");
	}

	if($qwr['pDonate'] < '20')
	{
		if($qwr['pDonate'] < '20')
		{
			exit ("Недостаточно средств для выполнения операции! <a class='alert-link' href='../option'>Назад</a>");
		}
	}

    mysql_query ("UPDATE `accounts` SET pSkin = '".$newskin."', pDonate = pDonate - '20' WHERE pName = '".$_SESSION['login']."'");
	//$_SESSION['pSkin'] = $newskin;
	exit ("<div class='alert alert-warning'>Скин ".$_SESSION['pSkin']." изменен на ".$newskin." для игрока ".$_SESSION['login']." успешно! <a class='alert-link' href='../option.php'>Назад</a></div>");

}
else
{

	if($newskin < '1' || $newskin > '311')
	{
		exit ("Введите номер скина! <a class='alert-link' href='../option'>Назад</a>");
	}

	if($newskin == '0' || $newskin == '6' || $newskin == '191' || $newskin == '285' || $newskin == '286' || $newskin == '287' || $newskin == '284' || $newskin == '283' || $newskin == '281'
	 || $newskin == '280' || $newskin == '300' || $newskin == '301' || $newskin == '302' || $newskin == '311' || $newskin == '309' || $newskin == '24' || $newskin == '274' || $newskin == '80'
	  || $newskin == '81' || $newskin == '288')
	{
		exit ("Данный скин запрещен! <a class='alert-link' href='../option'>Назад</a>");
	}

	include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

	$result = mysql_query("SELECT `ONLINE`,`pDonate` FROM accounts WHERE pName = '".$_SESSION['login']."'");
	$qwr = mysql_fetch_array($result);

	if($qwr['ONLINE'] == '2')
	{
		exit ("Данная функция недооступна, пока вы находитесь в игре! <a class='alert-link' href='../option'>Назад</a>");
	}

	if($qwr['pDonate'] < '20')
	{
		if($qwr['pDonate'] < '20')
		{
			exit ("Недостаточно средств для выполнения операции! <a class='alert-link' href='../option'>Назад</a>");
		}
	}

    mysql_query ("UPDATE `accounts` SET pSkin = '".$newskin."', pDonate = pDonate - '20' WHERE pName = '".$_SESSION['login']."'");
	//$_SESSION['pSkin'] = $newskin;
	exit ("<div class='alert alert-warning'>Скин ".$_SESSION['pSkin']." изменен на ".$newskin." для игрока ".$_SESSION['login']." успешно! <a class='alert-link' href='../option.php'>Назад</a></div>");

}
include 'bsincbot.php';


?>