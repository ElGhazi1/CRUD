# Gestionnaire d'utilisateurs

Un simple gestionnaire d'utilisateurs permettant d'ajouter, de lire, de mettre à jour et de supprimer des utilisateurs dans une base de données MySQL.

## Fonctionnalités

- Ajouter un nouvel utilisateur avec son email, mot de passe et rôle.
- Afficher la liste des utilisateurs existants.
- Supprimer un utilisateur.
- Modifier les informations d'un utilisateur.

## Prérequis

- Serveur Web (Apache, Nginx, etc.).
- Serveur MySQL.
- PHP 7.x.
- Composer (pour l'installation des dépendances, si nécessaire).

## Installation

1. Clonez ce dépôt dans le répertoire de votre serveur web.
2. Importez le fichier SQL fourni (`database.sql`) dans votre base de données MySQL.
3. Configurez les informations de connexion à la base de données dans le fichier `index.php`, si nécessaire.

## Configuration de la base de données

1. Créez une nouvelle base de données MySQL nommée `enset-a`.
2. Exécutez le script SQL fourni (`database.sql`) pour créer la table `users`.

## Utilisation

1. Accédez à l'application à partir de votre navigateur en visitant `http://localhost/chemin/vers/index.php`.
2. Vous pouvez ajouter un nouvel utilisateur en remplissant le formulaire et en cliquant sur "Ajouter".
3. La liste des utilisateurs existants sera affichée avec des options pour les modifier ou les supprimer.

## Sécurité

- **Mot de passe**: Notez que ce gestionnaire utilise MD5 pour le hachage des mots de passe, ce qui n'est pas sécurisé. Pour une meilleure sécurité, utilisez des méthodes de hachage plus robustes comme bcrypt.

## Auteurs

- [Votre Nom](lien vers votre profil GitHub)

## Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.
