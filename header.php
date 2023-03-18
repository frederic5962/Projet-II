<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <title>Header</title>
    <link rel="stylesheet" type="text/css" href="header.css" />
</head>
<h1>Ne Jamais Oublier</h1>
<body>
    <img src="./images/image.jpg" alt="banniere" width="100%" height="300px">

    <form class="row g-3">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputNom" class="form-label"><b>NOM</b></label>
                <input type="nom" class="form-control" id="inputNom">
              </div>  
              <div class="col-md-6">
                <label for="inputPrenom" class="form-label"><b>Prenom</b></label>
                <input type="prenom" class="form-control" id="inputPrenom">
              </div>
        <div class="col-md-6">
          <label for="mail" class="form-label"><b>Email</b></label>
          <input type="email" class="form-control" id="mail">
        </div>
        <div class="col-md-6">
          <label for="inputPassword" class="form-label"><b>Mot de passe</b></label>
          <input type="password" class="form-control" id="inputPassword">
        </div>
        <div class="col-12">
          <label for="inputAdresse" class="form-label"><b>Adresse</b></label>
          <input type="text" class="form-control" id="Adresse" placeholder="1234 Main St">
        </div>
        <div class="col-12">
          <label for="inputAdresse2" class="form-label"><b>Adresse 2</b></label>
          <input type="text" class="form-control" id="inputAdresse2" placeholder="appartement, studio">
        </div>
        <div class="col-md-6">
          <label for="inputVille" class="form-label"><b>ville</b></label>
          <input type="text" class="form-control" id="inputVille">
        </div>
        <div class="col-md-4">
          <label for="inputPays" class="form-label"><b>Pays</b></label>
          <select id="inputPays" class="form-select">
            <option selected>selection...</option>
            <option>France</option>
            <option>Belgique</option>
            <option>Suisse</option>

          </select>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Valider</button>
        </div>
      </form>


</body>
</html>