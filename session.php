<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="">
    </head>
    
    <body>
        <?php
            echo 'Bonjour ' .$_SESSION['prenom']. ',
            tu as ' .$_SESSION['age']. ' ans';
        ?>
    </body>
</html>