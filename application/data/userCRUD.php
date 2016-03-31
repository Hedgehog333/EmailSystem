<?php

    class UserCRUD
    {
        private $connection;
        
        public function __construct()
        {
            $this->connection = new DataBaseConnection();
        }
        
        public function set($email, $name = "", $surename = "", $lastname = "")
        {
            $sql = "INSERT INTO `Users`(`Name`, `SurName`, `LastName`, `Email`) "
                    . "VALUES (:name, :surename, :lastname, :email)";
            
            $stmt = $this->connection->getConnect()->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':surename', $surename);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            //what the hell? to doing here?
            
        }
        
        public function activation($UserID, $password)
        {
            $sql = "UPDATE Users SET Password = :password, activated = 1 WHERE ID = :userID";
            $stmt = $this->connection->getConnect()->prepare($sql);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':userID', $UserID);
            $stmt->execute();
        }
        
        public function getAll()
        {
            $sql = "select * from Users";
            $stmt = $this->connection->getConnect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        
        public function getForId($id)
        {
            $sql = "select * from Users where id = :id";
            $stmt = $this->connection->getConnect()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        
        public function getForEmail($email)
        {
            $sql = "select * from Users where email LIKE :email";
            $stmt = $this->connection->getConnect()->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    }