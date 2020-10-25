<?php

class Nota {
    //Atributo
    private $id_nota;
    private $nombre_asignatura;
    private $id_alumno;
    private $nota_alumno;

    //Constructor
    function __construct($id_nota, $nombre_asignatura, $id_alumno, $nota_alumno) {
        $this->id_nota=$id_nota;
        $this->nombre_asignatura=$nombre_asignatura;
        $this->id_alumno=$id_alumno;
        $this->nota_alumno=$nota_alumno;
    }

    //Getters and setters
    public function getId_nota() {
        return $this->id_nota;
    }
    public function getNombre_asignatura() {
        return $this->nombre_asignatura;
    }
    public function getId_alumno() {
        return $this->id_alumno;
    }
    public function getNota_alumno() {
        return $this->nota_alumno;
    }

    /**
     * Set the value of id_nota
     *
     * @return  self
     */ 
    public function setId_nota($id_nota) {
        $this->id_nota = $id_nota;
    }
    public function setNombre_asignatura($nombre_asignatura) {
        $this->nombre_asignatura = $nombre_asignatura;
    }
    public function setId_alumno($id_alumno) {
        $this->id_alumno = $id_alumno;
    }
    public function setNota_alumno($nota_alumno) {
        $this->nota_alumno = $nota_alumno;
    }
}

?>