<?php
// on demarre une session
session_start();

if($_POST){
    //die('Ca marche');
    if(isset($_POST['nom']) && !empty($_POST['nom'])
    && isset($_POST['prenom']) && !empty($_POST['prenom'])
    && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['mdp']) && !empty($_POST['mdp'])
    && isset($_POST['adresse']) && !empty($_POST['adresse'])
    && isset($_POST['adresse 2']) && !empty($_POST['adresse 2'])
    && isset($_POST['ville']) && !empty($_POST['ville'])
    && isset($_POST['pays']) && !empty($_POST['pays'])){
        //on  inclut la connection a la base
require_once('connect.php');

// on nettoie l'id envoyé
$nom = strip_tags($_POST['nom']);
$prenom = strip_tags($_POST['prenom']);
$email = strip_tags($_POST['email']);
$mdp = strip_tags($_POST['mdp']);
$mdp = strip_tags($_POST['adresse']);
$mdp = strip_tags($_POST['adresse2']);
$mdp = strip_tags($_POST['ville']);
$mdp = strip_tags($_POST['pays']);

$sql = 'INSERT INTO `utilisateur` (`nom`, `prenom`, `email`, `mdp`, `adresse`, `adresse2`, `ville`, `pays`)VALUES
(:nom, :prenom, :email, :mdp, :adresse, :adresse2, :ville, :pays);';

$query = $db->prepare($sql);

$query->bindValue(':nom', $nom, PDO::PARAM_STR);
$query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$query->bindValue(':email', $email, PDO::PARAM_STR);
$query->bindValue(':mdp', $mdp, PDO::PARAM_STR);
$query->bindValue(':adresse', $mdp, PDO::PARAM_STR);
$query->bindValue(':adresse2', $mdp, PDO::PARAM_STR);
$query->bindValue(':ville', $mdp, PDO::PARAM_STR);
$query->bindValue(':pays', $mdp, PDO::PARAM_STR);
// si (nombre)$query->binValue(':nombre', $nombre, PDO::PARAM_INT)

$query->execute();

$_SESSION['message'] = "utilisateur ajouté";
require_once('close.php');
        header('Location: index.php');//ne fonctionne que si aucun message avant (pas de echo ni rien)
    }else{
       $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nom</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
            <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                        '. $_SESSION['erreur'].'
                      </div>';
                      $_SESSION['erreur'] = "";
                    }
                ?>
                <h1>Ajouter un utilisateur</h1>
               <form method="post">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" id="prenom" name="prenom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mdp">Mdp</label>
                        <input type="password" id="mdp" name="mdp" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="adresse2">Adresse 2</label>
                        <input type="text" id="adresse2" name="adresse2" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" id="ville" name="ville" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pays">Pays</label>
                        <input type="text" id="pays" name="pays" class="form-control">
                    </div>
                    <button class="btn btn-primary">Envoyer</button>
               </form> 
            </section>
        </div>
    </main>
</body>
</html>