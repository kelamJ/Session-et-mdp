<?php
    session_start();
    if($_SESSION["autoriser"]!="oui"){
        header("location:login_form.php");
        exit();
    }
        if(date("H")<18) 
        $bienvenue="Bonjour et bienvenue ".
        $_SESSION["prenomNom"].
        " dans votre espace personnel vos login / mot de passe sont valides";
        else
        $bienvenue="Bonsoir et bienvenue ".
        $_SESSION["prenomNom"].
        " dans votre espace personnel vos login / mot de passe sont valides";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Exercice Mdp</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="">
    </head>
    
    <body onLoad="document.fo.login.focus()">
    <h2>
        <?php
        // Ici on est bien loggué, on affiche un message
        echo $bienvenue, $_SESSION['prenomNom'], ' tout est ok ';
        ?>
    </h2>
    [ <a href="deconnexion.php">Se déconnecter</a> ]
    </body>
</html>