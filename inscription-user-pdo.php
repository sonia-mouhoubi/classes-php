<?php
session_start();
require 'user-pdo.php';

// Nouvelle instance de la classe user
if(isset($_POST['button'])) {
    $user = new Userpdo();
    $user->register($_POST['login'], $_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
    header('Location: connexion-user.php');
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
                <h1>Formulaire d'inscription</h1>

                <form class="form" action="" method="post">

                    <label for="login">Login</label>
                    <input type="text" id="login" name="login">

                    <label for="firstname">Prénom</label>
                    <input type="text" id="firstname" name="firstname">

                    <label for="lastname">Nom</label>
                    <input type="text" id="lastname" name="lastname">
                    
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                    
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
   