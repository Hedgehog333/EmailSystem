<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Filter_Messages extends Controller{
    
    function __construct()
    {
        $this->model = new Model_Filter_Messages();
        $this->view = new View();
    }
        
    public function action_incoming(){
        if(isset($_POST['incoming'])){
            $menuType = 'incoming';
            echo $menuType;
            $this->getData($menuType);
        }
    }

    public function action_sent(){
        if(isset($_POST['sent'])){
            $menuType = 'sent';
            $this->getData($menuType);
        }
    }

    public function action_draft(){
        if(isset($_POST['draft'])){
            $menuType = 'draft';
            $this->getData($menuType);
        }
    }

    public function action_spam(){
        if(isset($_POST['spam'])){
            $menuType = 'spam';
            $this->getData($menuType);
        }
    }

    public function action_basket(){
        if(isset($_POST['basket'])){
            $menuType = 'basket';
            $this->getData($menuType);
        }
    }
    
    public function action_open(){
        if(isset($_POST['ID'])){
            echo $_POST['ID'];
        }
    }
    
    /*
     *  Получение из модели содержимого таблицы Messages по ID
     */
    function getData($menuType){
        $data = $this->model->get_data($menuType);
        //echo $data;
        $this->view->generate('messages_menu_view.php', null, $data);
       /* $messageID = $this->modelFilterMessages->getMessagesIdByTypeId($menuType);
        foreach ($messageID as $val){
            $messages = array_unique($this->modelFilterMessages->getMessages($val));
            foreach ($messages as $message){
                $newVal = array_unique($message);
                extract($newVal, EXTR_PREFIX_ALL, "put");
                array_push($newObj, Model_Filter_Messages::create()
                                            ->set('ID', "$put_ID")
                                            ->set('CreationDate', "$put_CreationDate")
                                            ->set('Title', "$put_Title")
                                            ->set('Body', "$put_Body"));
            }
        }        
        print_r($newObj);//$this->view->generate('messages_menu_view.php', null, $newObj);*/
    }
}