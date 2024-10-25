<?php

namespace Redaelfillali\StorageRouteFixer;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteCheckServiceProvider extends ServiceProvider
{
    /**
     * Enregistrer le fournisseur de services.
     *
     * @return void
     */
    public function register()
    {
        // Enregistrement d'autres services ou configurations, si nécessaire.
    }

    /**
     * Démarrer les services, y compris le chargement et la création des routes.
     *
     * @return void
     */
    public function boot()
    {
        $this->ensureStorageRouteFileExists();
        $this->loadRoutesInOrder();
    }

    /**
     * Vérifie et crée le fichier storage.php dans le répertoire routes de l'application.
     *
     * @return void
     */
    protected function ensureStorageRouteFileExists()
    {
        // Chemin vers le fichier storage.php dans le répertoire routes de l'application
        $appRoutePath = base_path('routes/storage.php');

        // Chemin vers le fichier storage.php dans le package
        $packageRoutePath = __DIR__ . '/routes/storage.php';

        // Copier le fichier de route de stockage dans le répertoire des routes de l'application s'il n'existe pas
        if (!File::exists($appRoutePath)) {
            File::copy($packageRoutePath, $appRoutePath);
        }
    }

    /**
     * Charger le fichier storage.php avant web.php pour établir la priorité des routes.
     *
     * @return void
     */
    protected function loadRoutesInOrder()
    {
        // Charger storage.php depuis le répertoire routes de l'application
        Route::middleware('web')
            ->group(base_path('routes/storage.php'));

        // Charger ensuite web.php
        $this->loadRoutesFrom(base_path('routes/web.php'));
    }
}
