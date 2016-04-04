<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bootstrap Vertical Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
  
  <!-- Twitter Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/filter_messages.css">
  <link rel="stylesheet" href="../../css/bootstrap-vertical-menu.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
</head>
<body>
    <nav class="navbar navbar-vertical-left">
      <ul class="nav navbar-nav">
        <li>
          <a class="newMessage" href>
            <i class="fa fa-fw fa-lg fa-star"></i> 
            <img src="../../images/messages/new_message.png" style="position: relative;left: -30px;"/><br>
            <span class="text" hidden="true">Написать письмо</span>
          </a>
        </li>
        <li>
            <form action="/filter_messages/incoming" method="Post">
                <a class="newMessage" href>
                    <i class="fa fa-fw fa-lg fa-rocket"></i> 
                    <input class="incoming_sidebar" type="submit" name="incoming" value=""/>
                    <input class="text" type="submit" hidden="true" name="incoming" value="Входящие">
                </a>
            </form>
        </li>
        <li>
            <form action="/filter_messages/sent" method="Post">
                <a class="newMessage" href>
                    <i class="fa fa-fw fa-lg fa-rocket"></i> 
                    <input class="sent_sidebar" type="submit" name="sent" value=""/>
                    <input class="text" type="submit" hidden="true" name="sent" value="Исходящие">
                </a>
            </form>
        </li>
        <li>
            <form action="/filter_messages/draft" method="Post">
                <a class="newMessage" href>
                    <i class="fa fa-fw fa-lg fa-cog"></i> 
                    <input class="draft_sidebar" type="submit" name="draft" value=""/>
                    <input class="text" type="submit" hidden="true" name="draft" value="Черновик">
                </a>
            </form>
        </li>
        <li>
          <form action="/filter_messages/spam" method="Post">
                <a class="newMessage" href>
                    <i class="fa fa-fw fa-lg fa-cog"></i> 
                    <input class="spam_sidebar" type="submit" name="spam" value=""/>
                    <input class="text" type="submit" hidden="true" name="spam" value="Спам">
                </a>
            </form>
        </li>
        <li>
          <form action="/filter_messages/basket" method="Post">
                <a class="newMessage" href>
                    <i class="fa fa-fw fa-lg fa-cog"></i> 
                    <input class="trash_sidebar" type="submit" name="basket" value=""/>
                    <input class="text" type="submit" hidden="true" name="basket" value="Корзина">
                </a>
            </form>
        </li>
      </ul>
    </nav>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading"></div>
            <table class="table table-hover">
                <tbody class="view-messages">
                    <?php
                    //print_r($data);
                      foreach($data as $row)
                          echo '<tr class="message_form">
                                <td id="id" hidden="true">'.$row["ID"].'</td>
                                <td><input class="cheking" type="checkbox"></td>
                                <td id="sender">'.$row["UserEmail"].'</td>
                                <td>'.$row["Title"].' - </td>
                                <td class="body u">'.$row["Body"].'</td>
                                <td class="date u" align="right">'.$row["CreationDate"].'</td>
                                </tr>';
                    ?>
                </tbody>
            </table>
        </div> 
    </div>

  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('form').click(function() {
        $('form').removeClass('selected');
        $(this).addClass('selected');
        event.preventDefault();
      })
    });
    // показать текст меню
    $('.newMessage').hover (
        function(){$(this).children('.text').fadeIn(300);},
        function(){$(this).children('.text').fadeOut(300)}
    );
    
    var val;
    // По клику получаем данные письма
    $('.message_form').click(function(){
        val = $(this).text();
        //alert(val);
        addItem();
        send(val);
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

    function send(id) {
        alert(id);
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
</body>
</html>
