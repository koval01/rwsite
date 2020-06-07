<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(empty($_POST['g-recaptcha-response'])) {
		exit('Подтвердите, что Вы не робот!');
	}	
	
	$recaptcha = $_POST['g-recaptcha-response'];
	
	//data POST
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$secret = '6LdYnPoUAAAAAP4m5_tPd6egLP5e4Tk85TeolBGj';
	$ip = $_SERVER['REMOTE_ADDR'];
	
	$url_data = $url.'?secret='.$secret.'&response='.$recaptcha.'&remoteip='.$ip;
	
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_data);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$res = curl_exec($curl);
	curl_close($curl);
	
	$res = json_decode($res);
	
    if($res -> success) {
    session_start();
    error_reporting(0);
    
    //if (isset($_COOKIE['loginC'])) { $login = $_COOKIE['loginC']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    //if (isset($_COOKIE['passwordC'])) { $password= $_COOKIE['passwordC']; if ($password =='') { unset($password);} }
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password= $_POST['password']; if ($password =='') { unset($password);} }
    
    
    if (isset($_POST['remember']))
    {
    	setcookie('loginC', $login, time()+15*24*60*60, "/");
    	setcookie('passwordC', $password,  time()+15*24*60*60, "/");
    }
    
    $password= strtoupper(hash('sha256', $_POST['password'].'key2212'));
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <!--<![endif]-->
    <head>
    <meta charset="utf-8" />
    </head>
    <body>
    <?php
    
    include 'bsinchead.php';
    
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    
    		
    // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
    
    $result = mysql_query("SELECT ID, pName, pPassword, pAdminName, pAdmin, pSkin, pDonate FROM accounts WHERE pName='$login'"); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysql_fetch_array($result);
    if (empty($myrow['pPassword']))
    {
    	//если пользователя с введенным логином не существует
    	exit ("Извините, введённый вами login или пароль неверный.<a class='alert-link' href='../index'>Назад</a>");
    	
    }
    else {
    	//if ($myrow['activation']=='0'){
    	//	exit("Извините, ваш Е-мейл не подтвержден!<a class='alert-link' href='../index'>Назад</a>");
    	//}
    	//если существует, то сверяем пароли
    	if ($myrow['pPassword']==$password) {
    		//если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    		$_SESSION['login']=$myrow['pName']; 
    		$_SESSION['id']=$myrow['ID'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
    		//$_SESSION['role']=$myrow['role'];
    		//$_SESSION['pChangeSkin']=$myrow['pChangeSkin'];
    		echo("Добро пожаловать!");
    		
    		
    		
    		exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../home'></head></html>");
    	}
    	else {
    		//если пароли не сошлись
    
    		exit ("Извините, введённый вами логин или пароль неверный.<a class='alert-link' href='../index'>Назад</a>");
    	}
    }
}
}

include 'bsincbot.php';

?>
</body>
</html>