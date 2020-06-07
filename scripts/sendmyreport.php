<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8" />
</head>
</html>
<?php
include 'bsinchead.php';
if(isset($_POST['sendreportrr'])) { $report = $_POST['sendreportrr']; } 
include ("bd.php");
$getresult = mysql_query("SELECT Name FROM RateSiteRW WHERE Name='".$_SESSION['login']."'"); 
$qget = mysql_fetch_array($getresult);
if($qget['Name'] == Null)
{
	if(strlen((string)$report) == 0)
	{
		mysql_query("INSERT INTO `RateSiteRW` (`Rate`, `Name`) VALUES ('BClose', '".$_SESSION['login']."')");
		exit("<div class='alert alert-warning'>Блок убран. <a class='alert-link' href='../option'>Назад</a></div>");
	}
	if(strlen((string)$report) > 0)
	{
		mysql_query("INSERT INTO `RateSiteRW` (`Rate`, `Name`) VALUES ('".$report."', '".$_SESSION['login']."')");
		exit("<div class='alert alert-warning'>Сообщение '".$report."' успешно отправлено! <a class='alert-link' href='../option'>Назад</a></div>");
	}
}
else
{
	exit("<div class='alert alert-warning'>Вы уже отправляли сообщение или убрали блок его отправки! <a class='alert-link' href='../option'>Назад</a></div>");
}
?>