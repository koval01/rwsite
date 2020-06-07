<?php
session_start();
//0 - Отказано;
//1 - Пройдите тест;
//2 - На рассмотрении;
//3 - Активирован;
//4 - Модератор;
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

<title>RW Project - This is home</title>
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
<?php 
@include ('layout/header.php');

if(isset($_SESSION['login'])) : ?>


<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Новости</div>

<div class="panel-body"><?php

@include ('scripts/bd.php');
$result = mysql_query("SELECT pAdmin FROM accounts WHERE ID='".$_SESSION['id']."'"); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysql_fetch_array($result);
$_SESSION['pAdmin']=$myrow['pAdmin'];
if($_SESSION['pAdmin'] >= '3'){
	$query = "SELECT COUNT(ID) FROM accounts WHERE `pAdmin`='2'";
	$return=mysql_query($query);
	$count_records = mysql_fetch_row($return);
	$count_records = $count_records[0];
	$_SESSION['count']= $count_records;
}

if ($_SESSION['pAdmin']=='-1'){
	echo ("<div class='alert alert-warning'>Здравствуйте, ".$_SESSION['login'].".Ваша заявка на рассмотрении.</div>");
}
if ($_SESSION['pAdmin']=='-1'){
	echo ("<div class='alert alert-warning'>Здравствуйте, ".$_SESSION['login'].".Ваш заявка была отклонена. Пожалуйста, старайтесь лучше.</br>Комментарий: ".$myrow['aReason']."</div>");
	
	include('scripts/bd.php');
	//$result = mysql_query("SELECT * FROM users WHERE id=$_SESSION[id]");
	//$res = mysql_fetch_array($result); 
	//echo ("<p>Причина отказа:<br/>"); 
	//echo ("<i>".$res['reporta']."</i>");
}

$playername = str_replace("_", " ", $_SESSION['login']); 

//Никита привет.

if ($_SESSION['pAdmin']=='0'){
	echo ("<div class='alert alert-success'>Здравствуйте, ".$playername.". Вы вошли, как Игрок.</div>");
}
if ($_SESSION['pAdmin']=='1'){
	echo ("<div class='alert alert-success'>Здравствуйте, ".$playername.". Вы вошли, как Помощник.</div>");
}
if ($_SESSION['pAdmin']=='2'){
	echo ("<div class='alert alert-success'>Здравствуйте, ".$playername.". Вы вошли, как Модератор.</div>");
}
if ($_SESSION['pAdmin']=='3'){
	echo ("<div class='alert alert-success'>Здравствуйте, ".$playername.". Вы вошли, как Администратор.</div>");
}
if ($_SESSION['pAdmin']=='4'){
	echo ("<div class='alert alert-success'>Здравствуйте, ".$playername.". Вы вошли, как Старший Администратор.</div>");
}
if ($_SESSION['pAdmin']=='5'){
	echo ("<div class='alert alert-success'>Здравствуйте, ".$playername.". Вы вошли, как Заместитель.</div>");
}
if ($_SESSION['pAdmin']=='6'){
	echo ("<div class='alert alert-success'>Здравствуйте, ".$playername.". Вы вошли, как Разработчик.</div>");
}
if ($_SESSION['pAdmin']=='-1'){
	echo ("<div class='alert alert-success'>Здравствуйте, ".$playername.".Пройдите тест, перед тем как войти в игру.</div>");
}

?>
 <a href='https://rw.q0ttube.com/game_rules'><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i> Правила игры</button></a>
 <a href='https://rw.q0ttube.com/lor'><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-picture"></i> ЛОР</button></a>
 <br>
 <br>
 <p>Ссылки для скачивания</p>
 <a href='https://rw.q0ttube.com/download/GTASanAndreas.zip'><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-floppy-disk"></i> GTA San Andreas</button></a>
 <a href='https://rw.q0ttube.com/download/sa-mp-0.3.7-R4-install.exe'><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-floppy-disk"></i> SAMP</button></a>
 <a href='https://rw.q0ttube.com/download/sl-2-00-install.exe'><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-floppy-disk"></i> Русификатор</button></a>
 <br>
<br/>
<script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>
<!-- VK Widget -->
<div id="vk_groups"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {mode: 4, width: "900", height: "400", color1: '212121', color2: 'FFFFFF', color3: 'FF8800'}, 150537952);
</script>
<?php
@include ('scripts/bd.php');
$resultrate = mysql_query("SELECT Name FROM PromoGoldHost WHERE Name='".$_SESSION['login']."'");
$myrowrate = mysql_fetch_array($resultrate);
//отключенно
if($myrowrate['Name'] == Null && $myrowrate['Name'] != Null) echo("
    <style>
        input[type=text]{
           width:100%;
        }
    </style>
    <center>
    <div class='col-md-10 col-md-offset-1'>
    <div class='col-md-12'>
        <div class='well'>
            <center><h4>Получить бонус от RW Project на хостинге Gold-Host.space</h4></center>
            <form id='nameform' class='form-horizontal' role='form' method='POST' action='scripts/goldhostpromo'>
                <input id = 'getemail' type='text' class='form-control' name='sendreportrr' placeholder='Ваш e-mail на хостинге gold-host.space'></br>
                <br><center><button type='submit' class='btn btn-success'>Отправить</button></center>
                <br><br><center><p>Вам будет начислено 15 рублей на хостинге Gold-Host.space</p></center>
            </form>
        </div>
    </div>
    </center>
");
?>
</div>
</div>
</div>
</div>
</div>



<?php else : ?>
<div class="alert alert-danger">Выполните вход через сайт! <a href="https://rw.q0ttube.com/">На главную</a></div>
<?php endif ; ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>