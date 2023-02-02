<?php
session_start();
@$nom=$_POST["nom"];
@$prenom=$_POST["prenom"];
@$mail=$_POST["mail"];
@$pass=$_POST["pass"];
@$repass=$_POST["repass"];
@$valider=$_POST["valider"];
$erreur="";
if(isset($valider)){
    if(empty($nom)) $erreur="Nom laissé vide!";
    elseif(empty($prenom)) $erreur="Prénom laissé vide!";
    elseif(empty($prenom)) $erreur="Prénom laissé vide!";
    elseif(empty($mail)) $erreur="Mail laissé vide!";
    elseif(empty($pass)) $erreur="Mot de passe laissé vide!";
    elseif($pass!=$repass) $erreur="Mots de passe non identiques!";
    else{
        include("connexion.php");
        $sel=$pdo->prepare("SELECT id FROM user WHERE mail=? limit 1");
        $sel->execute(array($mail));
        $tab=$sel->fetchAll();
        if(count($tab)>0)
            $erreur="Login existe déjà!";
        else{
            $ins=$pdo->prepare("INSERT INTO user(nom,prenom,mail,pass) values(?,?,?,?)");
        if($ins->execute(array($nom,$prenom,$mail,md5($pass))))
            header("location:login_form.php");
        }   
    }
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Inscription</title>
</head>
<body>
<div class="container-fluid">
    <h1 class="fw-bold">Formulaire d'inscription</h1>
    <div class="erreur"><?php echo $erreur ?></div>
        <form name="fo" action="" method="post">

            <label class="text-danger" for="nom">Entrer votre nom :</label>
            <input class="form-control col-2" id="nom" name="nom" type="text" placeholder="Nom">

            <br>

            <label class="text-danger" for="prenom">Entrer votre prénom :</label>
            <input class="form-control col-2" name="prenom" id="prenom" type="text" placeholder="Prénom">

            <br>

            <label class="text-danger" for="mail">Entrer votre adresse mail :</label>
            <input class="form-control col-2" name="mail" id="mail" type="email" placeholder="Mail">

            <br>

            <label class="text-danger" for="pass">Entrer votre mot de passe :</label>
            <input class="form-control col-2" name="pass" id="pass" type="password" placeholder="Mot de passe">

            <br>
            <label class="text-danger" for="pass">Retaper votre mot de passe :</label>
            <input class="form-control col-2" type="password" name="repass" placeholder="Confirmer Mot de passe" />
            <br>

            <input class="btn btn-danger" name="valider" type="submit" placeholder="Envoyer"">

            <button class="btn">
                <a class="btn btn-success" href="login_form.php">Retour</a>
            </button>
        </form>
</div>
</body>
</html>