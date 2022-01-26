<?php
require 'user-pdo.php';
session_start();
var_dump($_SESSION);

if(isset($_POST['button'])) {
        $user = new Userpdo();
        $res = $user->connect($_POST['login'], $_POST['password']);
        if(!empty($res)) {
        // $_SESSION['login'] = $res[0]['login'];
        $_SESSION['login'] = $user->login; 

        if(isset($_SESSION['login'])) {
            echo 'Bonjour '.$_SESSION['login'];
        }        
    }  
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil - Réservation de salles</title>
        <meta name="description" content="Création d'un site web de réservation de salles">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
        <link href="../styles/css/css.css" rel="stylesheet">
    </head>
    <body>
      <?php require 'header.php'?>
        <main>
            <section>
                <h1>Formulaire de connexion</h1> 

                <form class="form" action="" method="post">
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login">

                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                    
                    <input type="submit" id="button" name="button">
                </form>
            </section>
        </main>
        <footer>

        </footer>
    </body>
</html>
   