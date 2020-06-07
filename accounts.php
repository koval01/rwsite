<?php
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
<meta charset="utf-8" />

<title>RW Project - Насколько много их тут?</title>
<meta content="Всегда рады вас видеть. Мы лучший проект в sаmp" name="description" />
<meta content="" property="og:image" />
<meta content="Всегда рады вас видеть. Мы лучший проект в sаmp" property="og:description" />
<meta content="RW Project" property="og:site_name" />
<meta content="website" property="og:type" />
<meta content="telephone=no" name="format-detection" />
<meta http-equiv="x-rim-auto-match" content="none">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" href="libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
<link rel="stylesheet" href="libs/font-awesome-4.2.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="libs/fancybox/jquery.fancybox.css" />
<link rel="stylesheet" href="libs/owl-carousel/owl.carousel.css" />
<link rel="stylesheet" href="libs/countdown/jquery.countdown.css" />
<link rel="stylesheet" href="css/fonts.css" />
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="css/media.css" />
<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<?php @include ('layout/header.php'); if(isset($_SESSION['login'])) : ?>
<?php
if ($_SESSION['pAdmin'] < '3')
{
	echo ("<div class='alert alert-danger'>Данный раздел закрыт!</div>"); 
}
else
{
	echo ('<div class="container">
	<div class="row">
	<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
	<div class="panel-heading">Аккаунты игроков RW Project</div>
	

	<div class="panel-body">');
	echo ('
		<form method="get" class="navbar-form navbar-right" role="search">
 		<div class="form-group">
  	    <input type="text" class="form-control" name="search_adm"  placeholder="Поиск">
  		</div>
  		<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
  		<p>*Искать можно по Нику, Адм. Нику и ID аккаунта</p>
		</form>
		<p>*Для детального просмотра аккаунта, кликните по нику в таблице.</p>
		</div>

		');
	
	@include ("scripts/bd.php");
	
	echo('<table class="table"><tr><th>ID</th><th>Статус</th><th>LVL Игрока</th><th>VIP</th><th>Донат-Счет</th><th>Ник игрока</th><th>Пол</th><th>ID Скина</th><th>Адм. Ник</th><th>Бонус</th><th>Активность</th></tr>');
	
	if(!empty($_GET['search_adm'])) 
	{
		$search = mysql_real_escape_string($_GET['search_adm']);
		$result = mysql_query("SELECT * FROM accounts WHERE `pName` LIKE '%".$search."%' OR `ID` LIKE '%".$_GET['search_adm']."%' OR `pAdminName` LIKE '%".$_GET['search_adm']."%'");
	}
	else
	{
		$result = mysql_query("SELECT * FROM accounts");
	}
	$qwr = mysql_fetch_array($result);
	
	do
	{


		if($qwr != null){
		    
			echo("<tr><td>");
			echo((int)$qwr['ID']);
			echo("</td><td>");
			if((int)$qwr['ONLINE'] == 0) echo("Оффлайн");
			if((int)$qwr['ONLINE'] == 2) echo("Онлайн");
			echo("</td><td>");
			echo((int)$qwr['pLevel']);
			echo("</td><td>");
			if((int)$qwr['pVip'] == 0) echo("Нет");
			if((int)$qwr['pVip'] == 1) echo("Да");
			echo("</td><td>");
			echo((int)$qwr['pDonate']);
			echo("</td><td>");
			echo("<a href='/view?u=".(string)$qwr['pName']."'>".(string)$qwr['pName']."</a>");
			echo("</td><td>");
			if((int)$qwr['pSex'] == 1) echo("Мужчина");
			if((int)$qwr['pSex'] == 2) echo("Женщина");
			echo("</td><td>");
			echo((int)$qwr['pSkin']);
			echo("</td><td>");
			if((string)$qwr['pAdminName'] == Null) echo("Нет");
			if((string)$qwr['pAdminName'] != Null) echo((string)$qwr['pAdminName']);
			echo("</td><td>");
			if((int)$qwr['email'] == 0) echo("Неполучен");
			if((int)$qwr['email'] == 1) echo("Получен");
			echo("</td><td>");
			echo((string)$qwr['Date']);
			echo("</tr>");
			
		}
	}
	while($qwr = mysql_fetch_array($result));
	echo ('</table>');
}
?>

</div>
</div>
</div>
</div>
</div>



<?php else : ?>
<div class="alert alert-danger">Выполните вход через сайт!</div>
<?php endif ; ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>