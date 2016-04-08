<?php
class PDOWorker {
    
    function connectToDB() {
        $user = 'root';
        $pass = '';
        $dbh=new PDO('mysql:host=localhost;dbname=Mail', $user, $pass);
        return $dbh;
    }
    function chekUser($Email) {
        $dbh=$this->connectToDB();
        $stmt = $dbh->prepare('SELECT ID from Users where EMAIL=:UserEmail');
        $stmt->bindParam(':UserEmail',$Email);
        $stmt->execute();
        if($stmt->rowCount()<1){
            throw new Exception("User no found");
        }
        return $stmt->fetch(PDO::FETCH_OBJ)->ID;
    }
    function AddMessage($Theme,$Message){
        $dbh=$this->connectToDB();
        $stmt = $dbh->prepare(
            'INSERT INTO `Messages`(`CreationDate`, `Title`, `Body`)'.
                'VALUES (:Date,:Title,:Body)'
        );
        $Date=date("Y-m-d H:i:s");
        $stmt->bindParam(':Date',$Date);
        $stmt->bindParam(':Title',$Theme);
        $stmt->bindParam(':Body',$Message);
        
        $stmt->execute();
        $sql=" LAST_INSERT_ID()";
        $id=$dbh->lastInsertId('Messages');
        return $id;
    }
    function AddAttachment($MessageID,$TypeID,$PATH){
        $dbh=$this->connectToDB();
        $stmt = $dbh->prepare(
            'INSERT INTO `Attachment`(`MessageID`, `TypeID`, `Path`) '.
                'VALUES (:MessID,:TypeID,:Path)'
        );
        
        $stmt->bindParam(':MessID',$MessageID);
        $stmt->bindParam(':TypeID',$TypeID);
        $stmt->bindParam(':Path',$PATH);
        
        $stmt->execute();
    }
    function AddFromTO($MessageID,$UserFrom,$UserTo,$TypeID) {
        $dbh=$this->connectToDB();
        $stmt = $dbh->prepare(
            'INSERT INTO `FromTo`(`MessageID`, `UserFrom`, `UserTo`, `ExpiredDate`, `TypeID`, `IsRead`)'.
                'VALUES (:MessID,:UserFrom,:UserTo,:Date,:TypeID,0)'
        );
        $Date=date("Y-m-d H:i:s",strtotime("+30 days"));
        $stmt->bindParam(':MessID',$MessageID);
        $stmt->bindParam(':UserFrom',$UserFrom);
        $stmt->bindParam(':UserTo',$UserTo);
        $stmt->bindParam(':Date',$Date);
        $stmt->bindParam(':TypeID',$TypeID);
        $stmt->execute();
    }
    function SendMessage($Email,$Theme,$Message,$UserFrom,$TypeID,$PATH) {
        try{
            $UserTo=$this->chekUser($Email);
            $MessageID=$this->AddMessage($Theme, $Message);
            $this->AddFromTO($MessageID, $UserFrom, $UserTo, $TypeID);
            $this->AddAttachment($MessageID, $TypeID, $PATH);
            return $MessageID;
        } catch (Exception $ex){
            echo $ex->getMessage();
        }
    }
}
