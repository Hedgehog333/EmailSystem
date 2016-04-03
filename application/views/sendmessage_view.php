<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
   <script src="js/tinymce/tinymce.min.js"></script>
   <script src="js/tinymce/jquery.tinymce.min.js"></script>
  <script>
  /*$(document).ready(function (e) {
    $("#upload-file-form").on('submit',(function(e) {
      e.preventDefault();
      $.ajax({
        url: "SendingController.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false
      });
    }));
  });*/
  </script>
  <!--Настройка редактора tinymce-->
  <script type="text/javascript">
            tinymce.init({
                selector: "textarea",
                height : 300,
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        </script>
  </head>
  <body>
    <!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
    <form id="upload-file-form" enctype="multipart/form-data" action="sending" method="POST">
        
        Получатель:<input type="text" name="Receiver"></br>
        Тема:<input type="text" name="Theme">
        <!--Поле редактора tinymce-->
        <textarea id="textare" name="WYSIWYG">
            </textarea>
        
        <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
        <!-- Название элемента input определяет имя в массиве $_FILES -->
        Select file to upload: <input name="userfile" type="file" />
        <input type="submit" value="Upload" name="submit" />
    </form>
  </body>
</html>
