# Adveris-blog

                                -- Réalisation --

Le but ici était de créer un blog avec une partie obligatoire et une partie optionelle.

Tout d'abord je n'avais pas compris que les fichiers fourni se trouvais dans le git.adveris.fr. En effet je pensais que c'étais l'endroit juste pour déposer le projet final. Je pensais que les fichiers se trouvais à l'adresse : test-back.adveris.fr.

N'ayant pas aux final les fichiers fournit, j'ai donc tout créer.

Voici les étapes effectuées lors de la réalisation du projet : 

1 - Création du projet symfony avec composer

2 - Ajout des données de connexion à la bdd dans le .env

3 - Création de la base de donnée avec doctrine

4 - Création de trois entity :
                                - Articles : pour les informations de chaque articles
                                - Catégories : pour la liste des catégories disponible
                                - Images : pour l'url de chaque image correspondant à un article

5 - Ajout du bundle faker avec composer permettant d'effectuer des fixtures

6 - Remplissage de la bdd avec faker 

7 - Récupération des données pour l'affichage de tous les articles

8 - Récupération des données pour l'affichage par articles (détails)

9 - Tri des données par catégorie

10 - Création de formulaire avec la console(make:form) pour l'ajout de nouveaux articles

11 - Création de formulaire avec la console(make:form) pour la modification d'articles

12 - Mise en place de templates, du CSS pour le coté front


                                    -- Notice développeur-- 

1 - Lancer tout d'abord la commande : composer update pour integrer le vendor et tout les bundles du projet

2 - Lancer ensuite la commande : php bin/console doctrine:database:create afin de creer la base de donnée. Celle-ci à pour données de connexion root en login et aucun mot de passe. Les modifactions se font dans le .env

3 - Lancer la commande : php bin/console make:migation pour creer une migration

4 - Lancer la commande : php bin/console doctrine:migration:migrate pour effectuer la migration dans la bdd

5 - Lancer la commande : php/bin/console doctrine:fixtures:load --append pour persister les fixtures (données aléatoires) dans la bdd

6 - Lancer enfin la commande : php/bin console server:start pour lancer votre serveur et votre projet qui sera accessible à l'adresse 127.0.0.1:8000



                                    -- Notice utilisateur --

1 - La page pincipale permet de voir la liste des articles publiés

2 - Le nombre d'article par catégorie est affiché à coté des articles et est clickable afin de trier les articles par catégorie

3 - Le menu "Ajouter un article" permet de creer un article et de l'ajouter 

4 - Le bouton "plus d'infos" permet d'avoir les détails de l'article

5 - Suite au click du bouton "plus d'infos", la modifaction de l'article s'effectue sur le bouton "Modifier"
