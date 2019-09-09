<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="description" content="description"/>
	<meta name="author" content="author"/> 
	
	<link href="css/default.css" rel="stylesheet" type="text/css"/>
	<link href="css/main.css" rel="stylesheet" type="text/css"/>
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
		<div class="content">	
		    <div id="menu">
			
			<a href="<?= url('index'); ?>">Все новости</a> <a href="<?= url('all'); ?>">Мои новости</a> <a href="index.php?action=exit">Выйти</a>
		    </div>		    
		    <div class="inner_copy"></div>
		    <div class="item">
			 <?php include_once 'includes' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . $page; ?>
		    </div>						
		</div>
		
		<div class="clearer"></div>
	    </div>
	    <div class="footer">
		

		<center>Сайт создан компанией Dream Team &copy; <?php echo date('Y'); ?></center>
		<div class="clearer"></div>
	    </div>
	</div>
    </body>
</html>
