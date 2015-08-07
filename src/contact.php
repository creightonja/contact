<?php

//setting class variables
class Contact
{
  private $name;
  private $email;
  private $phone_number;


//creating constructor
  function __construct($name, $email, $phone_number) {
    $this->name = $name;
    $this->email = $email;
    $this->phone_number = $phone_number;
  }

//creating setters
  function setName($new_name){
    $this->name = (string) $new_name;
  }

  function setEmail($new_email){
    $this->email = (string) $new_email;
  }

  function setNumber($new_phone_number){
    $this->phone_number = (string) $new_phone_number;
  }


//creating getters
  function getName(){
    return $this->name;
  }

  function getEmail(){
    return $this->email;
  }

  function getPhone_number(){
    return $this->Phone_number;
  }


//save method for static data
  function save(){
    array_push($_SESSION['list_of_contacts'], $this);
  }

//get method for static data
  static function getAll(){
    return $_SESSION['list_of_contacts'];
  }

  static function deleteAll(){
    $_SESSION['list_of_contacts'] = array();
  }
}
?>
