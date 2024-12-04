
# Storage Route Fixer

**Storage Route Fixer** est un package Laravel qui ajoute automatiquement une route pour servir des fichiers depuis le dossier de stockage (`storage/app/public`) si elle n'est pas déjà définie. Ce package crée un fichier `routes/storage.php` et le charge en parallèle avec `web.php`.

## Installation

### Prérequis

- **Laravel** >= 8.0
- **PHP** >= 7.3

### Étapes d'installation

1. **Installer le package via Composer :**

   ```bash
   composer require redaelfillali/storage-route-fixer
   ```

2. **Publier les routes de stockage :**

   Le package crée automatiquement le fichier `routes/storage.php` avec la route de stockage.

3. **Vérifier l'ajout de la route :**

   Utilisez la commande Artisan suivante pour lister vos routes et vérifier que la route de stockage est active :

   ```bash
   php artisan route:list
   ```

## Utilisation

Une fois installé, le package crée une route qui permet d'accéder aux fichiers dans `storage/app/public`. Par exemple :

```plaintext
http://your-app-url/storage/file-name.extension
```

Cela permet d'accéder directement aux fichiers de stockage via cette URL. Si le fichier demandé n'existe pas, une réponse `404` est renvoyée.

## Fonctionnalités

- **Création automatique** d'une route de stockage.
- **Vérification** de l'existence de la route dans `routes/storage.php` avant de l'ajouter.
- **Service de fichiers** : Sert les fichiers depuis le dossier `storage/app/public`.

## Configuration

Aucune configuration additionnelle n'est requise. Le package gère automatiquement la création et le chargement de `routes/storage.php`.

## Contribuer

Les contributions sont les bienvenues ! Veuillez suivre ces étapes :

1. Forker le projet.
2. Créer une branche pour votre fonctionnalité (`git checkout -b feature/nom-fonctionnalite`).
3. Committer vos modifications (`git commit -am 'Add some feature'`).
4. Pousser la branche (`git push origin feature/nom-fonctionnalite`).
5. Ouvrir une Pull Request.

## Auteurs

- **Reda El Fillali** - [redafillali](https://github.com/redafillali)

## Licence

Ce projet est sous licence MIT - consultez le fichier [LICENSE](LICENSE) pour plus de détails.
