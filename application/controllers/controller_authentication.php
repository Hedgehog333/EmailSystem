<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Authentication extends Controller
{
    function action_index()
    {
        //TODO: database
        $this->view->generate('authentication_view.php', 'template_view.php', $data);
    }
}