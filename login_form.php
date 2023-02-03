<?php
// On démarre une session sur chaque page ou on utitlise session_star().
session_start();
// On récupère les valeurs
@$mail=$_POST["mail"];
    // Fonction md5 qui hash le mot de passe pour le mettre en base de donnée sécurisé
@$pass=md5($_POST["pass"]);
@$valider=$_POST["valider"];
$erreur="";
if(isset($valider)){
    include("connexion.php");
     // Construction de la requête SELECT sans injection SQL :
    $sel=$pdo->prepare("SELECT * from user WHERE mail=? and pass=? limit 1");
    $sel->execute(array($mail,$pass));
    $tab=$sel->fetchAll();
    if(count($tab)>0){
        $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
        " ".strtoupper($tab[0]["nom"]);
        $_SESSION["autoriser"]="oui";
        header("location:session.php");
    }
    else
        $erreur="Mauvais login ou mot de passe!";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
</head>
<body onLoad="document.fo.login.focus()">

<h1 class="fw-bold">Connexion</h1>

<div class="container-fluid align-items-center">
    <form action="" name="fo" method="post">

    <label class="text-success" for="mail">Mail :</label>
    <input class="form-control col-3" id="mail" name="mail" type="text" placeholder="Mail">

    <br>


    <label class="text-success" for="pass">Mot de passe :</label>
    <input class="form-control col-3" name="pass" id="pass" type="password" placeholder="Mot de passe">

    <br>

    <input class="btn btn-success" name="valider" type="submit" placeholder="S'authentifier"">

    <button class="btn">
        <a class="btn btn-danger" href="exo_mdp.php">S'inscrire</a>
    </button>
    </form>
</div>


</body>
</html>