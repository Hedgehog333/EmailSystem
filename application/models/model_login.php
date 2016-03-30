<?php
	class LOGIN
	{
		public $user;
		public $pass;
		public $dbh = null;
		public function DBC()
		{
                    $dbc = new DataBaseConnection();
                    $this->dbh = $dbc.getConnect();
		}
		public function DBC_close()
		{
			$this->dbh = null;
		}
		public function login_($email, $pass)
		{
			if(isset($email,$pass))
			{
				$stmt = $this->dbh->prepare("select * from users where email LIKE :email and password LIKE :pass");
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':pass', $pass);
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_OBJ);
				return $result;
			}
		}
	}
?>