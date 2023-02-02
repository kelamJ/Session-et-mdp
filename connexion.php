<?php
    try{
        $pdo=new PDO("mysql:host=localhost;dbname=mdp","admin","<0000>");
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>