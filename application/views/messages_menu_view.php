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
            <form action="filter_messages/incoming" method="Post">
                <a class="newMessage" href>
                    <i class="fa fa-fw fa-lg fa-font"></i>
                    <input class="incoming_sidebar" type="submit" name="incoming" value="">
                    <input class="text" type="submit" hidden="true" name="incoming" value="Входящие">
                </a>
            </form>
        </li>
        <li>
            <form action="filter_messages/sent" method="Post">
                <a class="newMessage" href>
                    <i class="fa fa-fw fa-lg fa-rocket"></i> 
                    <input class="sent_sidebar" type="submit" name="sent" value=""/>
                    <input class="text" type="submit" hidden="true" name="sent" value="Исходящие">
                </a>
            </form>
        </li>
        <li>
            <form action="filter_messages/draft" method="Post">
                <a class="newMessage" href>
                    <i class="fa fa-fw fa-lg fa-cog"></i> 
                    <input class="draft_sidebar" type="submit" name="draft" value=""/>
                    <input class="text" type="submit" hidden="true" name="draft" value="Черновик">
                </a>
            </form>
        </li>
        <li>
          <form action="filter_messages/spam" method="Post">
                <a class="newMessage" href>
                    <i class="fa fa-fw fa-lg fa-cog"></i> 
                    <input class="spam_sidebar" type="submit" name="spam" value=""/>
                    <input class="text" type="submit" hidden="true" name="spam" value="Спам">
                </a>
            </form>
        </li>
        <li>
          <form action="filter_messages/basket" method="Post">
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
                        <tr class="message_form">
                            <td><input class="cheking" type="checkbox"></td>
                            <td id="sender">John</td>
                            <td>kjhgfddfghjkjhgfdfghj - </td>
                            <td class="body u">Ой... что-то затупил, да я написал как вы все получилось, спасибо) Но у меня еще один вопрос есть, как сделать так, чтобы не только вот это имя добавлялось в input, а еще этот инпут становился как focus, то есть чтобы не нужно было активировать его, а он сам активировался, после того как добавиться переменная name в него.</td>
                            <td class="date u" align="right">14:12</td>
                        </tr>
                        <tr class="message_form">
                            <td><input type="checkbox"></td>
                            <td id="sender">Kely</td>
                            <td>nfhisdhjfkdshf - </td>
                            <td class="body u">Ой... что-то затупил, да я написал как вы все получилось, спасибо) Но у меня еще один вопрос есть, как сделать так, чтобы не только вот это имя добавлялось в input, а еще этот инпут становился как focus, то есть чтобы не нужно было активировать его, а он сам активировался, после того как добавиться переменная name в него.</td>
                            <td class="date u" align="right">22:12</td>
                        </tr>
                        <tr class="message_form">
                            <td><input type="checkbox"></td>
                            <td id="sender">John</td>
                            <td>kjhgfddfghjkjhgfdfghj - </td>
                            <td class="body u">Ой... что-то затупил, да я написал как вы все получилось, спасибо) Но у меня еще один вопрос есть, как сделать так, чтобы не только вот это имя добавлялось в input, а еще этот инпут становился как focus, то есть чтобы не нужно было активировать его, а он сам активировался, после того как добавиться переменная name в него.</td>
                            <td class="date u" align="right">14:12</td>
                        </tr>
                        <tr class="message_form">
                            <td><input type="checkbox"></td>
                            <td id="sender">John</td>
                            <td>kjhgfddfghjkjhgfdfghj - </td>
                            <td class="body u">Ой... что-то затупил, да я написал как вы все получилось, спасибо) Но у меня еще один вопрос есть, как сделать так, чтобы не только вот это имя добавлялось в input, а еще этот инпут становился как focus, то есть чтобы не нужно было активировать его, а он сам активировался, после того как добавиться переменная name в него.</td>
                            <td class="date u" align="right">14:12</td>
                        </tr>
                        <tr class="message_form">
                            <td><input type="checkbox"></td>
                            <td id="sender">John</td>
                            <td>kjhgfddfghjkjhgfdfghj - </td>
                            <td class="body u">Ой... что-то затупил, да я написал как вы все получилось, спасибо) Но у меня еще один вопрос есть, как сделать так, чтобы не только вот это имя добавлялось в input, а еще этот инпут становился как focus, то есть чтобы не нужно было активировать его, а он сам активировался, после того как добавиться переменная name в него.</td>
                            <td class="date u" align="right">14:12</td>
                        </tr>
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
    
    function addItem(id, sender, title, body, date) {
        alert(id);
        var tr = $('<tr/>',{
            'class': 'message_form'
        }).appendTo('.view-messages');
        var td_id = $('<td/>', {
            id: 'id',
            hidden: 'true'
        }).html(id).appendTo(tr);
        var td_input = $('<td/>').appendTo(tr);
        var input = $('<input/>',{
            class: 'cheking',
            type: 'checkbox'
        }).appendTo(td_input);
        var td_sender = $('<td/>',{
            id: 'sender'
        }).html(sender).appendTo(tr);
        var td_title = $('<td/>').html(title).appendTo(tr);
        var td_body = $('<td/>',{
            class: 'body u'
        }).html(body).appendTo(tr);
        var td_date = $('<td/>',{
            class: 'date u',
            align: 'right'
        }).html(date).appendTo(tr);
        /*$('.view-messages').append('\
            <tr class="message_form">\
                <td id="id" hidden="true">id</td>\
                <td><input class="cheking" type="checkbox"></td>\
                <td id="sender">sender</td>\
                <td>title - </td>\
                <td class="body u">body</td>\
                <td class="date u" align="right">date</td>\
            </tr>\
        ');*/
    }
  
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
  <div style="left:200px;" >
      <?php
      //print_r($data);
        foreach($data as $row)
	
            //
            //echo $row["ID"];
            //echo '<script type="text/javascript">addItem($row["ID"],$row["Title"],$row["Body"],$row["CreationDate"]);</script>';
            ?><script type="text/javascript">addItem('<?=$row["ID"]?>','<?=$row["UserEmail"]?>','<?=$row["Title"]?>','<?=$row["Body"]?>','<?=$row["CreationDate"]?>');</script>
        
  </div>
</body>
</html>
