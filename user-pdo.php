<?php
class Userpdo {
    private $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $bdd;

    public function __construct() {
        try {
            $this->bdd = new PDO(
                'mysql:host=localhost; dbname=classes; charset=utf8',
                'root',
                '');
        } catch (PDOexeptiion $e) {
            
            die('Erreur :'.$e->getMessage());
        }

        // try
        // {
        //     $db = new PDO('mysql:host=localhost;dbname=my_recipes;charset=utf8', 'root', 'root');
        // }
        // catch (Exception $e)
        // {
        //         die('Erreur : ' . $e->getMessage());
        // }
    }
    
    public function register($login, $password, $email, $firstname, $lastname) {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        $register = $this->bdd->prepare("INSERT INTO `utilisateurs`(`login`, `password`, `email`, `firstname`, `lastname`) 
        VALUES (:login, :password, :email, :firstname, :lastname");
        $array = [':login'=>$login, ':password'=>$password, ':email'=>$email, ':firstname'=>$firstname, ':lastname'=>$lastname];
        $register->execute($array);
    }
    public function connect($login, $password) {
        $this->login = $login;
        $this->password = $password;

        $connect = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login = :login AND password = :password");
        $array = [':login'=>$login, ':password'=>$password];
        $connect->execute($array);
        $res = $connect->fetchAll();
        return $res;
    }

    public function disconnect() {
        session_destroy();  
    }

    public function delete($login) {
        $delete = $this->bdd->prepare("DELETE FROM `utilisateurs` WHERE login = :login");
        $array = [':login'=>$login];
        $delete->execute($array);
        session_destroy();  
    }

    public function update($login, $password, $email, $firstname, $lastname) {
        $session_login = $_SESSION['login'];

        $update = $this->bdd->prepare("UPDATE utilisateurs SET login = :login, password = :password, email = :email, firstname = :firstname, lastname = :lastname WHERE login = '$session_login'");
        $array = [':login'=>$login, ':password'=>$password, ':email'=>$email, ':firstname'=>$firstname, ':lastname'=>$lastname];
        $update->execute($array);
    }

    public function isConnected() {
        if(isset($_SESSION['login'])) {
            return true;
        }
        else {
            return false;
        }  
    }

    public function getAllInfos() {
        $session_login = $_SESSION['login'];

        $getAllInfos = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login = '$session_login'");
        $getAllInfos->execute();
        $res = $getAllInfos->fetch();
        return $res;   
    }

    public function getLogin() {
        $session_login = $_SESSION['login'];

        $getLogin = $this->bdd->prepare("SELECT login FROM utilisateurs WHERE login = '$session_login'");
        $getLogin->execute();
        $res = $getLogin->fetch();
        return $res;  
    }
    public function getEmail() {
        $session_login = $_SESSION['login'];

        $getEmail = $this->bdd->prepare("SELECT email FROM utilisateurs WHERE login = '$session_login'");
        $getEmail->execute();
        $res = $getEmail->fetch();
        return $res;     
    }

    public function getFirstname() {
        $session_login = $_SESSION['login'];

        $getFirstname = $this->bdd->prepare("SELECT firstname FROM utilisateurs WHERE login = '$session_login'");
        $getFirstname->execute();
        $res = $getFirstname->fetch();
        return $res;    
    }

    public function getLastname() {
        $session_login = $_SESSION['login'];

        $getLastname = $this->bdd->prepare("SELECT email FROM utilisateurs WHERE login = '$session_login'");
        $getLastname->execute();
        $res = $getLastname->fetch();
        return $res;    
    }
}
?>

