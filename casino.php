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

<title>RW Project - Казино</title>
<meta content="RW Project - Казино" name="description" />
<meta content="" property="og:image" />
<meta content="RW Project - Казино" property="og:description" />
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
  <style>
   .img {
    text-align: center; /* Выравнивание по центру */ 
   }
  </style>
</head>
<body>
<?php 
@include ('layout/header.php');
//include 'scripts/bsinchead.php';

if(isset($_SESSION['login'])) : ?>


<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Казино</div>
<script>
  casinogo.onclick = function() {
    div.before('<p>Привет</p>', document.createElement('hr'));
  };
</script>
<div class="panel-body">
<?php
@include ('scripts/bd.php');
$result = mysql_query("SELECT ID, ONLINE, pLevel, uniqIP, pHealthC, pSex, pExp, pCash, pBank, pAdminName, pHelperName, pPame, pAdmin, pHunger, pThrist, pEnergy, pRadiation, pTemperature, Date, pDonate, pDonateALL, pMaxCars, pAJobSec, pAJobSec2, pAJobSec3, pHelper, pCode, pKills, pDeaths, email, pAdminCode FROM accounts WHERE pName='".$_SESSION['login']."'"); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysql_fetch_array($result);
if (!isset($_POST['stavka']))
{
    echo('<div class="alert alert-info">Укажите сумму ставки.</div>');
}
if (isset($_POST['stavka']))
{
    if($myrow['ONLINE'] == '2') echo('<div class="alert alert-danger">Играть можно только когда вы оффлайн на сервере!</div>');
    if($myrow['pLevel'] < '3') echo('<div class="alert alert-danger">Доступно с 3-го уровня!</div>');
    if($myrow['pDonate'] < $_POST['stavka']) echo('<div class="alert alert-danger">Вы поставили больше чем у вас есть!</div>');
    if($myrow['pDonate'] >= $_POST['stavka'])
    {
        $player = rand(1,6);  
        $player2 = rand(1,6);
        echo("<div class='alert alert-info'>Результат: <b>".$player.":".$player2."</b></div>");
        if($player > $player2)
        {
            $win = $_POST['stavka'] * 2;
            echo("<div class='alert alert-info'>Вы выиграли. <b>+".(int)$win."</b></div>");
            mysql_query ("UPDATE `accounts` SET pDonate = pDonate + '".(int)$win."', pDonateALL = pDonateALL + '".(int)$win."'  WHERE pName = '".$_SESSION['login']."'");
            mysql_query("INSERT INTO `AdminLog` (`Situation`,`Name`,`TargetNAME`,`TEXT`) VALUES ('Casino (WEB)','".$_SESSION['login']."','".$_SESSION['login']."','Победа. +".(int)$win."')");
        }
        if($player2 > $player)
        {
            echo("<div class='alert alert-info'>Вы проиграли. <b>-".(int)$_POST['stavka']."</b></div>");
            mysql_query ("UPDATE `accounts` SET pDonate = pDonate - '".(int)$_POST['stavka']."'  WHERE pName = '".$_SESSION['login']."'");
            mysql_query("INSERT INTO `AdminLog` (`Situation`,`Name`,`TargetNAME`,`TEXT`) VALUES ('Casino (WEB)','".$_SESSION['login']."','".$_SESSION['login']."','Проиграш. -".(int)$_POST['stavka']."')");
        }
        if($player2 == $player)
        {
            echo("<div class='alert alert-info'><b>Ничья</b></div>");
            mysql_query("INSERT INTO `AdminLog` (`Situation`,`Name`,`TargetNAME`,`TEXT`) VALUES ('Casino (WEB)','".$_SESSION['login']."','".$_SESSION['login']."','Ничья.')");
        }
    }
}
$result2 = mysql_query("SELECT pDonate FROM accounts WHERE pName='".$_SESSION['login']."'"); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow2 = mysql_fetch_array($result2);
echo('
<form id="nameform" class="form-horizontal" role="form" method="POST" action="casino">
        <h4 class="img">Казино</h4>
        <input id = "NewSkin" type="text" class="form-control" name="stavka" placeholder="Ставка" required></br>
            <font color="white">С вашего донат-счета будет списана указаная сума рублей, Вы принимаете условия оплаты?</font>
            <div class="checkbox">
                <label>
                    <input type="checkbox" required><font color="white"> Принимаю условия оплаты.</font>
                </label>
            </div></br>
        <button type="submit" id="casinogo" class="btn btn-success">Играть</button><br><br>
        Мой донат-счет: <b>'.$myrow2["pDonate"].'</b>
</form>
');
echo("<center><h6>Истрия (Последние 30 записей)</h6></center>");
echo('<table class="table" id="scrollToALogshtml"><tr><th>Дата игры</th><th>Результат</th></tr>');
		$result = mysql_query("SELECT * FROM AdminLog WHERE `Name` LIKE '%".$_SESSION['login']."%' AND `Situation` LIKE '%Casino (WEB)%' ORDER BY Date DESC LIMIT 30");
		$qwr = mysql_fetch_array($result);
    	do
        {
        	if($qwr != null){
        		echo("<tr><td>");
    			echo((string)$qwr['Date']);
    			echo("</td><td>");
    			echo($qwr['TEXT']);
    			echo("</tr>");
        	}
        }
    	while($qwr = mysql_fetch_array($result)); 
    	echo ('</table>');
?>
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