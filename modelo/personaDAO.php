<?php

class personaDAO{
    private $pdo;

    public function __construct(){
        include 'connection.php';
        $this->pdo=$pdo;
    }

    public function login($user){
        $query = "SELECT * FROM `tbl_administrador` WHERE `email_admin`=? AND `pass_admin`=?";
        $sentencia=$this->pdo->prepare($query);
        $email = $user->getEmail_admin();
        $psswd = $user->getPass_admin();
        $sentencia->bindParam(1,$email);
        $sentencia->bindParam(2,$psswd);
        $sentencia->execute();
        $result=$sentencia->fetch(PDO::FETCH_ASSOC);
        $numRow=$sentencia->rowCount();
        if(!empty($numRow) && $numRow==1){
            $user->setId_admin($result['id_admin']);
            session_start();
            $_SESSION['user']=$user;
            return true;
        }else {
            return false;
        }
    }
}

?>