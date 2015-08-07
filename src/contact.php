<?php

//setting class variables
class Contact
{
  private $name;
  private $email;
  private $number;


//creating constructor
  function __construct($name, $email, $number) {
    $this->name = $name;
    $this->email = $email;
    $this->number = $number;
  }

//creating setters
  function setName($new_name){
    $this->name = $new_name;
  }

  function setEmail($new_email){
    $this->email = $new_email;
  }

  function setNumber($new_number){
    $this->number = $new_number;
  }


//creating getters
  function getName(){
    return $this->name;
  }

  function getEmail(){
    return $this->email;
  }

  function getNumber(){
    return $this->number;
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
