<?php
require_once 'persona.php';

class Alumno extends Persona {
    //Atributo
    private $nombre_alumno;
    private $apellido_paterno;
    private $apellido_materno;
    private $grupo_alumno;

    //Constructor
    function __construct($nombre_alumno, $apellido_paterno, $apellido_materno, $grupo_alumno, $email_alumno, $pass_alumno) {
        parent::__construct($email_alumno, $pass_alumno);
        $this->nombre_alumno=$nombre_alumno;
        $this->apellido_paterno=$apellido_paterno;
        $this->apellido_materno=$apellido_materno;
        $this->grupo_alumno=$grupo_alumno;
        $this->email_alumno=$email_alumno;
        $this->pass_alumno=$pass_alumno;
    }

    //Getters and setters
    public function getId_alumno() {
        return $this->id_alumno;
    }
    public function getNombre_alumno() {
        return $this->nombre_alumno;
    }
    public function getApellido_paterno() {
        return $this->apellido_paterno;
    }
    public function getApellido_materno() {
        return $this->apellido_materno;
    }
    public function getGrupo_alumno() {
        return $this->grupo_alumno;
    }
    public function getEmail_alumno() {
        return $this->email_alumno;
    }
    public function getPass_alumno() {
        return $this->pass_alumno;
    }

    public function setId_alumno($id_alumno) {
        $this->id_alumno = $id_alumno;
    }
    public function setNombre_alumno($nombre_alumno) {
        $this->nombre_alumno = $nombre_alumno;
    }
    public function setApellido_paterno($apellido_paterno) {
        $this->apellido_paterno = $apellido_paterno;
    }
    public function setApellido_materno($apellido_materno) {
        $this->apellido_materno = $apellido_materno;
    }
    public function setGrupo_alumno($grupo_alumno) {
        $this->grupo_alumno = $grupo_alumno;
    }
    public function setEmail_alumno($email_alumno) {
        $this->email_alumno = $email_alumno;
    }
    public function setPass_alumno($pass_alumno) {
        $this->pass_alumno = $pass_alumno;
    }
}

?>