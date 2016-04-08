<?php
    class Controller_Authentication extends Controller
    {
        function action_index()
        {
            if(isset($_POST["token"], $_POST["password"], $_POST["repeatPassword"]) && $_POST["password"] == $_POST["repeatPassword"])
            {
                $token = $_POST["token"];
                $password = $_POST["password"];
                
                $ota = new oneTimeAuth();
                $UserID = $ota->remind($token);

                $dbh = new DataBaseConnection();
                
                $sql = "UPDATE Users SET Password = :password, activated = 1 WHERE ID = :userID";
                $stmt = $dbh->getConnect()->prepare($sql);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':userID', $UserID);
                $stmt->execute();

                $user = new UserCRUD();
                $_SESSION["CurrentUser"] = $user->getForId($UserID);
                
            }
            $this->view->generate('authentication_view.php', 'template_view.php', $data);
        }
    }