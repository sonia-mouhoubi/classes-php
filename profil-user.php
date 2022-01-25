<?php
require 'user.php';
session_start();
$user = new User();

// Afficher les infos de l'utilisateur connéctée
$bdd = mysqli_connect("localhost", "root", "", "classes");
    $session_login = $_SESSION['login']; 
if(isset($_SESSION['login'])) {
    $req = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$session_login'");
    $res = mysqli_fetch_All($req, MYSQLI_ASSOC);
}
// MODIFIER
if(isset($_POST['modifier'])) {
    $user->update($_POST['login'], $_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);

    // $user->update($_POST['login'], $_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
    // var_dump($user);
}

echo $user->isConnected();

$res = $user->getAllInfos();

$res1 = $user->getLogin();
var_dump($res1);
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
        <form action="" method="post">
            <input type="submit" id="deconnect" name="deconnect" value="Déconnexion">
        </form> 
            <section>
                <h1>Formulaire d'inscription</h1>

                <form class="form" action="" method="post">
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login" value="<?php if(isset($_SESSION['login'])) {echo $res[0]['login'];}?>">

                    <label for="firstname">Prénom</label>
                    <input type="text" id="firstname" name="firstname" value="<?php if(isset($_SESSION['login'])) {echo $res[0]['firstname'];}?>">

                    <label for="lastname">Nom</label>
                    <input type="text" id="lastname" name="lastname" value="<?php if(isset($_SESSION['login'])) {echo $res[0]['lastname'];}?>">
                    
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php if(isset($_SESSION['login'])) {echo $res[0]['email'];}?>">
                    
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                    
                    <input type="submit" id="modifier" name="modifier">
                </form>
            </section>
        </main>
        <footer>

        </footer>
    </body>
</html>
   