TP-ecole

**Installation du projet**



**1.  L'environnement**

Il faut tout d'abord s'assurer que MySQL (MySQL Workbench), PHP, Composer et Symfony sont bien installés sur le poste.

Sinon, les liens suivants peuvent aider :

[Installation MySQL Workbench](https://dev.mysql.com/downloads/workbench/)

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

Démarrer MySQL

Créer un utilisateur avec le nom "ecole" et le mot de passe "ecole" avec une authentification standard à l'aide de MySQL Workbench. Assurez vous que cet utilisateur ait tous les privilèges

Exécuter les commandes suivantes :

`php bin/console doctrine:database:create`

`php bin/console doctrine:migrations:migrate`

`php bin/console doctrine:fixtures:load`



**5.  Démarrer le serveur**

Exécuter la commande suivante :

`symfony serve`

Aller à l'url indiquée dans la ligne verte du terminal (habituellement "127.0.0.1:8000", le port peut changer si un autre serveur utilise déjà le port 8000)



**6.  Accéder à la partie Administrateur**

Ajouter "/admin" à la fin de l'url

Dans le jeu de données, un administrateur a été créé avec l'adresse mail "admin@ecole.fr" et le mot de passe "admin", utiliser ces informations pour la connexion




**Liste des fonctionalitées**

En tant qu’utilisateur non connecté, je peux consulter les messages publics de l’école (actualités, les 3 plus récentes).

En tant qu’utilisateur non connecté, je peux accéder à une page regroupant les informations de l’école.

En tant qu’utilisateur non connecté, je peux m’inscrire.



En tant parent d’élève, je peux faire une demande d’inscription de mon enfant.

En tant que parent d’élève, je peux consulter les notes du carnet de correspondance de mes enfants.

En tant que parent d’élève, je peux voir les photos de classe de mes enfants.



En tant qu’administrateur de l’école, je peux créer des messages publics avec une image ou vidéo Youtube.

En tant qu’administrateur de l’école, je peux valider les inscriptions des enfants.

**en plus**

En tant qu’administrateur de l’école, je peux consulter l'ensemble des données enregistrée en base de données depuis la partie administration.

En tant qu’administrateur de l’école, je peux changer la photo d'acceuil, le logo, le nom, l'adresse postale, l'adresse email et le numéro de téléphone de l'ecole.

En tant qu’administrateur de l’école, je peux créer de nouvel utilisateur.

En tant qu’administrateur de l’école, je peux mettre à jour un utilisateur ou le supprimer.

En tant qu’administrateur de l’école, je peux changer les rôles des utilisateurs.

En tant qu’administrateur de l’école, je peux créer de nouvel enfant.

En tant qu’administrateur de l’école, je peux mettre à jour un enfant ou le supprimer.

En tant qu’administrateur de l’école, je peux créer une classe, lui attribuer un professeur et y ajouter les enfants.

En tant qu’administrateur de l’école, je peux mettre à jour une classe ou la supprimer.

En tant qu’administrateur de l’école, je peux ajouter une nouvelle photo de classe à une classe.

En tant qu’administrateur de l’école, je peux mettre à jour l'année et la liste des enfants d'une photo de classe ou la supprimer.

En tant qu’administrateur de l’école, je peux écrire une nouvelle note de correspondance dans le cahier d'un ou plusieurs enfants.

En tant qu’administrateur de l’école, je peux mettre à jour une note de correspondance ou la supprimer.

En tant qu’administrateur de l’école, je peux mettre à jour une adresse.




