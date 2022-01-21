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

        $req = mysqli_query($this->bdd, "SELECT * FROM utilisateurs WHERE login = '$this->login'");
        $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
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
        mysqli_query($this->bdd, "UPDATE utilisateurs SET login = '$login', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE login = '".$this->login."'");
    var_dump($this->login);
    var_dump("UPDATE utilisateurs SET login = '$login', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE login = '".$this->login."'");
    }

    public function isConnected() {
       
    }

}

?>
