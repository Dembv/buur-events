# Buur Events : Plateforme de gestion et de réservation d'événements

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL%20%2F%20MariaDB-4479A1?logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?logo=bootstrap&logoColor=white)

**Buur Events** est une application web qui permet de publier des événements (concerts, conférences, ateliers), de les consulter et d'y réserver une place. Les organisateurs gèrent leurs événements et peuvent envoyer un e-mail à toutes les personnes inscrites.

Projet réalisé dans le cadre du module *Compléments Web* du Master 1 Informatique, en **PHP natif** avec une architecture **MVC écrite à la main** (routeur, autoloader et middleware maison, sans framework).

---

## Fonctionnalités

**Visiteur**
- Page d'accueil et liste des événements
- Fiche détaillée d'un événement (date, heure, lieu, catégorie, capacité, image)
- Création de compte et connexion

**Utilisateur connecté**
- Réservation d'une place et annulation
- Page « Mes réservations »
- Création, modification et suppression de ses propres événements, avec téléversement d'une image
- Page « Mes événements »
- Envoi d'une notification par e-mail à tous les inscrits d'un événement (PHPMailer, SMTP)

## Architecture

```
buur-events/
├── index.php              # Point d'entrée : déclaration des routes GET / POST
├── _config.php            # Autoloader, chemins et identifiants de la base
├── .htaccess              # Réécriture d'URL vers index.php
├── classes/
│   ├── Routeur.php        # Routage URL → Contrôleur@action (URL du type details-12)
│   └── AuthMiddleware.php # Redirige vers /connexion si non connecté
├── controllers/           # Un contrôleur par page (Accueil, Evenements, Details, Reservation…)
├── models/                # Entités (Evenement, Utilisateur, Reservation, Categorie) + accès BD (mysqli)
├── views/                 # Gabarits PHP (base, header, footer, pages)
├── assets/                # CSS, JS (Bootstrap, jQuery), images et uploads
├── database/projet-web.sql
└── resources/phpmailer/   # Bibliothèque d'envoi d'e-mails
```

**Base de données** (`projet-web`) : `utilisateurs`, `evenements`, `categories` (Concerts, Conférences, Ateliers) et `reservations`.

## Installation (XAMPP / WAMP)

1. **Récupérer le projet** dans le dossier web du serveur :

   ```bash
   cd C:/xampp/htdocs          # ou /opt/lampp/htdocs
   git clone https://github.com/Dembv/buur-events.git
   ```

2. **Ajuster le chemin de base** dans `_config.php`. La constante `CHEMIN` doit correspondre au dossier du projet sous la racine web, par exemple :

   ```php
   $chemin_principal = '/buur-events/';
   ```

3. **Créer la base** : dans phpMyAdmin, créer une base nommée `projet-web` puis importer `database/projet-web.sql`.

4. **Vérifier les identifiants MySQL** dans `_config.php` (`DB_HOST`, `DB_USER`, `DB_PASSWORD`, `DB_NAME`).

5. **Activer `mod_rewrite`** dans Apache (actif par défaut sous XAMPP) pour que le `.htaccess` fonctionne.

6. **Configurer l'envoi d'e-mails** dans `controllers/NotificationController.php` : adresse et mot de passe d'application SMTP (pour Gmail, un *mot de passe d'application* est nécessaire).

7. Ouvrir `http://localhost/buur-events/`.

## Limites connues

- Les mots de passe des utilisateurs sont stockés en clair : à remplacer par `password_hash()` / `password_verify()`.
- Les identifiants SMTP sont écrits dans le code : à déplacer dans un fichier de configuration non versionné (ou des variables d'environnement).
- La capacité d'un événement est enregistrée mais n'est pas encore contrôlée au moment de la réservation.
- Le SDK de paiement PayDunya est présent dans `resources/` mais n'est pas encore branché.
- Les images téléversées gardent leur nom d'origine : deux fichiers du même nom s'écrasent.

## Auteur

Demba Hamet Guissé
