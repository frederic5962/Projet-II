réalisation du maquetage avec miro, j ai creer 3 vues du site.
la page de connexion, la page d'inscription et une page du site.
Une vue d'ensemble a ete screener pour etre ajouter a la prensentation.
J'ai utilisé la bibliotheque proposer par miro pour la creation.


Réalisation de la base de données, creation des Tables et Colonnes.
Implentation de donéées pour les tables.


Réalisation des etapes du CRUD -> il est possible maintenant de gere la bdd, donc de créer , modifier et supprimer un 
utilisateur.
les changements apparaissent en base de donées.
Le mot de pass a ete egalement modifié, il n'apparait plus a l'écriture, il faut activer l'oeil de vision pour le voir,celui-ci le cache egalement dans les details de l'utilisateur, de ce fait il n'est observable qu'en bdd.


Introduction au MVC: Model Vews Controler -> principe de mise en place d'pplication.
permet de séparer les differents éléménts de l'application.

 CLIENT(uti du site)---"URL"--->ROUTEUR(trouve l'emplacement auquel il doit acceder pour mettre en oeuvre le bon controler)

ROUTEUR---'envoie'--->"méthode/action"--'a executer'-->CONTROLEUR--->'execute/traite'
                                                                            |
                                                                            |
                                                                           \ /
                                                      ['Demande de données' / 'envoie de données'] par l'intermediaire du 
                                                         MODELE  (! Fichier uniquement la pour l'echange avec la bdd)

Le MODELE--'renvoie les données si besoin'--->CONTROLEUR--->'traite'--->'envoi'--->VUE (genere que du html)

et pour terminé apres avoir generer ce fichier la VUE le renvoie au poste client (utilisateur) sous forme d'une page WEB.


App------------------>pricipaux fichiers pour gerer le couer de l'appli
Controllers---------->gere les echanges 
Models--------------->models
Views---------------->vue html 
.htacces/index.php--->gere le routeur(http://url-du-site.php?p= Mais on prefere http://url-du-site/controler/action)
le routeur réecrit l'url et recupere les params comme on le souhaite



