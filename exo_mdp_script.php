<?php
 // Récupération du login et du password :
$nom = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
$prenom = (isset($_POST['prenom']) && $_POST['prenom'] != "") ? $_POST['prenom'] : Null;
$mail = (isset($_POST['mail']) && $_POST['mail'] != "") ? $_POST['mail'] : Null;
$pass = (isset($_POST['pass']) && $_POST['pass'] != "") ? $_POST['pass'] : Null;

// En cas d'erreur, on renvoie vers le formulaire
if ($login == Null || $prenom == Null || $mail == Null || $pass == Null){
    header("Location: exo_mdp.php");
    exit;
}

// S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
require "db.php"; 
$db = connexionBase();

try {
    // Construction de la requête
    $requete = $db->prepare("INSERT INTO user (user_nom, user_prenom, user_mail, user_password) VALUES (:login, :prenom, :mail, :password);");

    $requete->bindValue(":nom", $login, PDO::PARAM_STR);
    $requete->bindValue(":prenom", $prenom, PDO::PARAM_STR);
    $requete->bindValue(":mail", $mail, PDO::PARAM_STR);
    $requete->bindValue(":pass", $password, PDO::PARAM_STR);

    //Lancement de la requête :
    $requete->execute();

    // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
    $requete->closeCursor();
}

// Gestion des erreurs 
catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (exo_mdp_script.php)");
}

// Si OK: redirection vers la page artists.php
header("Location: login_form.php");

// Fermeture du script
exit;
?>