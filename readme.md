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
