<?php
    #https://habrahabr.ru/post/109454/
class oneTimeAuth
{
    private $db;
 
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    
    
    
    private function generateToken()
    {
        return md5(uniqid('', true));
    }
}