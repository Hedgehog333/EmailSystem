<?php
class Controller_Registration_Result extends Controller
{
	function action_index()
	{
		if(isset($_POST['name'],$_POST['pass'],$_POST['email']))
		{
			$user = 'root';
			$pass = '';
			$dbh = new PDO('mysql:host=localhost;dbname=mail_system', $user, $pass);
			$name = $_POST['name'];
			$password = $_POST['pass'];
			$email = $_POST['email'	];
			
			$stmt = $dbh->prepare("INSERT INTO users (name, password, email) VALUES (:name, :password, :email)");
			
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			
			echo "<b style='color:green;'>sucsess!<b>";
		}
		else{
			echo "<b style='color:green;'>not enaugh data!<b>";
		}
		$dbh = null;
		$this->view->generate('main_view.php', 'template_view.php');
	}
}