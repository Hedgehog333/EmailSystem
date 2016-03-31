<?php
class Controller_Registration_Result extends Controller
{
    function action_index()
    {
        if(isset($_POST['email'], $_POST['name']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            
            $userCRUD = new UserCRUD();
            $userCRUD->set($email, $name);
            $userID = $userCRUD->getForEmail($email)->ID;
            $ota = new oneTimeAuth();
            $token = $ota->remember($userID);
            mail($email, "Email System", "http://".$_SERVER['HTTP_HOST']."/authentication?token=$token");
        }
        //тут надо вывести сообщение о том что на почту была отправленна ссылка
        //по которой нужно перейти для активации аккаунта
        $this->view->generate('main_view.php', 'template_view.php');
    }
}