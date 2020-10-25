<?php
require_once 'persona.php';

class Administrador extends Persona {
    //Atributo (todos heredados)

    //Constructor
    function __construct($email_admin, $pass_admin) {
        parent::__construct($email_admin, $pass_admin);
        $this->email_admin=$email_admin;
        $this->pass_admin=$pass_admin;
    }

    //Getters and setters
    public function getId_admin() {
        return $this->id_admin;
    }
    public function getEmail_admin() {
        return $this->email_admin;
    } 
    public function getPass_admin() {
        return $this->pass_admin;
    }

    public function setId_admin($id_admin) {
        $this->id_admin = $id_admin;
    }
    public function setEmail_admin($email_admin) {
        $this->email_admin = $email_admin;
    }
    public function setPass_admin($pass_admin) {
        $this->pass_admin = $pass_admin;
    }
}

?>