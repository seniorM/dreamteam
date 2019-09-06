<?php

get_registration();

$users = getUsers();
post_registration();

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content="description"/>
    <meta name="author" content="author"/> 
    <link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
    <link href="../../css/default.css" rel="stylesheet" type="text/css"/>
<title>Dream team blog</title>
</head>
    <body>
        <div class="container">
            <div class="main">
		<div class="header">
			<div class="title">
				<h1>Dream team blog</h1>
			</div>
		</div>
		<div class="content"><div class="inner_copy"></div>
			<div class="item">
			<h1>Регистрация</h1>			
                            <form action="#.php" method="post" id="">
                                <label>Логин:
                                    <input type="text" name="login" required />
                                </label>
                                <label>Пароль:
                                    <input type="password" name="pass" required />
                                </label>
                                <label>Повторите пароль:
                                    <input type="password" name="pass_conf" required />
                                </label>
                                    <input type="submit" value="Войти"/>
                            </form>	
			</div>						
                </div>
		<div class="sidenav">
			<h2>Меню</h2>
			<ul>
				<li><a href="/.php">Главная</a></li>
				<li><a href="/views/pages/login.php">Войти</a></li>				
			</ul>
						
			
		</div>
		<div class="clearer"></div>
            </div>
	<div class="footer">
		<span class="left"><a href="#">Dream team blog</a></span>
		
		<center>Сайт создан компанией Dream Team &copy; <?php echo date('Y'); ?></center>
		<div class="clearer"></div>
	</div>
        </div>
</body>
</html>
