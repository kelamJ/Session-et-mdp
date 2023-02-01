<?php
// On charge l'enregistrement correspondant à l'ID passé en paramètre :
    require "db.php";
    $db = connexionBase();
    $requete = $db->query("SELECT * FROM user");
    $tableauD = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();

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
        <form action="exo_mdp_script.php" method="post">

            <label class="text-danger" for="login">Entrer votre nom :</label>
            <input class="form-control col-2" id="login" name="login" type="text" placeholder="Login">

            <br>

            <label class="text-danger" for="prenom">Entrer votre prénom :</label>
            <input class="form-control col-2" name="prenom" id="prenom" type="text" placeholder="Prénom">

            <br>

            <label class="text-danger" for="mail">Entrer votre adresse mail :</label>
            <input class="form-control col-2" name="mail" id="mail" type="email" placeholder="Mail">

            <br>

            <label class="text-danger" for="password">Entrer votre mot de passe :</label>
            <input class="form-control col-2" name="password" id="password" type="password" placeholder="Mot de passe">

            <br>

            <input class="btn btn-danger" name="submit" type="submit" placeholder="Envoyer"">

            <button class="btn">
                <a class="btn btn-success" href="login_form.php">Retour</a>
            </button>
        </form>
</div>
</body>
</html>