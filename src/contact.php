<?php
  class Contact {

    private $name;
    private $email;
    private $phonenumber;

//Setting constructor
    function __construct($name, $email, $phonenumber) {
      $this->name = $name;
      $this->email = $email;
      $this->phonenumber = $phonenumber;
    }

//Setting setters
    function setName($new_name) {
      $this->name = (string) $new_name;
    }
    function setEmail($new_email) {
      $this->email = (string) $new_email;
    }
    function setPhonenumber($new_phonenumber) {
      $this->phonenumber = (string) $new_phonenumber;
    }

//Setting getters
    function getName() {
      return $this->name;
    }
    function getEmail() {
      return $this->email;
    }
    function getPhonenumber() {
      return $this->phonenumber;
    }


//Setting static methods
    function save() {  //saving list to cookie
      array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getAll() {  //getting list of
      return $_SESSION['list_of_contacts'];
    }

    static function deleteAll() {
      $_SESSION['list_of_contacts'] = array();
    }

  }
?>
