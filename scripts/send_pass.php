<?php
if    (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);}    } //заносим введенный пользователем логин в переменную $login, если он пустой,    то уничтожаем переменную
if    (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') {    unset($email);} } //заносим введенный пользователем e-mail, если он    пустой, то уничтожаем переменную
if    (isset($login) and isset($email)) {//если существуют необходимые переменные  
                     
                     include ("scripts/bd.php");// файл    bd.php должен быть в той же папке, что и все остальные, если это не так, то    просто измените путь 
                     
                     $result    = mysql_query("SELECT ID FROM accounts WHERE pName='$login' AND email='$email' AND activation='1'");//такой ли у пользователя е-мейл 
                     $myrow    = mysql_fetch_array($result);
                     if    (empty($myrow['ID']) or $myrow['ID']=='') {
                              //если активированного пользователя с таким логином и е-mail    адресом нет
                              exit ("Пользователя с    таким e-mail адресом не обнаружено. <a href='index.php'>Главная страница</a>");
                              }
                     //если пользователь с таким логином и е-мейлом найден,    то необходимо сгенерировать для него случайный пароль, обновить его в базе и    отправить на е-мейл
                     $datenow = date('YmdHis');//извлекаем    дату 
                     $new_password = md5($datenow);// шифруем    дату
                     $new_password = substr($new_password,    2, 6); //извлекаем из шифра 6 символов начиная    со второго. Это и будет наш случайный пароль. Далее запишем его в базу,    зашифровав точно так же, как и обычно.
                     
            $new_password_sh = strtoupper(hash('sha256', $new_password.'key2212'));//зашифровали 
			
            mysql_query("UPDATE `accounts` SET `pPassword` = ".$new_password_sh."' WHERE 'pName' = '".$login."'");
                     //формируем сообщение
                     $subject="Восстановление пароля на сайте UCP Canada Project";
                     $message = "Здравствуйте,    ".$login."! Мы изменили для Вас пароль, теперь Вы сможете войти на сайт http://canadaproject.ru, используя его. После входа желательно его сменить. Пароль:\n".$new_password;//текст сообщения
                   //  mail($email,"Восстановление пароля на сайте UCP Arrival-RP", $message,"Content-type: text/plane; Charset=utf-8\r\n\r\отправляемa");//n сообщение 
                     mail($email, $subject, $message, "Content-type: text/plain; charset=utf-8\r\n\r\n");
                     echo    "<html><head><meta http-equiv='Refresh' content='5;    URL=index.php'></head><body>На Ваш e-mail отправлено письмо с паролем. Вы    будете перемещены через 5 сек. Если не хотите ждать, то <a  href='index.php'>нажмите сюда.</a></body></html>";//перенаправляем    пользователя
                     }
 else    {//если    данные еще не введены
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
         <h2>Arrival-RP U.C.P</h2>

      </div>
       <div id="loginbox"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Забыли пароль?</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Главная</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="POST" action="#">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="login" placeholder="Имя_Фамилия(John_Goodwin)" required>                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input id="login-email" type="text" class="form-control" name="email" placeholder="email" required>
                                    </div>
                                    


                                <div style="margin-top:10px" class="form-group">

                                    <div class="col-sm-12 controls">
 <button type="submit" class="btn btn-success">Отправить</button>
                                    </div>
                                </div>

                                    </div>
                                </div>    
                            </form>     
         </div> 
   </div>
   </div>

</div>
            </form>
            </body>
            </html>';

            }

        

