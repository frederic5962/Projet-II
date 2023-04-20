<?php
try{
    //connection a la base de donnée
    $db=new PDO('mysql:host=localhost; dbname=histoire', 'root', '');

    //permet de faire tous les echanges avec la bdd en prenant tout les caractere UTF8
    $db->exec('SET NAMES "utf8"');

}catch(PDOException $e){
   //message d'erreur si pas connecter
    echo 'Erreur :'. $e->getMessage();
    die();
}
?>