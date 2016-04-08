<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller_messages_menu
 *
 * @author mrSpock
 */
class Controller_Messages_Menu extends Controller {
    
    function action_index()
    {
        //$this->view->generate('messages_menu_view.php', null);
        $this->view->generate('messages_menu_view.php', 'tmpmessage_view.php');
    }
}
