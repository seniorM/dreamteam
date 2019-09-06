<?php
// отображение ошибок из сессии
set_errors($errors);А
?>
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