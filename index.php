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

	<title>RW Project - Ты же не забыл пароль?</title>
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
                        <div class="panel-title">Вход</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="send_pass">Забыли пароль?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="POST" action="scripts/login">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<?
										//print_r($_COOKIE);
										if (isset($_COOKIE['loginC'])) 
										{ 
											$login = $_COOKIE['loginC']; 
											if ($login == '') 
											{ 
												unset($login);
												echo('<input id="login-username" type="text" class="form-control" name="login" placeholder="Имя_Фамилия(John_Goodwin)" required>');
											} 
											else echo('<input id="login-username" type="text" class="form-control" name="login" placeholder="Имя_Фамилия(John_Goodwin)" value = "'.$login.'" required>');
										} 
										else echo('<input id="login-username" type="text" class="form-control" name="login" placeholder="Имя_Фамилия(John_Goodwin)" required>');
										?>
                                                                              
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<?
										if (isset($_COOKIE['passwordC'])) 
										{ 
											$password = $_COOKIE['passwordC']; 
											if ($password == '') 
											{ 
												unset($password);
												echo('<input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>');
											} 
											else echo('<input id="login-password" type="password" class="form-control" name="password" placeholder="password" value="'.$password.'" required>');
										} 
										else echo('<input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>');
										?>
                                        
                                    </div>
                                    <div data-theme="dark" class="g-recaptcha" data-sitekey="6LdYnPoUAAAAAPJRb5vxfchWLkzPqjQmdQt6xGY0"></div>
                                    
									
                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Запомнить меня
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                  
                                    <div class="col-sm-12 controls">
                                     <!-- <a id="btn-login" href="#" class="btn btn-success">Вход  </a>-->
 <button type="submit" class="btn btn-success">Войти</button>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Нет аккаунта?
                                        <a href="reg">
                                            Регистрация здесь
                                        </a>
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
</body>
</html>