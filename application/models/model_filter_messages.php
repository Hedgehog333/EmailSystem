<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_filter_messages
 *
 * @author mrSpock
 */
class Model_Filter_Messages extends Model{

    private $ID;
    private $CreationDate;
    private $Title;
    private $Body;
    private $dbManager;

    function __construct() {
        $this->dbManager = new DataBase_Messages_Manager();
    }
    /*
     *  Получение TypeID по стобцлу Name    
     */
    private function getTypeId($name){
        
        return $this->dbManager->getTypeId($name);
    }
    /*
     *  Получение MessageID по значению TypeID    
     */
    private function getMessagesIdsByTypeId($name){

        return $this->dbManager->getMessagesIdsByTypeId($name);
    }
    /*
     *  Получение массива сообщений по ID
     */
    private function getMessageById($id){

        return $this->dbManager->getMessageById($id);
    }
<<<<<<< HEAD
    
=======
    /*
     *  Получение массива сообщений
     */
    public function getMessages(){

        return $this->dbManager->getMessages();
    }
>>>>>>> refs/heads/pr/1
    /*
     *  Получение отправителя/получателя по значению MessageID, взависимости от типа письма
     */
    public function ge($id){
        return $this->dbManager->getUserToByMessageId($id);
    }
    private function getWhoseLetter($type,$id){
        $newData = null;
        switch ($type){
            case 'incoming':
                $newData = array_unique($this->dbManager->getUserFromByMessageId($id))['Email'];
                break;
            case 'sent':
                $newData = array_unique($this->dbManager->getUserToByMessageId($id))['Email'];
                break;
            case 'draft':
                $newData = array_unique($this->dbManager->getUserToByMessageId($id))['Email'];
                break;
            case 'spam':
                $newData = array_unique($this->dbManager->getUserFromByMessageId($id))['Email'];
                break;
            case 'basket':
                $newData = array_unique($this->dbManager->getUserFromByMessageId($id))['Email'];
                break;
        }
        return $newData;
        //print_r($this->FromTo);
    }
    /*
     * Проверка, если дата == сегодня - возращается время
     * в противном случае - возвращается дата написания письма
     */
    public function checkDate($date){
        $today = date("Y-m-d");
        $parts = explode(" ", $date);
        if(strtotime($today) != strtotime($parts[0]))
            return $this->getRusDateFormat($parts[0]);
        else{
            return date("H:i");
        }
    }
    /*  Подготовка данных:
     *  - перезапись формата даты/времени
     *  - добавления Email отправителя/получателя
     */
    private function dataPreparation($data, $val){
        $message = array_unique($this->getMessageById($val));
        $message['UserEmail'] = $this->getWhoseLetter($data,$val);
        $message['CreationDate'] = $this->checkDate($message['CreationDate']);
        return $message;
    }
    /*
     *  Заполнение полей класса для вывода данных во View    
     */
    public function get_data($data = null){
        $newData = array();
        $messagesIDs = $this->getMessagesIdsByTypeId($data);
        foreach ($messagesIDs as $val){
            array_push($newData, $this->dataPreparation($data, $val));
        }
        //print_r($newData);
        return $newData;
    }
    /*
     *  Аналог конструктора для заполнения полей класса:
     *  Model_Filter_Messages::create()
                                        ->set('ID', "$put_ID")
                                        ->set('CreationDate', "$put_CreationDate")
                                        ->set('Title', "$put_Title")
                                        ->set('Body', "$put_Body"));
     */
    public static function create() {
        $obj = new self;
        return $obj;
<<<<<<< HEAD
      }
=======
    }
>>>>>>> refs/heads/pr/1
    function set($property, $value) {
        $this->{$property} = $value;
        return $this;
    }
    /*
     *  Реализация методов GET, SET для данных из таблицы Messages
     */
    public function getID(){
        return $this->ID;
    }
    
    public function setID($id){
        $this->ID = $id;
    }
    
    public function getCreationDate(){
        return $this->CreationDate;
    }
    
    public function setCreationDate($date){
        $this->CreationDate = $date;
    }
    
    public function geTitle(){
        return $this->Title;
    }
    
    public function setTitle($title){
        $this->Title = $title;
    }
    
    public function getBody(){
        return $this->Body;
    }
    
    public function setBody($body){
        $this->Body = $body;
    }
    
    /*
     *  Конвертация формата даты с англ на рус
     */
    private function getRusDateFormat($val){
        $translate = array(
        "am" => "дп",
        "pm" => "пп",
        "AM" => "ДП",
        "PM" => "ПП",
        "Monday" => "Понедельник",
        "Mon" => "Пн",
        "Tuesday" => "Вторник",
        "Tue" => "Вт",
        "Wednesday" => "Среда",
        "Wed" => "Ср",
        "Thursday" => "Четверг",
        "Thu" => "Чт",
        "Friday" => "Пятница",
        "Fri" => "Пт",
        "Saturday" => "Суббота",
        "Sat" => "Сб",
        "Sunday" => "Воскресенье",
        "Sun" => "Вс",
        "January" => "Января",
        "Jan" => "Янв",
        "February" => "Февраля",
        "Feb" => "Фев",
        "March" => "Марта",
        "Mar" => "Мар",
        "April" => "Апреля",
        "Apr" => "Апр",
        "May" => "Мая",
        "May" => "Мая",
        "June" => "Июня",
        "Jun" => "Июн",
        "July" => "Июля",
        "Jul" => "Июл",
        "August" => "Августа",
        "Aug" => "Авг",
        "September" => "Сентября",
        "Sep" => "Сен",
        "October" => "Октября",
        "Oct" => "Окт",
        "November" => "Ноября",
        "Nov" => "Ноя",
        "December" => "Декабря",
        "Dec" => "Дек",
        "st" => "ое",
        "nd" => "ое",
        "rd" => "е",
        "th" => "ое"
        );
        $oldDate = date("j F", strtotime($val));  
        $str = explode(" ", $oldDate);
        
        if (array_key_exists($str[1], $translate)) {
            $newDate = str_replace($str[1], $translate[$str[1]], $oldDate);
            return $newDate;
        }
    }
}
