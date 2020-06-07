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
if($_SESSION['login'] != Null) echo("<title>RW Project - ".$_SESSION['login']."</title>");
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

if(isset($_SESSION['login'])) : ?>


<div class="container">
<div class="row">
<?php
@include ('scripts/bd.php');
$resultrate = mysql_query("SELECT Name FROM RateSiteRW WHERE Name='".$_SESSION['login']."'");
$myrowrate = mysql_fetch_array($resultrate);
if($myrowrate['Name'] == Null) echo("
    <style>
        input[type=text]{
           width:100%;
        }
    </style>
    <center>
    <div class='col-md-10 col-md-offset-1'>
    <div class='col-md-12'>
        <div class='well'>
            <center><h4>Отправить предложение по улучшению сайта</h4></center>
            <form id='nameform' class='form-horizontal' role='form' method='POST' action='scripts/sendmyreport'>
                <input id = 'SendReportSite' type='text' class='form-control' name='sendreportrr' placeholder='Опишите свою идею или предложение'></br>
                <br><center><button type='submit' class='btn btn-success'>Отправить</button></center>
                <br><br><center><p>Если вы хотите убрать это окно, просто отправьте пустую форму. Спасибо.</p></center>
            </form>
        </div>
    </div>
    </center>
");
?>
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Мой аккаунт</div>
<div class="panel-body">
    <center><h4>Информация о аккаунте</h4></center>
    <div class="col-md-6">
    <div class="well">
    <?php
    @include ('scripts/bd.php');
    $result = mysql_query("SELECT ID, ONLINE, pLevel, uniqIP, pHealthC, pSex, pExp, pCash, pBank, pAdminName, pHelperName, pPame, pAdmin, pHunger, pThrist, pEnergy, pRadiation, pTemperature, Date, pDonate, pDonateALL, pMaxCars, pAJobSec, pAJobSec2, pAJobSec3, pHelper, pCode, pKills, pDeaths, email, pAdminCode FROM accounts WHERE pName='".$_SESSION['login']."'"); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysql_fetch_array($result);
    echo("<span class='text-mute-lk'>НикНейм:</span> <span class='text-st-gr'>".$_SESSION['login']."</span><br>");
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
        echo("Блок пустой поскольку вы не администратор и не хелпер.");
    }
    ?>
    </div>
    </div>
    <div class="col-md-7">
    <div class="well">
    <?php
    $selectcyct = rand(1,52);
    echo("<center><h5>Цитата</h5></center>");
    if($selectcyct == 1) echo('<br><center><span class="cytataLK">Капоэйра – это бразильское национальное боевое искусство, основанное на африканских боевых танцах.</span><center>');
    if($selectcyct == 2) echo('<br><center><span class="cytataLK">В этом мире сырье стоит дорого, и энергия стоит дорого, а единственная вещь, которая ничего не стоит, - человеческая жизнь</span><center>');
    if($selectcyct == 3) echo('<br><center><span class="cytataLK">– ... Интересно, а что такое верблюд? Ты знаешь, что за штука верблюд, Блайддиг? – Какая-то разновидность угля, лорд. Кузнецы используют его при изготовлении стали.</span><center>');
    if($selectcyct == 4) echo('<br><center><span class="cytataLK">Nothing captured human interest like human tragedy.</span><center>');
    if($selectcyct == 5) echo('<br><center><span class="cytataLK">"Есть ли смысл в сопротивлении жалкой мухи, когда в роли ее противника выступает паук?"</span><center>');
    if($selectcyct == 6) echo('<br><center><span class="cytataLK">«Книга не слишком серьёзная, легкая, хрустящая и сладкая, как безе»</span><center>');
    if($selectcyct == 7) echo('<br><center><span class="cytataLK">«No good deeds goes unpunished.»</span><center>');
    if($selectcyct == 8) echo('<br><center><span class="cytataLK">«Нельзя помещать себя в центр Вселенной, пока не убедишься наверняка, что ты этого достоин.»</span><center>');
    if($selectcyct == 9) echo('<br><center><span class="cytataLK">«...старость — время жатвы совместных сладостных воспоминаний.»</span><center>');
    if($selectcyct == 10) echo('<br><center><span class="cytataLK">«Кто знает,тот не сомневается, Кто полон милосердия,тот не тревожится. Кто смел,тот не боится.»</span><center>');
    if($selectcyct == 11) echo('<br><center><span class="cytataLK">Тут був Ірмен</span><center>');
    if($selectcyct == 12) echo('<br><center><span class="cytataLK">Настоящий друг — это человек, который выскажет тебе в глаза все, что о тебе думает, а всем скажет, что ты — замечательный человек.</span><center>');
    if($selectcyct == 13) echo('<br><center><span class="cytataLK">Не всегда просит прощения тот, кто виноват. Просит прощения тот, кто дорожит отношениями.</span><center>');
    if($selectcyct == 14) echo('<br><center><span class="cytataLK">Мы в жизни любим только раз, а после ищем лишь похожих.</span><center>');
    if($selectcyct == 15) echo('<br><center><span class="cytataLK">Не тот велик, кто никогда не падал, а тот велик — кто падал и вставал!</span><center>');
    if($selectcyct == 16) echo('<br><center><span class="cytataLK">Симпатия — это когда нравится внешность, влюблённость — когда нравится внешность и характер, а любовь — это когда нравятся даже недостатки.</span><center>');
    if($selectcyct == 17) echo('<br><center><span class="cytataLK">В падающем самолёте нет атеистов.</span><center>');
    if($selectcyct == 18) echo('<br><center><span class="cytataLK">Когда тебе тяжело, всегда напоминай себе о том, что если ты сдашься, лучше не станет.</span><center>');
    if($selectcyct == 19) echo('<br><center><span class="cytataLK">Если хочешь узнать человека, не слушай, что о нём говорят другие, послушай, что он говорит о других.</span><center>');
    if($selectcyct == 20) echo('<br><center><span class="cytataLK">Умей ценить того кто без тебя не может, и не гонись за тем, кто счастлив без тебя!</span><center>');
    if($selectcyct == 21) echo('<br><center><span class="cytataLK">Когда человек действительно хочет чего-то, вся Вселенная вступает в сговор, чтобы помочь этому человеку осуществить свою мечту.</span><center>');
    if($selectcyct == 22) echo('<br><center><span class="cytataLK">Какой бы сильной ни была женщина, она ждет мужчину сильнее себя и не для того, чтобы он ограничивал ей свободу, а для того, чтобы он дал ей право быть слабой.</span><center>');
    if($selectcyct == 23) echo('<br><center><span class="cytataLK">Если Вы стали для кого-то плохим, значит много хорошего было сделано для этого человека.</span><center>');
    if($selectcyct == 24) echo('<br><center><span class="cytataLK">Победи себя и выиграешь тысячи битв.</span><center>');
    if($selectcyct == 25) echo('<br><center><span class="cytataLK">Заведите себе «идиотскую» привычку радоваться неудачам. Это гораздо веселей, чем раздражаться и ныть по любому поводу.</span><center>');
    if($selectcyct == 26) echo('<br><center><span class="cytataLK">Если вы хотите осчастливить весь мир, идите домой и любите свою семью.</span><center>');
    if($selectcyct == 27) echo('<br><center><span class="cytataLK">Нашедший себя теряет зависимость от чужих мнений.</span><center>');
    if($selectcyct == 28) echo('<br><center><span class="cytataLK">Прежде чем диагностировать у себя депрессию и заниженную самооценку, убедитесь, что вы не окружены идиотами.</span><center>');
    if($selectcyct == 29) echo('<br><center><span class="cytataLK">Есть три вещи, которых боится большинство людей: доверять, говорить правду и быть собой.</span><center>');
    if($selectcyct == 30) echo('<br><center><span class="cytataLK">Прежде чем осуждать кого-то возьми его обувь и пройди его путь, попробуй его слезы, почувствуй его боли. Наткнись на каждый камень, о который он споткнулся. И только после этого говори, что ты знаешь - как правильно жить.</span><center>');
    if($selectcyct == 31) echo('<br><center><span class="cytataLK">Если вы уходите и вас никто не зовёт обратно – вы идете в верном направлении.</span><center>');
    if($selectcyct == 32) echo('<br><center><span class="cytataLK">Расстояние ничего не портит. Разница в возрасте ничего не портит. Мнение родителей ничего не портит. Всё портят люди. Сами.</span><center>');
    if($selectcyct == 33) echo('<br><center><span class="cytataLK">Вместо того, чтобы стирать слезы с лица, сотрите из жизни людей, которые заставили вас плакать.</span><center>');
    if($selectcyct == 34) echo('<br><center><span class="cytataLK">Проблема в том, что, не рискуя, мы рискуем в сто раз больше.</span><center>');
    if($selectcyct == 35) echo('<br><center><span class="cytataLK">Я сделал предложение своей жене на третий день знакомства, и всю жизнь жалел лишь о двух потерянных днях...</span><center>');
    if($selectcyct == 36) echo('<br><center><span class="cytataLK">„Интеллект — это способность избегать выполнения работы, но так, чтобы она при этом была сделана.“ — Линус Торвальдс"</span><center>');
    if($selectcyct == 37) echo('<br><center><span class="cytataLK">„Такой вещи, как «большинство пользователей», нет вообще.“ — Линус Торвальдс</span><center>');
    if($selectcyct == 38) echo('<br><center><span class="cytataLK">„Я пишу (бесплатную) операционную систему (это просто хобби, она не будет такой же большой и профессиональной как GNU) для 386(486) AT и их клонов.“ — Линус Торвальдс</span><center>');
    if($selectcyct == 39) echo('<br><center><span class="cytataLK">„Философия Linux — «смейся в лицо опасностям». Упс. Не то. «Делай это сам.»“ — Линус Торвальдс</span><center>');
    if($selectcyct == 40) echo('<br><center><span class="cytataLK">„Программное обеспечение словно секс: лучше, когда это бесплатно!“ — Линус Торвальдс</span><center>');
    if($selectcyct == 41) echo('<br><center><span class="cytataLK">„Быть известным очень здорово, хотя некоторые известные люди из вежливости это отрицают, чтобы неизвестные люди чувствовали свое превосходство. Принято стесняться славы и делать вид, что она тебе портит жизнь.“ — Линус Торвальдс</span><center>');
    if($selectcyct == 42) echo('<br><center><span class="cytataLK">„Знаешь, нужно быть не просто хорошим программистом чтобы написать систему, подобную Linux. Нужно быть ещё и хитрой сволочью.“ — Линус Торвальдс</span><center>');
    if($selectcyct == 43) echo('<br><center><span class="cytataLK">„Скажи НЕТ НАРКОТИКАМ, и, может быть, ты не закончишь так же, как разработчики Hurd.“ — Линус Торвальдс</span><center>');
    if($selectcyct == 44) echo('<br><center><span class="cytataLK">„Каждый, кто провел в Финляндии зиму, поймет истоки повсеместного пьянства.“ — Линус Торвальдс</span><center>');
    if($selectcyct == 45) echo('<br><center><span class="cytataLK">„Невозможно – это всего лишь громкое слово, за которым прячутся маленькие люди.“ — Мохаммед Али</span><center>');
    if($selectcyct == 46) echo('<br><center><span class="cytataLK">„Если у тебя получилось обмануть человека, это не значит, что он дурак, это значит, что тебе доверяли больше, чем ты этого заслуживаешь.“</span><center>');
    if($selectcyct == 47) echo('<br><center><span class="cytataLK">„И вообще, мне нравятся люди с твердыми моральными принципами, как Ричард [ Столлман ]. Но почему они не могут держать эти принципы при себе?“ — Линус Торвальдс</span><center>');
    if($selectcyct == 48) echo('<br><center><span class="cytataLK">„И девочек я приводил домой, только когда они хотели позаниматься. Это было не так уж часто, и я никогда не был инициатором, но отец питает иллюзии, что заниматься они хотели не только математикой.“ — Линус Торвальдс</span><center>');
    if($selectcyct == 49) echo('<br><center><span class="cytataLK">„Кто то пустил в обиход клише «великодушный диктатор», чтобы описать мой стиль работы. Когда я услышал его впервые, то представил себе черноусого генерала какой то солнечной страны, протягивающего бананы своему умирающему от голода народу.“ — Линус Торвальдс</span><center>');
    if($selectcyct == 50) echo('<br><center><span class="cytataLK">„Если кто-то жалуется вам на славу и богатство – не слушайте его. Так просто принято говорить.“ — Линус Торвальдс</span><center>');
    if($selectcyct == 51) echo('<br><center><span class="cytataLK">Тут був Ірмен</span><center>');
    if($selectcyct == 52) echo('<br><center><span class="cytataLK">„Last Life Role Play - Гавно.“ — Разработчики RW Project</span><center>');
    //$repcytata1 = $repcytata . "";
    ?>
    </div>
    </div>
<div class="col-md-8">
    <div class="well">
        <center><p>РП Биография</p></center>
        <?php 
        if(strlen((string)$myrow['pPame']) >= 402)
        {
            $pameReplace1 = mb_strimwidth ((string)$myrow['pPame'], 0, 402);
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
<div class="col-md-4">
<div class="well">
    <!--ВЫДАЧА БОНУСА--->
    <center><h4>Бонус</h4></center>
    <form id="nameform" class="form-horizontal" role="form" method="POST" action="scripts/getbonus">
        <br><center><button type="submit" class="btn btn-success">Получить бонус</button></center>
        <br><br><center><p>Периодически администрация выдает дополнительные бонусы.</p></center>
    </form>
</div>
</div>
<?php
@include ('scripts/bd.php');
 $result = mysql_query("SELECT pSkin FROM accounts WHERE pName='".$_SESSION['login']."'"); //извлекаем из базы все данные о пользователе с введенным логином
 $myrow = mysql_fetch_array($result);
 $_SESSION['pSkin']=$myrow['pSkin'];
 $_SESSION['character_id'] = -1;
 //echo $_SESSION['login'];
?>
    <div class="col-md-4">
    <form id="nameform" class="form-horizontal" role="form" method="POST" action="scripts/changeskin">
        <div class="well">
        <div style="margin-bottom: 25px" class="edit">
        <h4 class="img">Сменить скин</h4>
        <p class="img"><img src="img/skins/<?php echo $_SESSION['pSkin'] ?>.png" height="195"></p>
        <input id = "NewSkin" type="text" class="form-control" name="newskin" placeholder="ID Скина" required></br>
            <font color="white">С вашего донат-счета будет списано 20 рублей, Вы принимаете условия оплаты?</font>
            <div class="checkbox">
                <label>
                    <input type="checkbox" required><font color="white"> Принимаю условия оплаты.</font>
                </label>
            </div></br>
        <button type="submit" class="btn btn-success">Сменить</button><br><br>
        </div>
        </div>
    </form>
     </div>
     <!--<?php $skinid; ?> вывод-->
    <!--СМЕНА ПАРОЛЯ--->
    <div class="col-md-4">
    <form id="passform" class="form-horizontal" role="form" method="POST" action="scripts/option">
        <div class="well">
        <div style="margin-bottom: 25px" class="edit">
        <h4 align="center">Сменить пароль</h4>
        <input id = "inputPassOld" type="text" class="form-control" name="password" placeholder="Старый пароль" required></br>
        <input id = "inputPassNew" type="text" class="form-control" name="password2" placeholder="Новый пароль" required></br>
        <input id = "inputPassNew2" type="text" class="form-control" name="password3" placeholder="Подтверждение нового пароля" required></br></br>
</br></br></br>
</br></br>  <button type="submit" class="btn btn-success">Сменить</button>
        </div>
        </div>
    </form>
    </div>
    <!----------------->
    <!--СМЕНА НИКНЕЙМА-->
     <div class="col-md-4">
    <form id="nameform" class="form-horizontal" role="form" method="POST" action="scripts/changename">
        <div class="well">
        <div style="margin-bottom: 25px" class="edit">
        <h4 class="img">Сменить НикНейм</h4>
        <input id = "inputNickNew" type="text" class="form-control" name="nicknew" placeholder="Новый НикНейм" required></br>
        <input id = "inputPass" type="text" class="form-control" name="passwordN" placeholder="Пароль" required></br>
        <font color="white">С вашего донат-счета будет списано 20 рублей, Вы принимаете условия оплаты?</font>
            <div class="checkbox">
            <label>
                <input type="checkbox" required><font color="white"> Принимаю условия оплаты.</font>
            </label>
        </div>
</br></br>
</br>
        <button type="submit" class="btn btn-success">Сменить</button>
        </div>
        </div>
    </form>
    </div>
    <!----------------->
</div>
</div>
</div>
</div>
<br><center><p>Made by RW Project Developers Team. RW Project © 2019 - 2020</p></center>


<?php else : ?>
<div class="alert alert-danger">Выполните вход через сайт!</div>
<?php endif ; ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<!-- t.me/koval_yaroslav vk.com/koval.yaroslav --->