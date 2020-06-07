<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<!--<![endif]-->
<head>
<meta charset="utf-8" />
</head>
</html>
<?php
include 'bsinchead.php';
//

if    (empty($_SESSION['login'])) 
{
	//если не существует сессии с логином и паролем, значит на    этот файл попал невошедший пользователь. Ему тут не место. Выдаем сообщение    об ошибке, останавливаем скрипт
	exit ("<div class='alert alert-danger'>Доступ на эту   страницу разрешен только зарегистрированным пользователям. Если вы зарегистрированы, то войдите на сайт под своим логином и паролем<br><a    href='../index'>Назад</a></div>");
}

unset($_SESSION['login']); 
unset($_SESSION['test1']);
unset($_SESSION['id']);
unset($_SESSION['pChangeSkin']);
unset($_SESSION['character_id']);
unset($_SESSION['role']);//    уничтожаем переменные в сессиях
exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=../index'></head></html>");
// отправляем пользователя на главную страницу.


include 'bsincbot.php';


?>