
    <table class="table table-hover">
        <tbody class="view-messages">
            <?php
            //print_r($data);
            $dad = new DataBase_Messages_Manager();
            print_r($dad->getMessagesToUser($_SESSION['ID']));
            if(isset($data))
              foreach($data as $row)
            {
                $ClassRead = !$dad->getIsRead($row["ID"])?"not_read":"";
                  echo '<tr class="message_form '.$ClassRead.' ">
                        <td id="id" class="id" hidden="true">'.$row["ID"].'</td>
                        <td><input class="cheking" type="checkbox"></td>
                        <td id="sender" class="sender">'.$row["UserEmail"].'</td>
                        <td class="title">'.$row["Title"].' - </td>
                        <td class="body u">'.$row["Body"].'</td>
                        <td class="date u" align="right">'.$row["CreationDate"].'</td>
                        </tr>';
            }
            ?>
        </tbody>
    </table>

  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script type="text/javascript">
    var val;
    // По клику получаем данные письма
    $('.message_form').click(function(){
        var message = {};
        message.id = $(this).children(".id").text();        
        message.sender = $(this).children(".sender").text();
        message.title = $(this).children(".title").text();
        message.body = $(this).children(".body").text();
        message.date = $(this).children(".date").text();

        //alert(val);
        send(message);
    });
    $(document).on('change','.cheking',function(e){
        if(this.checked)
            alert(val);
    });
    /*$(function(){
        $(window).scroll(function() {
            var top = $(document).scrollTop();
            if (top < 100) $(".navbar navbar-vertical-left").css({top: '0', position: 'relative'});
            else $(".navbar-vertical-left").css({top: '10px', position: 'fixed'});
        });
    });*/
    /*$(document).ready(function(){
    var br = $.browser;
    $(window).scroll(function() {
        var top = $(document).scrollTop();
        if (top < 61) {
            $(".navbar-vertical-left").css({top: '0', position: 'relative', marginLeft: '25px'});
        } else if ((!br.msie) || ((br.msie) && (br.version > 7))) {
            $(".navbar-vertical-left").css({top: '22px', position: 'fixed', marginLeft: '535px'});
        } else if ((br.msie) && (br.version <= 7)) {
            $(".navbar-vertical-left").css({top: '22px', position: 'fixed', marginLeft: '25px'});
        }
    });
});*/
    
    /* Данная функция создаёт кроссбраузерный объект XMLHTTP */
      /*function getXmlHttp() {
        var xmlhttp;
        try {
          xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
        try {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
          xmlhttp = false;
        }
        }
        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
          xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
      }*/

    function send(object) {
        //console.log(object);
        var form = $('<form action="/openmessage" method="post">' +
        '<input type="hidden" name="MessageId" value="'+ object.id +'" />' +
        '<input type="hidden" name="MessageSender" value="'+ object.sender +'" />' +
        '<input type="hidden" name="MessageTitle" value="'+ object.title +'" />' +
        '<input type="hidden" name="MessageBody" value="'+ object.body +'" />' +
        '<input type="hidden" name="MessageDate" value="'+ object.date +'" />' +
        '</form>');
        $('body').append(form);
        $(form).submit();
        
        /*var xmlhttp = $(this).getXmlHttp(); // Создаём объект XMLHTTP
        xmlhttp.open('POST', 'filter_messages/open', true); // Открываем асинхронное соединение
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
        xmlhttp.send("ID=" + encodeURIComponent(id)); // Отправляем POST-запрос
        xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
          if (xmlhttp.readyState == 4) { // Ответ пришёл
            if(xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
              document.getElementById("send").innerHTML = xmlhttp.responseText; // Выводим ответ сервера
            }
          }
        };*/
    }
  </script>