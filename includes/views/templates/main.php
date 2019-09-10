<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="description" content="description"/>
	<meta name="author" content="author"/> 	
	<link href="css/default.css" rel="stylesheet" type="text/css"/>
	<link href="css/main.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
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
                   <nav class="top-menu">
  <ul class="menu-main">
    <?php if (is_auth()): ?>
    <li><a href="<?= url('index'); ?>">Все новости</a></li>
    <li><a href="<?= url('all'); ?>">Мои новости</a></li>
    <li><a href="index.php?action=exit">Выйти</a></li>
    <?php endif; ?>
  </ul>
</nav>
		   		    
		    <div class="inner_copy"></div>
		    <div class="item">
			 <?php include_once 'includes' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . $page; ?>
		    </div>						
		</div>		
		<div class="clearer"></div>
	    </div>
	    <!--Start footer-->
	    <div class="footer">		
		Сайт создан компанией Dream Team &copy; <?php echo date('Y'); ?>
		
	    <!--Finish footer-->
	    </div>
	</div>
    </body>
</html>
