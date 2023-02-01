<?php
    //On démarre une nouvelle session
    // session_start();
    
    // // On définit des variables de session
    // $_SESSION['prenom'] = 'Julien';
    // $_SESSION['age'] = 22;

    // unset($_SESSION["prenom"]);
    // unset($_SESSION["age"]);

    if (ini_get("session.use_cookies")) 
    {
        setcookie(session_name(), '', time()-42000);
    }

    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        
        <p>Un paragraphe</p>
    </body>
</html>