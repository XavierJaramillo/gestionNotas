<?php

abstract class Persona {
    //Atributo
    protected $id;
    protected $email;
    protected $pass;

    //Constructor
    function __construct($email, $pass) {
        $this->email=$email;
        $this->pass=$pass;
    }

    //Getters and setters
    public function getId() {
        return $this->id;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPass() {
        return $this->pass;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPass($pass) {
        $this->pass = $pass;
    }
}

?>