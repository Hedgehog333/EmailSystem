<?php

include './PDOWorker.php';

$sendingController = new SengingController();
$sendingController->SendMessage();
//$attachController->downloadFile(5,"bootstrap-3.3.6-dist.zip");

class SengingController {
  function SendMessage(){
      if(isset($_POST['Receiver'],$_POST['Theme'],$_POST['WYSIWYG']))
	{
            $Email=$_POST['Receiver'];
            $Theme = $_POST['Theme'];
            $WYSIWYG = $_POST['WYSIWYG'];
            $_SESSION['Id']=1;
            $UserFrom=$_SESSION['Id'];
            $TypeID=1;
            $PATH=null;
            $pdo=new PDOWorker();
            $MessageID=$pdo->
                  SendMessage(
                        $Email,
                        $Theme, 
                        $WYSIWYG, 
                        $UserFrom, 
                        $TypeID, 
                        $PATH
                  );
            $this->uploadFile($MessageID);
          echo "<b style='color:green;'>Message has been sended,Thank you!<b>";
        }
        
        else{
                echo "<b style='color:red;'>not enaugh data!<b>";
        }
  }
  function uploadFile($mail) {
    if(isset($_FILES["userfile"])  &&
      $_FILES["userfile"]["error"] == UPLOAD_ERR_OK) {
        if ($_FILES["userfile"]["size"] > 1048576) { //1mb
          die("Sorry, your file is too large.");
        }
        $uploaddir = __DIR__ . '/uploads/' . $mail . '/';
        mkdir($uploaddir);
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
         die("The file has been uploaded");
        } else {
          die("Sorry, there was an error uploading your file.");
        }
      } else {
        die("Sorry, there was an error uploading your file.");
      }
  }

  public function downloadFile($mail,$filename) {
    $file = __DIR__ . '/uploads/' . $mail . '/' .$filename;
    if (file_exists($file)) {
      // Cбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
      // Если этого не сделать файл будет читаться в память полностью!
      if (ob_get_level()) {
        ob_end_clean();
      }
      // Заставляем браузер показать окно сохранения файла
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename=' . basename($file));
      header('Content-Transfer-Encoding: binary');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($file));
      // Читаем файл и отправляем его пользователю
      readfile($file);
      exit;
    }
  }
}
?>
