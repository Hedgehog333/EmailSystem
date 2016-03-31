<?php
    class oneTimeAuth
    {
        private $connection;

        public function __construct()
        {
            $this->connection = new DataBaseConnection();
        }

        public function remember($userId, $expire = null)
        {
            $sql = 'INSERT INTO OneTimeAuth (Token, UserID, Expire)'
                    . 'VALUES (:token, :userId, :expire)';
            $stmt = $this->connection->getConnect()->prepare($sql);
            $token = $this->generateToken();
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':expire', $expire);
            $stmt->execute();

            return $token;
        }
        
        public function remind($token)
        {
            $sql = 'SELECT UserID FROM OneTimeAuth WHERE Token = :token AND (Expire IS NULL OR Expire <= NOW()) LIMIT 1';
            $stmt = $this->connection->getConnect()->prepare($sql);

            $stmt->execute(array('token' => $token));

            if ($row = $stmt->fetch()) {
                $stmt = $this->db->prepare('DELETE FROM OneTimeAuth WHERE Token = :token');
                $stmt->execute(array('token' => $token));

                return $row['UserID'];
            }
        }

        private function generateToken()
        {
            return md5(uniqid('', true));
        }
    }