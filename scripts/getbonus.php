<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8" />
</head>
</html>
<?php
include 'bsinchead.php';
//
@include ('bd.php');
    $result = mysql_query("SELECT pAdmin, email, ONLINE FROM accounts WHERE pName='".$_SESSION['login']."'");
    $myrow = mysql_fetch_array($result);
if($myrow['pAdmin'] >= 0)
{
	if($myrow['ONLINE'] == '2')
	{
		exit ("Данная функция недооступна, пока вы находитесь в игре! <a class='alert-link' href='../option'>Назад</a>");
	}
	if($myrow['email'] == '1')
	{
		exit ("Вы уже получали бонус! <a class='alert-link' href='../option'>Назад</a>");
	}
	if($myrow['pAdmin'] == 0)
	{
    	mysql_query ("UPDATE `accounts` SET email = '1', pDonate = pDonate + '50', pDonateALL = pDonateALL + '50' WHERE pName = '".$_SESSION['login']."'");
    	exit ("<div class='alert alert-warning'>Вам зачислено 50 рублей на донат-счет!<a class='alert-link' href='../option'>Назад</a></div>");
	}
	if($myrow['pAdmin'] == 1)
	{
    	mysql_query ("UPDATE `accounts` SET email = '1', pDonate = pDonate + '100', pDonateALL = pDonateALL + '100' WHERE pName = '".$_SESSION['login']."'");
    	exit ("<div class='alert alert-warning'>Вам зачислено 100 рублей на донат-счет!<a class='alert-link' href='../option'>Назад</a></div>");
	}
	if($myrow['pAdmin'] == 2)
	{
    	mysql_query ("UPDATE `accounts` SET email = '1', pDonate = pDonate + '150', pDonateALL = pDonateALL + '150' WHERE pName = '".$_SESSION['login']."'");
    	exit ("<div class='alert alert-warning'>Вам зачислено 150 рублей на донат-счет!<a class='alert-link' href='../option'>Назад</a></div>");
	}
	if($myrow['pAdmin'] == 3)
	{
    	mysql_query ("UPDATE `accounts` SET email = '1', pDonate = pDonate + '200', pDonateALL = pDonateALL + '200' WHERE pName = '".$_SESSION['login']."'");
    	exit ("<div class='alert alert-warning'>Вам зачислено 200 рублей на донат-счет!<a class='alert-link' href='../option'>Назад</a></div>");
	}
	if($myrow['pAdmin'] == 4)
	{
    	mysql_query ("UPDATE `accounts` SET email = '1', pDonate = pDonate + '250, pDonateALL = pDonateALL + '250'' WHERE pName = '".$_SESSION['login']."'");
    	exit ("<div class='alert alert-warning'>Вам зачислено 250 рублей на донат-счет!<a class='alert-link' href='../option'>Назад</a></div>");
	}
	if($myrow['pAdmin'] == 5)
	{
    	mysql_query ("UPDATE `accounts` SET email = '1', pDonate = pDonate + '300', pDonateALL = pDonateALL + '300' WHERE pName = '".$_SESSION['login']."'");
    	exit ("<div class='alert alert-warning'>Вам зачислено 300 рублей на донат-счет!<a class='alert-link' href='../option'>Назад</a></div>");
	}
	if($myrow['pAdmin'] == 6)
	{
    	mysql_query ("UPDATE `accounts` SET email = '1', pDonate = pDonate + '350', pDonateALL = pDonateALL + '350' WHERE pName = '".$_SESSION['login']."'");
    	exit ("<div class='alert alert-warning'>Вам зачислено 350 рублей на донат-счет!<a class='alert-link' href='../option'>Назад</a></div>");
	}

}
include 'bsincbot.php';


?>