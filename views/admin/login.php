<div class="fadeInDown">
  	<div id="formContent">
	    <form method="post">
	      <p class="h3 mb-3">Вход</p>
	      <p id="not_success"><?=$result['error']?></p>
	      <input type="text" id="admin" class="fadeIn third mb-2" name="login" value="<?=$result['login']?>" placeholder="Введите логин">
	      <input type="password" id="pass" class="fadeIn third mb-2" name="pass" placeholder="Введите пароль">
	      <input type="submit" name="auth" class="fadeIn fourth" value="Войти" id="logIn">
	    </form>
	</div>
</div>