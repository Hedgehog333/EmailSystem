<?php

    class UserCRUD
    {
        private $connection;
        
        public function __construct(PDO $connection)
        {
            $this->connection = $connection;
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        public function set($name, $surename, $lastname, $email)
        {
            $sql = "INSERT INTO `Users`(`Name`, `SurName`, `LastName`, `Email`) "
                    . "VALUES (:name, :surename, :lastname, :email)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':surename', $surename);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
        }
        
        public function getAll()
        {
            $sql = "select * from Users";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        
        public function getForId($id)
        {
            $sql = "select * from Users where id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        
        public function getForEmail($email)
        {
            $sql = "select * from Users where email LIKE :email";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    }