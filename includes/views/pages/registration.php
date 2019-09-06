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
<form action="index.php?action=registration" method="post" id="reg">
    <label>Login:
	<input type="text" name="login"/>
    </label>
    <label>Password:
	<input type="password" name="pass"/>
    </label>
    <label>Confirm password:
	<input type="password" name="pass_conf"/>
    </label>
    <input type="submit" value="Register"/>
</form>