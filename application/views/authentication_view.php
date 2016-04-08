<style type="text/css">
    label
    {
        width: 110px;
        display: box;
        display: -moz-box;
        padding-bottom: 10px;
    }
    input[type="submit"]{
        height:40px;
        width:150px;
    }
</style>

<h1>Аутентификация</h1>
<form action="authentication" method="post">
    <label>Password</label>
    <input class="input" type="password" name="password" size="50" /><br />
    <label>Repeat password</label>
    <input class="input" type="password" name="repeatPassword" size="50" /><br />
    <input type="hidden" name="token" value="<?php echo $_GET["token"] ?>" />
    <input type="submit" value="Регистрация"/>
</form>