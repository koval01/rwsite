<!DOCTYPE html>
<html lang="ru">
<!--<![endif]-->
<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
<meta charset="utf-8" />

<title>RW Project - Вспоминай, или пиши нам.</title>
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
</html>
<?php 
if($_SESSION['login'] != Null) header("Location: https://rw.q0ttube.com/home");
?>
<?php
echo '

            <html>
            <head>
            <title>Забыли пароль?</title>
               <link rel="shortcut icon" href="favicon.png" />
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
            <div class="container">

   <div class="login_form">
      <div class="row">
      <div class="col-md-12">
         <h2>RW Project</h2>

      </div>
       <div id="loginbox"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Забыли пароль?</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="/">Главная</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                    <h5>Обратитесь к <a href="https://vk.com/koval.yaroslav">vk.com/koval.yaroslav</a> или к <a href="https://vk.com/tsiomik1">vk.com/tsiomik1</a></h5>  
         </div> 
   </div>
   </div>

</div>
            </form>
            </body>
            </html>';