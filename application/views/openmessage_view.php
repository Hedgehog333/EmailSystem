<style type="text/css">
    ul li {
        float: left;
        margin: 2px 10px;
    }
    ul {
        overflow: hidden;
    }
    .panel-primary > *{
        padding: 8px 20px;
    }
</style>
<?php
    if(isset($_POST['MessageId'])){
        $m = new DataBase_Messages_Manager();
        $m->setIsRead($_POST['MessageId']);
    }
?>
<span class="date"><?= $_POST['MessageDate'] ?></span>
<h3><?= $_POST['MessageTitle'] ?></h3>
<ul>
    <li><?= $_POST['MessageSender'] ?></li>
</ul>

<div>
    <?= $_POST['MessageBody'] ?>
</div>