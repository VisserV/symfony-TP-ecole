TP-ecole

**Installation du projet**



**1.  L'environnement**

Il faut tout d'abord s'assurer que WAMP (ou XAMP ou LAMP pour Mac ou Linux), PHP, Composer et Symfony sont bien installés sur le poste.

Sinon, les liens suivants peuvent aider :

[Installation WAMP](http://www.wampserver.com/en/download-wampserver-64bits/)

[Installation PHP](https://www.php.net/downloads.php)

[Installation Composer](https://getcomposer.org/download/)

[Installation Symfony](https://symfony.com/download)



**2.  Cloner le projet**

Exécuter les commandes suivantes dans un terminal de commande :

`cd ./[le_dossier_devant_contenir_le_projet]`

`git clone https://forge.univ-lyon1.fr/p1930988/tp-ecole.git tp-ecole-Perret-Visser`

`cd tp-ecole-Perret-Visser`



**3.  Installer les dépendances**

Exécuter la commande suivante :

`composer install`



**4.  Créer la base de donnée et son jeu de données**

Démarrer WAMP

Aller à l'adresse "http://localhost/phpmyadmin/" et créer un utilisateur avec le nom "ecole" et le mot de passe "ecole" ayant tous les privilèges

Exécuter les commandes suivantes :

`php bin/console doctrine:database:create`

`php bin/console doctrine:fixtures:load`



**5.  Démarrer le serveur**

Exécuter la commande suivante :

`symfony serve`

Aller à l'url indiquée dans la ligne verte du terminal (habituellement "127.0.0.1:8000", le port peut changer si un autre serveur utilise déjà le port 8000)



**6.  Accéder à la partie Administrateur**

Ajouter "/admin" à la fin de l'url

Dans le jeu de données, un administrateur a été créé avec l'adresse mail "admin@ecole.fr" et le mot de passe "admin", utiliser ces informations pour la connexion
