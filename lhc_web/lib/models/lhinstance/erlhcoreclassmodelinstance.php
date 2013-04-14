<?php

class erLhcoreClassModelInstance {

   public function getState()
   {
       return array(
               'id'              		=> $this->id,
               'name'            		=> $this->name,
               'domain'            		=> $this->domain,
               'email'            		=> $this->email,
               'remote_instance_id'     => $this->remote_instance_id,
               'status'            		=> $this->status
       );
   }

   public function setState( array $properties )
   {
       foreach ( $properties as $key => $val )
       {
           $this->$key = $val;
       }
   }

   public function __toString(){
   		return $this->name;
   }

   public static function fetch($chat_id) {
       	 $chat = erLhcoreClassInstance::getSession()->load( 'erLhcoreClassModelInstance', (int)$chat_id );
       	 return $chat;
   }

   public function saveThis() {
       	 erLhcoreClassInstance::getSession()->saveOrUpdate($this);
   }

   public function updateThis() {
       	 erLhcoreClassInstance::getSession()->update($this);
   }

   public function removeThis() {
       	 erLhcoreClassInstance::getSession()->delete($this);
   }

   public function setIP()
   {
       $this->ip = $_SERVER['REMOTE_ADDR'];
   }

   public function __get($var) {

       switch ($var) {

       	case 'departments':
       		   $this->departments = erLhcoreClassModelDepartament::getList(array('filter' => array('instance_id' => $this->id)));
       		   return $this->departments;
       		break;

       	default:
       		break;
       }

   }

   const STATUS_ACTIVE = 1;
   const STATUS_IN_ACTIVE = 0;

   public $id = null;
   public $name = '';
   public $domain = '';
   public $email = '';
   public $status = self::STATUS_ACTIVE;
   public $remote_instance_id = 0;
}

?>