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
                <?php include 'application/views/'.$content_view; ?>
            </div>
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
          </script>
</body>
</html>
