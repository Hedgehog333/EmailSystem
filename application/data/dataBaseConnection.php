<?php
    
Class DataBaseConnection{
    
    private $DB;
    
    public function getConnect(){
        if($this->DB == null){
            $this->connect();
        }
        return $this->DB;
    }
    
    public function connect(){
        
        $user = "root";
        $pass= "";
        $dbname = "EmailSystem";
        $dns = "mysql:host=localhost;dbname=$dbname";
        try{
            $this->DB = new PDO($dns, $user, $pass);
        }
        catch(PDOException $ex){
            echo "Error: ".$ex->getMessage()."</br>";
        }
    }
}
?>