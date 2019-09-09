<?php
// отображение ошибок из сессии
$errors = get_errors();
?>
<?php if ($errors): ?>
    <div id="errors">
        <ol>
	    <?php foreach ($errors as $error) : ?>
		<li><?= $error ?></li>
	    <?php endforeach; ?>
        </ol>
    </div>
<?php endif; ?>
<form action="index.php?action=login" method="post">
    <label>Логин:
	<input type="text" name="login" required />
    </label>
    <label>Пароль:
	<input type="password" name="pass" required />
    </label>	    
    <input type="submit" value="Войти"/><a href="index.php?action=registration">Регистрация</a>
</form>
