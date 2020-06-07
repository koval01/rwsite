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

<?php
if($_SESSION['login'] != Null) echo("<title>RW Project - аккаунт ".$_GET['u']."</title>");
else echo("<title>RW Project - Авторизуйтесь</title>") ?>
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
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <style>
   .img {
    text-align: center; /* Выравнивание по центру */ 
   }
   .cytataLK {
       font-size: 16px;
   }
  </style>
</head>
<body>
<?php 
@include ('layout/header.php');
@include ('scripts/bd.php');
    $result = mysql_query("SELECT ID, ONLINE, pLevel, uniqIP, pHealthC, pSex, pExp, pCash, pBank, pAdminName, pHelperName, pPame, pAdmin, pHunger, pThrist, pEnergy, pRadiation, pTemperature, Date, pDonate, pDonateALL, pMaxCars, pAJobSec, pAJobSec2, pAJobSec3, pHelper, pCode, pKills, pDeaths, email, pAdminCode, pName FROM accounts WHERE pName='".$_GET['u']."'"); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysql_fetch_array($result);
if(isset($_SESSION['login']) && $_SESSION['pAdmin'] >= '4' && $_GET['u'] != 'John_Be' && $_GET['u'] != 'RWSystem' && $myrow['pName'] != Null) : ?>

<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<?php echo("<div class='panel-heading'>Аккаунт - ".$_GET['u']."</div>"); ?>
<div class="panel-body">
    <?php echo("<center><h4>Информация о аккаунте игрока ".$_GET['u']."</h4></center>"); ?>
    <center><h5>RW Project</h5></center>
    <div class="col-md-6">
    <div class="well">
    <?php
    echo("<span class='text-mute-lk'>НикНейм:</span> <span class='text-st-gr'>".$myrow['pName']."</span><br>");
    echo("<span class='text-mute-lk'>Номер аккаунта:</span> <span class='text-st-gr'>".$myrow['ID']."</span><br>");
    if($myrow['ONLINE'] == 2) echo("<span class='text-mute-lk'>Статус игрока:</span> <span class='text-st-gr'>Онлайн</span><br>");
    if($myrow['ONLINE'] == 0) echo("<span class='text-mute-lk'>Статус игрока:</span> <span class='text-st-gr'>Оффлайн</span><br>");
    if($myrow['pAdmin'] >= 6) echo("<span class='text-mute-lk'>Статус (должность):</span> <span class='text-st-gr'>Разработчик</span><br>");
    if($myrow['pAdmin'] == 5) echo("<span class='text-mute-lk'>Статус (должность):</span> <span class='text-st-gr'>Управляющий</span><br>");
    if($myrow['pAdmin'] == 4) echo("<span class='text-mute-lk'>Статус (должность):</span> <span class='text-st-gr'>Ст. Администратор</span><br>");
    if($myrow['pAdmin'] == 3) echo("<span class='text-mute-lk'>Статус (должность):</span> <span class='text-st-gr'>Администратор</span><br>");
    if($myrow['pAdmin'] == 2) echo("<span class='text-mute-lk'>Статус (должность):</span> <span class='text-st-gr'>Модератор</span><br>");
    if($myrow['pAdmin'] == 1) echo("<span class='text-mute-lk'>Статус (должность):</span> <span class='text-st-gr'>Помощник</span><br>");
    if($myrow['pAdmin'] == 0) echo("<span class='text-mute-lk'>Статус (должность):</span> <span class='text-st-gr'>Игрок</span><br>");
    echo("<span class='text-mute-lk'>Игровой уровень:</span> <span class='text-st-gr'>".$myrow['pLevel']."</span><br>");
    if($myrow['pCode'] != Null) echo("<span class='text-mute-lk'>Защитный код:</span> <span class='text-st-gr'>Да</span><br>");
    if($myrow['pCode'] == Null) echo("<span class='text-mute-lk'>Защитный код:</span> <span class='text-st-gr'>Нет</span><br>");
    echo("<span class='text-mute-lk'>Максимум Т\С:</span> <span class='text-st-gr'>".$myrow['pMaxCars']."</span><br>");
    echo("<span class='text-mute-lk'>Донат-счет:</span> <span class='text-st-gr'>".$myrow['pDonate']."</span><br>");
    echo("<span class='text-mute-lk'>Пополнение донат-счета за все время:</span> <span class='text-st-gr'>".$myrow['pDonateALL']."</span><br>");
    if($myrow['email'] != 0) echo("<span class='text-mute-lk'>Стартовый бонус:</span> <span class='text-st-gr'>Получен</span><br>");
    if($myrow['email'] == 0) echo("<span class='text-mute-lk'>Стартовый бонус:</span> <span class='text-st-gr'>Не получен</span><br>");
    echo("<span class='text-mute-lk'>Последний вход с IP:</span> <span class='text-st-gr'>".$myrow['uniqIP']."</span><br>");
    echo("<span class='text-mute-lk'>Последняя активность:</span> <span class='text-st-gr'>".(string)$myrow['Date']."</span>");
    ?>
    </div>
    </div>
    <div class="col-md-6">
    <div class="well">
    <?php
    echo("<span class='text-mute-lk'>HP игрока:</span> <span class='text-st-gr'>".$myrow['pHealthC']."</span><br>");
    if($myrow['pSex'] == 1) echo("<span class='text-mute-lk'>Пол Игрока:</span> <span class='text-st-gr'>Мужчина</span><br>");
    if($myrow['pSex'] == 2) echo("<span class='text-mute-lk'>Пол Игрока:</span> <span class='text-st-gr'>Женщина</span><br>");
    echo("<span class='text-mute-lk'>EXP игрока:</span> <span class='text-st-gr'>".$myrow['pExp']."</span><br>");
    echo("<span class='text-mute-lk'>Фишек:</span> <span class='text-st-gr'>".$myrow['pCash']."</span><br>");
    echo("<span class='text-mute-lk'>Денег у Банкира:</span> <span class='text-st-gr'>".$myrow['pBank']."</span><br>");
    echo("<span class='text-mute-lk'>Убийств:</span> <span class='text-st-gr'>".$myrow['pKills']."</span><br>");
    echo("<span class='text-mute-lk'>Смертей:</span> <span class='text-st-gr'>".$myrow['pDeaths']."</span><br>");
    if($myrow['pHunger'] <= 30) echo("<span class='text-mute-lk'>Сытость персонажа:</span> <span class='text-st-gr'>Голоден (Меньше 30%)</span><br>");
    if(!$myrow['pHunger'] <= 30) echo("<span class='text-mute-lk'>Сытость персонажа:</span> <span class='text-st-gr'>".(int)$myrow['pHunger']."%</span><br>");
    if($myrow['pHunger'] <= 30) echo("<span class='text-mute-lk'>Сытость персонажа:</span> <span class='text-st-gr'>Хочет пить (Меньше 30%)</span><br>");
    if(!$myrow['pHunger'] <= 30) echo("<span class='text-mute-lk'>Жажда персонажа:</span> <span class='text-st-gr'>".(int)$myrow['pThrist']."%</span><br>");
    echo("<span class='text-mute-lk'>Енергия:</span> <span class='text-st-gr'>".(int)$myrow['pEnergy']."%</span><br>");
    echo("<span class='text-mute-lk'>Радиация:</span> <span class='text-st-gr'>".(int)$myrow['pRadiation']."%</span><br>");
    if($myrow['pTemperature'] >= 90) echo("<span class='text-mute-lk'>Температура персонажа:</span> <span class='text-st-gr'>Отлично</span><br>");
    if($myrow['pTemperature'] <= 89) echo("<span class='text-mute-lk'>Температура персонажа:</span> <span class='text-st-gr'>Нормально</span><br>");
    if($myrow['pTemperature'] <= 30) echo("<span class='text-mute-lk'>Температура персонажа:</span> <span class='text-st-gr'>Плохо</span><br>");
    ?>
    </div>
    </div>
    <div class="col-md-5">
    <div class="well">
    <?php
    if($myrow['pAdmin'] > 0)
    {
        if($myrow['pAdminName'] == Null) echo("<span class='text-mute-lk'>Администраторский НикНейм:</span> <span class='text-st-gr'>Нет</span><br>");
        if(!$myrow['pAdminName'] == Null) echo("<span class='text-mute-lk'>Администраторский НикНейм:</span> <span class='text-st-gr'>".$myrow['pAdminName']."</span><br>");
        $aJobSecF = $myrow['pAJobSec'] / 60 / 60;
        $aJobSecF1 = mb_strimwidth ($aJobSecF, 0, 5);
        $aJobSec2F = $myrow['pAJobSec2'] / 60 / 60;
        $aJobSec2F1 = mb_strimwidth ($aJobSec2F, 0, 5);
        echo("<span class='text-mute-lk'>Время на посте администратора:</span> <span class='text-st-gr'>".$aJobSecF1." Часов</span><br>");
        echo("<span class='text-mute-lk'>Время игры вне поста администратора:</span> <span class='text-st-gr'>".$aJobSec2F1." Часов</span><br>");
        if($myrow['pAdminCode'] == Null) echo("<span class='text-mute-lk'>Админ-Код:</span> <span class='text-st-gr'>Нет</span><br>");
        if(!$myrow['pAdminCode'] == Null) echo("<span class='text-mute-lk'>Админ-Код:</span> <span class='text-st-gr'>".$myrow['pAdminCode']."</span><br>");
    }
    if($myrow['pHelper'] > 0)
    {
        if($myrow['pHelperName'] == Null) echo("<span class='text-mute-lk'>Хелперский НикНейм:</span> <span class='text-st-gr'>Нет</span><br>");
        if(!$myrow['pHelperName'] == Null) echo("<span class='text-mute-lk'>Хелперский НикНейм:</span> <span class='text-st-gr'>".$myrow['pHelperName']."</span><br>");
        $aJobSec3F = $myrow['pAJobSec3'] / 60 / 60;
        $aJobSec3F1 = mb_strimwidth ($aJobSec3F, 0, 5);
        echo("<span class='text-mute-lk'>Время на посте хелпера:</span> <span class='text-st-gr'>".$aJobSec3F1." Часов</span><br>");
        echo("<span class='text-mute-lk'>Уровень хелпера:</span> <span class='text-st-gr'>".$myrow['pHelper']."</span><br>");
    }
    if(!$myrow['pHelper'] > 0 and !$myrow['pAdmin'] > 0)
    {
        echo("Блок пустой поскольку игрок не администратор и не хелпер.");
    }
    ?>
    </div>
    </div>
<div class="col-md-7">
    <div class="well">
        <center><p>РП Биография</p></center>
        <?php 
        if(strlen((string)$myrow['pPame']) >= 1000)
        {
            $pameReplace1 = mb_strimwidth ((string)$myrow['pPame'], 0, 1000);
            echo("<center><span class='text-st-gr'>".$pameReplace1."...</span></center>"); 
        }
        else
        {
            if($myrow['pPame'] == Null) echo("<center><span class='text-st-gr'>Отсутствует .</span></center>");
            if(!$myrow['pPame'] == Null) echo("<center><span class='text-st-gr'>".(string)$myrow['pPame']."</span></center>");  
        }
        ?>
    </div>
</div>
<div class="col-md-12">
    <div class="well">
        <center><h5>Логи</h5></center><br>
        <script src="/js/owl.carousel.min.js"></script>
        <script src="/js/jquery.fancybox.min.js"></script>
        <script src="/js/scrllscript.js"></script>
        <center><h6>A-Logs</h6></center><br>
        <?php
        echo('<table class="table" id="scrollToALogshtml"><tr><th>Ситуация</th><th>Дата</th><th>Ник администратора</th><th>Ник игрока</th><th>Описание</th></tr>');
		$result = mysql_query("SELECT * FROM AdminLog WHERE `Name` LIKE '%".$_GET['u']."%' OR `TargetNAME` LIKE '%".$_GET['u']."%' ORDER BY Date DESC LIMIT 1000");
		$qwr = mysql_fetch_array($result);
    	do
        {
        	if($qwr != null){
        		echo("<tr><td>");
    			echo($qwr['Situation']);
    			echo("</td><td>");
    			echo((string)$qwr['Date']);
    			echo("</td><td>");
    			if((string)$qwr['Name'] == $_GET['u']) echo((string)$qwr['Name']);
    			if((string)$qwr['Name'] != $_GET['u']) echo("<a href='/view?u=".(string)$qwr['Name']."'>".(string)$qwr['Name']."</a>");
    			echo("</td><td>");
    			if((string)$qwr['TargetNAME'] == $_GET['u']) echo((string)$qwr['TargetNAME']);
    			if((string)$qwr['TargetNAME'] != $_GET['u']) echo("<a href='/view?u=".(string)$qwr['TargetNAME']."'>".(string)$qwr['TargetNAME']."</a>");
    			echo("</td><td>");
    			echo($qwr['TEXT']);
    			echo("</tr>");
        	}
        }
    	while($qwr = mysql_fetch_array($result)); 
    	echo ('</table>');
        ?>
        <center><h6>E-Logs</h6></center><br>
        <?php
        echo('<table class="table" id="scrollToELogshtml"><tr><th>Ситуация</th><th>Дата</th><th>Ник игрока</th><th>IP Адрес</th></tr>');
		$result = mysql_query("SELECT * FROM EnterLog WHERE `Name` LIKE '%".$_GET['u']."%' ORDER BY Date DESC LIMIT 1000");
		$qwr = mysql_fetch_array($result);
    	do
        {
        	if($qwr != null){
        		echo("<tr><td>");
    			if((string)$qwr['Situation'] == "login") echo("Зашел");
    			if((string)$qwr['Situation'] == "disconnect:Вышел") echo("Вышел");
    			if((string)$qwr['Situation'] == "disconnect:Кик") echo("Вышел (Кик)");
    			if((string)$qwr['Situation'] == "disconnect:Вылетел") echo("Вышел (Вылетел)");
    			echo("</td><td>");
    			echo((string)$qwr['Date']);
    			echo("</td><td>");
    			if((string)$qwr['Name'] == $_GET['u']) echo((string)$qwr['Name']);
    			if((string)$qwr['Name'] != $_GET['u']) echo("<a href='/view?u=".(string)$qwr['Name']."'>".(string)$qwr['Name']."</a>");
    			echo("</td><td>");
    			if((string)$qwr['TEXT'] == Null) echo("-");
    			if((string)$qwr['TEXT'] != Null) echo((string)$qwr['TEXT']);
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
</div>
</div>
</div>
<br><center><p>Made by RW Project Developers Team. RW Project © 2019 - 2020</p></center>


<?php else : ?>
<?php
    if(!$_SESSION['pAdmin'] >= '4') echo("<div class='alert alert-danger'>У вас нет доступа к этому разделу!</div>");
    if($_SESSION['pAdmin'] == '0') echo("<div class='alert alert-danger'>Вы не администратор!</div>");
    if(!isset($_SESSION['login'])) echo("<div class='alert alert-danger'>Выполните вход через сайт!</div>");
    if($_GET['u'] == 'John_Be') echo("<div class='alert alert-danger'>Вы не можете посмотреть информацию об этом аккаунте!</div>");
    if($_GET['u'] == 'RWSystem') echo("<div class='alert alert-danger'>RWSystem это технический аккаунт, нельзя посмотреть информацию о нём.</div>");
    if($myrow['pName'] == Null) echo("<div class='alert alert-danger'>Аккаунт не найден!</div>");
?>
<?php endif ; ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<!-- t.me/koval_yaroslav vk.com/koval.yaroslav --->