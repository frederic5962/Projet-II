<?php
//on demarre la session
session_start();
if($_POST){
    if(isset($_POST['id']) && !empty($_POST['id'])
    && isset($_POST['nom']) && !empty($_POST['nom']) 
    && isset($_POST['prenom']) && !empty($_POST['prenom'])
    && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['mdp']) && !empty($_POST['mdp'])
    && isset($_POST['adresse']) && !empty($_POST['adresse'])
    && isset($_POST['adresse2']) && !empty($_POST['adresse2'])
    && isset($_POST['ville']) && !empty($_POST['ville'])
    && isset($_POST['pays']) && !empty($_POST['pays'])){
        //on inclut la connection a la base 
        require_once('connect.php');

        //on nettoie l'id envoyé
        $id = strip_tags($_POST['id']);
        $nom = strip_tags($_POST['nom']);
        $prenom = strip_tags($_POST['prenom']);
        $email = strip_tags($_POST['email']);
        $mdp = strip_tags($_POST['mdp']);
        $adresse = strip_tags($_POST['adresse']);
        $adresse2 = strip_tags($_POST['adresse2']);
        $ville = strip_tags($_POST['ville']);
        $pays = strip_tags($_POST['pays']);

    $sql = 'UPDATE `utilisateur` SET `nom`=:nom, `prenom`=:prenom, `email`=:email, `mdp`=:mdp, `adresse`=:adresse,
     `adresse2`=:adresse2, `ville`=:ville, `pays`=pays WHERE `id`=:id;';

     $query = $db->prepare($sql);
     $query->bindValue(':id', $id, PDO::PARAM_INT);
     $query->bindValue(':nom', $nom, PDO::PARAM_STR);
     $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
     $query->bindValue(':email', $email, PDO::PARAM_STR);
     $query->bindValue(':mdp', $mdp, PDO::PARAM_STR);
     $query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
     $query->bindValue(':adresse2', $adresse2, PDO::PARAM_STR);
     $query->bindValue(':ville', $ville, PDO::PARAM_STR);
     $query->bindValue(':pays', $pays, PDO::PARAM_STR);

     $query->execute();

     $_SESSION['message']="utilisateur modifié";
     require_once('close.php');
     header('Location: index.php');//ne fonctionne que si aucun message avant(pas de echo ni rien
    }else{
$_SESSION['erreur'] = "le formulaire est incomplet";
    }
}

//est-ce que l'id existe et n'est pas vide dans l'url
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    //on nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `utilisateur` WHERE `id` =:id';

    //on prepare la requete 
    $query = $db->prepare($sql);

    //on accroche les params 
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    //on execute la requete
    $query->execute();
    //on recupere l'utilisateur
    $nom = $query->fetch();

    //on verifie si le nom existe
    if(!$nom){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: index.php');
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>

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
                <h1>modifier un utilisateur</h1>
               <form method="post">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control" value="<?= $nom['nom'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" id="prenom" name="prenom" class="form-control" value="<?= $nom['prenom'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?= $nom['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="mdp">Mdp</label>
                        <input type="password" id="mdp" name="mdp" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" class="form-control" value="<?= $nom['adresse'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="adresse2">Adresse 2</label>
                        <input type="text" id="adresse2" name="adresse2" class="form-control" value="<?= $nom['adresse2'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" id="ville" name="ville" class="form-control" value="<?= $nom['ville'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="pays">Pays</label>
                        <input type="text" id="pays" name="pays" class="form-control" value="<?= $nom['pays'] ?>">
                    </div>
                    <input type="hidden" value="<?= $nom['id'] ?>" name="id">
                    <button class="btn btn-primary">Envoyer</button>
               </form> 
            </section>
        </div>
    </main>
</body>
</html>