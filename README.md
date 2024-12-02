# TP PHP POO : Gestion de Cartes

## Fonctionnalités
- Ajout, modification et suppression de cartes.
- Les cartes sont affichées de la plus récente à la moins récente.
- Interface responsive grâce à **Tailwind CSS**.

## Installation

### Prérequis
- PHP (version 7.3 ou plus récente)
- Composer
- XAMPP ou MAMP (pour héberger un serveur local PHP)

### Étapes d'installation

1. **Cloner le dépôt ou télécharger le projet** :
   - Si vous n'avez pas encore le projet, clonez-le depuis GitHub :
     ```bash
     git clone https://github.com/votre_nom/mon-projet-php-poo.git
     ```

2. **Installer les dépendances via Composer** :
   - Dans le dossier du projet, ouvrez un terminal et installez les dépendances nécessaires :
     ```bash
     composer install
     ```
   Cela installera **Tailwind CSS** (via le CDN) et générera l'autoloader nécessaire pour le projet PHP.

3. **Lancer le serveur local (XAMPP ou MAMP)** :
   - **XAMPP** :
     - Placez votre dossier de projet dans le dossier `htdocs` de votre installation XAMPP (ex. : `C:\xampp\htdocs\tp_php_poo_html`).
     - Ouvrez le panneau de contrôle XAMPP, démarrez Apache et MySQL.
     - Accédez à l'application via votre navigateur en visitant `http://localhost/tp_php_poo_html/index.php`.
   
   - **MAMP** :
     - Placez votre dossier de projet dans le dossier `htdocs` de votre installation MAMP (ex. : `/Applications/MAMP/htdocs/tp_php_poo_html`).
     - Lancez MAMP et démarrez le serveur Apache.
     - Accédez à l'application via `http://localhost:8888/tp_php_poo_html/index.php`.

4. **Configurer l'autoloader (si nécessaire)** :
   - Composer devrait automatiquement gérer l'autoloader pour vous, mais si vous avez ajouté des fichiers ou modifié le `composer.json`, vous pouvez régénérer l'autoloader avec :
     ```bash
     composer dump-autoload
     ```

5. **Accéder à l'application** :
   - Une fois le serveur local démarré, ouvrez votre navigateur et allez à l'URL suivante :
     ```
     http://localhost/tp_php_poo_html/index.php
     ```

### Utilisation
- Ajoutez des cartes en remplissant les champs dans le formulaire.
- Vous pouvez afficher, modifier ou supprimer des cartes.
- Les cartes sont affichées dans l'ordre inverse de leur ajout (les plus récentes en premier).

## Sécurité
### Sécurisation des entrées
- Le code est déjà protégé contre les attaques de type **Cross-site Scripting (XSS)** grâce à l'utilisation de `htmlspecialchars()` lors de l'affichage des cartes. Cela permet d'éviter l'injection de code malveillant dans le HTML.
  
### Sécurisation des données
- Les données (cartes) sont stockées dans la **session PHP**, ce qui signifie qu'elles sont disponibles uniquement pendant la session actuelle de l'utilisateur. Si vous souhaitez que les cartes soient persistées au-delà de la session (par exemple, pour que les utilisateurs retrouvent leurs cartes après un redémarrage du serveur), vous devrez envisager d'ajouter une base de données comme **MySQL** ou **SQLite**.

---

## Problèmes potentiels

### **GitHub Pages ne supporte pas PHP**
- GitHub Pages ne peut pas exécuter des fichiers PHP, car il s'agit d'un service d'hébergement statique uniquement.
- Pour tester et exécuter votre application, vous devez utiliser un serveur local, comme **XAMPP**, **MAMP** ou **WAMP**, qui permet d'exécuter des fichiers PHP sur votre machine locale.

### **Session PHP et sécurité**
- Si vous envisagez de déployer ce projet sur un serveur de production, vous devez vous assurer que les sessions PHP sont sécurisées :
  - Assurez-vous que le fichier de session est bien protégé.
  - Utilisez des options de configuration sécurisées pour les sessions dans le fichier `php.ini`.

---

## Exemple d'exécution
```Combien de cartes voulez-vous ajouter ? 2 Entrez une question pour la carte 1 : Quelle est la capitale de la France ? Entrez une réponse à la question : Paris Entrez une question pour la carte 2 : Quelle est la couleur du ciel ? Entrez une réponse à la question : Bleu Listing des cartes contenues dans la liste : Infos sur la carte 1 : Question: Quelle est la couleur du ciel ? Answer: Bleu Infos sur la carte 2 : Question: Quelle est la capitale de la France ? Answer: Paris```