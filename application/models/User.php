<?php

class User extends CI_Model {

    private $id;
    private $email;
    private $name;
    private $surname;
    private $phone;
    private $address;
    private $password;
    private $created;

    function __construct() {
        parent::__construct();
    }
       

}
