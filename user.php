<?php
class User {
    private $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $bdd;

    public function __construct() {
        $this->bdd = mysqli_connect("localhost", "root", "", "classes");
    }
    
    public function register($login, $password, $email, $firstname, $lastname) {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        mysqli_query($this->bdd, "INSERT INTO `utilisateurs`(`login`, `password`, `email`, `firstname`, `lastname`) VALUES ('$this->login', '$this->password', '$this->email', '$this->firstname', '$this->lastname')");   
    }
  
    public function connect($login, $password) {
        $this->login = $login;
        $this->password = $password;

        $req = mysqli_query($this->bdd, "SELECT * FROM utilisateurs WHERE login = '$this->login' AND password = '$this->password'");
        $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
        return $res;
    }

    public function disconnect() {
        // unset($_SESSION['user'],$_SESSION['login']);
        session_destroy();  
    }

    public function delete($login) {
        mysqli_query($this->bdd, "DELETE FROM `utilisateurs` WHERE login = '$login'");
        session_destroy();  
    }

    public function update($login, $password, $email, $firstname, $lastname) {
        $session_login = $_SESSION['login'];

        mysqli_query($this->bdd, "UPDATE utilisateurs SET login = '$login', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE login = '$session_login'");

        var_dump("UPDATE utilisateurs SET login = '$login', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE login = '$session_login'");
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

        $req = mysqli_query($this->bdd, "SELECT * FROM utilisateurs WHERE login = '$session_login'");
        $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
        return $res;   
    }

    public function getLogin() {
        $session_login = $_SESSION['login'];

        $req = mysqli_query($this->bdd, "SELECT login FROM utilisateurs WHERE login = '$session_login'");
        $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
        return $res;   
    }
    public function getEmail() {
        $session_login = $_SESSION['login'];

        $req = mysqli_query($this->bdd, "SELECT email FROM utilisateurs WHERE login = '$session_login'");
        $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
        return $res;    
    }

    public function getFirstname() {
        $session_login = $_SESSION['login'];

        $req = mysqli_query($this->bdd, "SELECT firstname FROM utilisateurs WHERE login = '$session_login'");
        $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
        return $res;
    }

    public function getLastname() {
        $session_login = $_SESSION['login'];

        $req = mysqli_query($this->bdd, "SELECT firstname FROM utilisateurs WHERE login = '$session_login'");
        $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
        return $res;
    }
}

?>
