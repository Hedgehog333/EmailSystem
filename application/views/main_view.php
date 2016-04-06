<h1>Добро пожаловать!</h1>
<?php
    if(isset($_SESSION["CurrentUser"])):
?>
<a href="/messages_menu" style="display: block; margin-bottom: 16px;">Личный кабинет</a>
<?php
    endif;
?>
<form action="login" name="myform" method="post"> 
	<label class="label">Логин</label>
    <input class="input" type="text" name="name" size="50"> 
    </br>
	</br>
	<label class="label">Пароль</label>
   <input class="input" type="text" height="30px" name="pass" size="50"> 
   </br>
   </br>
   <input style="height:40px; width:150px" name="Submit" type=submit value="Войти"> 
</form>
</br>
<form action="registration" name="myform" method="post"> 
	<input style="height:40px; width:150px" name="Submit" type=submit value="Регистрация"> 
</form>