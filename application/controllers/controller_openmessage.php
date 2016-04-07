<?php

class Controller_Openmessage extends Controller {
    
    function action_index()
    {
        $this->view->generate('openmessage_view.php', 'tmpmessage_view.php');
    }
}
