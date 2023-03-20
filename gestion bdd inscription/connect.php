<?php
try{
    //connection a la base de donnée
    $db=new PDO('mysql:host=localhost; dbname=histoire', 'root', '');
    $db->exec('SET NAMES "utf8"');

}catch(PDOException $e){
   //message d'erreur si pas connecter
    echo 'Erreur :'. $e->getMessage();
    die();
}
?>