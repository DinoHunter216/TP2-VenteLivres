> This is a french repository, even though there is code in english.

# Site de vente de livres

**Le meilleur site de vente de livres de Localhost**

## Le Projet

Il s'agit de mon projet de fin de deuxième session en [Informatique: Programmation Web, mobile et Jeux Vidéo](https://www.cegep-ste-foy.qc.ca/programmes/programmes-techniques/techniques-de-linformatique-programmation-web-mobile-et-jeux-video/) au [Cégep de Ste-Foy](https://www.cegep-ste-foy.qc.ca/accueil/?gclid=CjwKCAjwtqj2BRBYEiwAqfzur5-iSSJ7dGl-0ErznEIRJPEvBGiGYSJAYBPCHuEff3ALDJBbVpiybhoCv1gQAvD_BwE) pour le cours numéro 420-W21-SF (Programmation Web Dynamique). Le but est de faire un un site de vente en ligne pour englober tout ce qu'on a appris durant la session. Le mien traite du commerce de livre.

## Les langages

J'utilise personnelement les langages suivants:

- HTML
- CSS
- PHP
- Javascript
- SQL

## Les technologies utilisées

J'utilise le paquet Linux LAMP. Donc, mon site utilise Apache et PHP ainsi qu'une base de données MySQL accessible avec PHPMyAdmin. Le fichier SQL de la base de données est disponible dans le dossier bd. Il ne suffit que d'importer le fichier dans PHPMyAdmin, il s'occupe de la création de la base de données. J'utilise aussi [Bootstrap](https://getbootstrap.com/) pour le placement et l'affichage de mon site.

### Accès à la base de données

Les accès sont fait en utilisant PDO et des classes crées par [Vivek Wicky Aswal](https://twitter.com/#!/VivekWickyAswal) ([Son GitHub](https://github.com/wickyaswal/PHP-MySQL-PDO-Database-Class)). Pour l'utiliser, il suffit de d'aller dans le fichier includes/config.inc.php pour changer le code suivant:

| Code                                         | Utilisation                                    |
| -------------------------------------------- | ---------------------------------------------- |
| `define("DBNAME", "NomBDIci");`              | Utilisé pour la connexion à la base de données |
| `define("DBUSERNAME", "NomUtilisateurIci");` | Utilisé pour le nom de l'utilisateur           |
| `define("DBPASSWORD", "motDePasseIci");`     | Utilisé pour le mot de passe de l'utilisateur  |

### <ins> Important </ins>

Il sera utile de noter que le « Rewrite Engine » est activé et que le site utilise la constante DOCROOT qui dirige vers la racine du dossier. Il sera donc important de mettre la racine de l'hôte virtuel à la racine du dossier et utile d'activer le « Rewrite Engine ».

### _Crédits_

- Crédits à mon professeur Jimmy Gilbert pour la tâche et quelques parties de on site, dont l'index. Cette dite tâche peut être trouvée dans le dossier doc.

- Crédits à Bootstrap 4 et MDBootstrap pour l'affichage de la page.

- Crédits à [Archambault](https://www.archambault.ca/) pour l'inspiration de mon site.

- Crédits à [HTML5Boilerplate](https://html5boilerplate.com/) pour le template du site.

- Tout les autres crédits sont mentionnés en temps voulu directement de le code.
