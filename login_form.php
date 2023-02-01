<?php
define('LOGIN', 'admin');
define('PASSWORD', 'admin');
$errorMessage = '';
// Test de l'envoi du formulaire
if(!empty($_POST)) 
{
  // Les identifiants sont transmis ?
        if(!empty($_POST['login']) && !empty($_POST['password'])) 
        {
        // Sont-ils les mêmes que les constantes ?
        if($_POST['login'] !== LOGIN) 
        {
            $errorMessage = 'Mauvais login !';
        }
            elseif($_POST['password'] !== PASSWORD) 
        {  
            $errorMessage = 'Mauvais mot de passe !';
        }
            else
        {
        // On ouvre la session
            session_start();
        // On enregistre le login en session
            $_SESSION['login'] = LOGIN;
        // On redirige vers le fichier admin.php
            header('Location: login_script.php');
            exit();
        }
    }
        else
    {
        $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container-fluid">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

    <?php
          // Rencontre-t-on une erreur ?
        if(!empty($errorMessage)) 
        {
            echo '<p>', htmlspecialchars($errorMessage) ,'</p>';
        }
        ?>

    <label for="login">Login :</label>
    <input class="form-control col-2" id="login" name="login" type="text" placeholder="Login">

    <br>


    <label for="password">Mot de passe :</label>
    <input class="form-control col-2" name="password" id="password" type="password" placeholder="Mot de passe">

    <br>

    <input class="btn btn-success" name="submit" type="submit" placeholder="Envoyer"">
    </form>
</div>


</body>
</html>