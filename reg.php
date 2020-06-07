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

	<title>RW Project - А что ты ожидал здесь увидеть?</title>
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
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	
<?php 
if($_SESSION['login'] != Null) header("Location: https://rw.q0ttube.com/home");
?>

<div class="container">
	<!-- begin login_form  -->
	<div class="login_form">
		<div class="row">
		<div class="col-md-12">
			<center><br/><img src="img/main-logo.png"></img></center>

		</div>
		 <div id="loginbox"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <h2 class="panel-title">Регистрация</h2>
                     <h5>Уважаемый игрок, чтобы создать игровой аккаунт зайдите на наш сервер ( <a href="samp://51.77.238.95:7777">51.77.238.95:7777</a> ). После этого вы можете авторизоваться на нашем сайте. Если возникнут вопросы, обратитесь к <a href="https://vk.com/koval.yaroslav">vk.com/koval.yaroslav</a> или к <a href="https://vk.com/tsiomik1">vk.com/tsiomik1</a></h5><br><h2><a href="https://rw.q0ttube.com/">На главную</a></h2>
                    </div>     

                    
                                    </div>
                                </div>

                                </div>    
                            </form>     
         </div> 
	</div>
	</div>
	<!-- end login_form -->
</div>

	<div class="hidden"></div>
	<!-- Mandatory for Responsive Bootstrap Toolkit to operate -->
	<div class="device-xs visible-xs"></div>
	<div class="device-sm visible-sm"></div>
	<div class="device-md visible-md"></div>
	<div class="device-lg visible-lg"></div>
	<!-- end mandatory -->
	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->

	<!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
	<!-- Google Analytics counter --><!-- /Google Analytics counter -->
</body>
</html>